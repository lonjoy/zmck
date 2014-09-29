<?php
/**
* Static content controller.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Controller
* @since         CakePHP(tm) v 0.2.9
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

App::uses('AppController', 'Controller');

/**
* Static content controller
*
* Override this controller by placing a copy in controllers directory of an application
*
* @package       app.Controller
* @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
*/

App::uses('Url', 'Utility');
class PartnerController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array('User', 'Role', 'UserProfile','UserTags', 'Industry', 'UserDetail', 'Interview', 'Area', 'UserProject', 'Surveydata','Surveyoptions', 'UserComment');
    public $components = array('ListPage', 'Partner');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $xt = isset($_GET['xt']) ? intval($_GET['xt']) : 0;
        $ta = isset($_GET['ta']) ? intval($_GET['ta']) : 0;
        $ts = isset($_GET['ts']) ? intval($_GET['ts']) : 0;
        $tage = isset($_GET['tage']) ? intval($_GET['tage']) : 0;
        $prole = isset($_GET['prole']) ? intval($_GET['prole']) : 0;

        $this->set('xt', $xt);
        $this->set('ta', $ta);
        $this->set('ts', $ts);
        $this->set('tage', $tage);
        $this->set('prole', $prole);

        #获取角色
        $roleList = $this->Role->getList();
        $this->set('roleList', $roleList);

        $pagesize = 10;
        $p = isset($_GET['p'])?intval($_GET['p']):1;
        $offset = ($p-1) * $pagesize;
        $conditions = array();
        if(isset($_GET['searchname'])){
            $conditions['nickname LIKE '] = '%'.$_GET['searchname'].'%';
        }
        if($ta){
            $conditions['area'] = $ta;
        }
        if($xt){
            $conditions['xintai'] = $xt;
        }
        if($ts){
            $conditions['nowstatus'] = $ts;
        }            
        if($tage){
            $conditions['age'] = $tage;
        }            
        if($prole){
            $conditions['role'] = $prole;
        }

        $userList = $this->User->userList($conditions, $offset, $pagesize);
        $total = $this->User->getCount($conditions);
        if(!empty($userList)){
            foreach($userList as $key=>&$val){
                if(isset($val['user_id'])){
                    $val['id'] = $val['user_id']; 
                }
                if(isset($_GET['searchname'])){
                    $base = array();
                    $user = $this->User->getUserInfo(array('id'=>$val['id']));
                    if($ta && $user['area'] != $ta){
                        unset($userList[$key]);continue;
                    }
                    if($xt && $user['xintai'] != $xt){
                        unset($userList[$key]);continue;
                    }
                    if($ts && $user['nowstatus'] != $ts){
                        unset($userList[$key]);continue;
                    }            
                    if($tage && $user['age'] != $tage){
                        unset($userList[$key]);continue;
                    }
                }else{
                    $user = array();
                    $base = $this->UserProfile->getOne(array('user_id'=>$val['id']));
                }
                if(isset($val['base']['role']) && $val['base']['role'] && !empty($val['base'])){
                    $roleinfo = $this->Role->getRole(array('id'=>$val['base']['role']));
                    $val['rolename'] = isset($roleinfo['name']) ? $roleinfo['name'] : '';
                }
                $val['detail_info'] = $this->UserDetail->getUserDetail(array('user_id'=>$val['id']));
                #tag
                $val['tags'] = $this->UserTags->getUserTags(array('user_id'=>$val['id']));
                $userList[$key] = array_merge($val, $user, $base);
            }
        }

        $this->set('userList', $userList);
        //分页html
        $pagehtml = '';
        if($total>$pagesize){
            //可以显示分页
            $pageHtmlObj = $this->ListPage;
            $param = array(
            'total_rows' => $total,
            'method' => 'html',
            'parameter' => $this->dm['www'].'partner/?p=*',
            'now_page' => $p,
            'list_rows' => $pagesize
            );
            $pageHtmlObj->init($param);
            $pagehtml = $pageHtmlObj->show(1);
        }
        $this->set('pagehtml', $pagehtml);
        #area
        $arealist = $this->Area->getList(array(),0, 100);
        $this->set('arealist', $arealist);

        //推荐合伙人
        $recommend_user = $this->Partner->recommend();
        $this->set('recommend_user', $recommend_user);
        //推荐合伙人END
    }

    public function detail(){
        $user_id = intval($_GET['id']);
        if(!$user_id){
            $this->redirect("/partner");
        }
        $user = $this->User->getUserInfo(array('id'=>$user_id));
        $base_info = $this->UserProfile->getOne(array('user_id'=>$user_id));
        $detail_info = $this->UserDetail->getUserDetail(array('user_id'=>$user_id));
        $user_info = array_merge($user, $base_info, $detail_info);
        $this->set('user_info', $user_info);
        #industry
        $industryList = $this->Industry->getList();
        $industryRs = array();
        if(!empty($industryList)){
            foreach($industryList as $val){
                $industryRs[$val['id']] = $val['name'];
            }
        }
        $this->set('industryRs', $industryRs);
        #tag
        $user_tags = $this->UserTags->getUserTags(array('user_id'=>$user_id));
        //var_dump($user_info);
        $this->set('user_tags', $user_tags);

        #获取角色
        $roleList = $this->Role->getList();
        $roleRs = array();
        if(!empty($roleList)){
            foreach($roleList as $val){
                $roleRs[$val['id']] = $val['name'];
            }
        }
        $this->set('roleRs', $roleRs);
        #area

        //项目
        $conditions = array('user_id'=>$user_id);
        $hisProject = $this->UserProject->getList($conditions, 0, 3, 'ctime DESC');
        $this->set('hisProject', $hisProject);
        //问答
        $surveyData = $this->Surveydata->getOne(array('user_id'=>$user_id));
        if(!empty($surveyData)){
            $c = '';
            $rs = json_decode($surveyData['data'], true);
            if(!empty($rs)){
                foreach($rs as $key=>$val){
                    $s = $this->Surveyoptions->getOne(array('id'=>$val));
                    if(!empty($s)){
                        $c .= $s['name'];
                    }
                }
            }
            $surveyData['content'] = $c;
        }
        $this->set('surveyData', $surveyData);
        //评价
        $pagesize = 5;
        $p = isset($_GET['p']) ? intval($_GET['p']) : 1;
        $offset = ($p -1) * $pagesize;
        
        $user_comment = $this->UserComment->getList(array('touser_id'=>$user_id), $offset, $pagesize, 'ctime DESC');
        $total = $this->UserComment->getCount(array('touser_id'=>$user_id));
        if(!empty($user_comment)){
            foreach($user_comment as  $key=>$val){
                $user_comment[$key]['user'] = $this->User->getUserInfo(array('id'=>$val['user_id']));
            }
        }
        //分页html
        $pagehtml = '';
        if($total>$pagesize){
            //可以显示分页
            $pageHtmlObj = $this->ListPage;
            $pageHtmlObj->plus = 2;
            $param = array(
            'total_rows' => $total,
            'method' => 'html',
            'parameter' => $this->dm['www'].'partner/detail?id='.$user_id.'&p=*',
            'now_page' => $p,
            'list_rows' => $pagesize
            );
            $pageHtmlObj->init($param);
            $pagehtml = $pageHtmlObj->show(1);
        }
        $this->set('pagehtml', $pagehtml);
        
        $this->set('user_comment', $user_comment);
    }

    public function interview(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = intval($_GET['user_id']);
        $user = $this->User->getUserInfo(array('id'=>$user_id));
        $base_info = $this->UserProfile->getOne(array('user_id'=>$user_id));
        $detail_info = $this->UserDetail->getUserDetail(array('user_id'=>$user_id));
        $user_info = array_merge($user, $base_info, $detail_info);
        $this->set('user_info', $user_info);

        $conditions = array('or'=>array(array('fromuser_id'=>$user_id, 'touser_id'=>$this->userInfo['id']), array('touser_id'=>$user_id, 'fromuser_id'=>$this->userInfo['id'])) );
        $message = $this->Interview->getList($conditions);
        $this->set('message', $message);

    }

    public function ajaxinterview(){
        $touser_id = intval($_POST['touser_id']);
        $fromuser_id = intval($_POST['fromuser_id']);
        $message = addslashes(trim($_POST['message']));
        #add
        $time = time();
        $params = array(
        'fromuser_id' => $fromuser_id,
        'touser_id' => $touser_id,
        'message' => $message,
        'ctime' => $time
        );
        $rs = $this->Interview->addinfo($params);
        if($rs){
            $params['ctime'] = date('m月d日 H:i', $time);
            $params['avater'] = Url::getUserPic(array('uid'=>$fromuser_id, 'tp'=>'b'));
            $return = array('errCode'=>0, 'msg'=>$params);
        }else{
            $return = array('errCode'=>1, 'msg'=>'发送失败');
        }
        $this->outputJson($return);
    }


    public function addcomment(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];
        $content = !empty($_POST['content']) ? addslashes($_POST['content']) : '';
        $touser_id = !empty($_POST['touser_id']) ? intval($_POST['touser_id']) : 0;
        if(empty($content)){
            $this->goMsg('请输入评价内容', '/partner/detail?id='.$touser_id);
        }
        $params = array(
        'user_id' => $user_id,
        'comment' => $content,
        'touser_id' => $touser_id,
        'ctime' => time()
        );
        $rs = $this->UserComment->addinfo($params);
        if($rs){
            $this->goMsg('操作成功', '/partner/detail?id='.$touser_id);
        }else{
            $this->goMsg('操作失败', '/partner/detail?id='.$touser_id);
        }

    }
}
