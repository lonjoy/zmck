<?php
/**
* CompanyController.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Controller
* @since         CakePHP(tm) v 0.2.9
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

App::uses('AppController', 'Controller');

class UserController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array('User', 'Role', 'Industry', 'UserDetail', 'UserTags', 'UserProject', 'ProjectDirection', 'Forum', 'ForumPost', 'ForumThreads');
    public $components = array('Upload', 'Partner', 'ListPage');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $_SESSION['user_id'];
        $conditions = array('user_id'=>$user_id);
        $userinfo = $this->UserProfile->getOne($conditions);
        $this->set('userinfo', $userinfo);
        if(isset($_POST['dosubmit'])){
            $gender = isset($_POST['gender']) ? intval($_POST['gender']) : 0;
            if(empty($userinfo)){
                $params = array(
                'user_id' => $this->userInfo['id'],
                'name' => addslashes($_POST['name']),
                'nickname' => addslashes($_POST['nickname']),
                'role' => intval($_POST['role']),
                'gender' => $gender,
                'agerange' => intval($_POST['agerange']),
                'workyears' => intval($_POST['workyears']),
                );
                $res = $this->UserProfile->addinfo($params);
                $this->User->updateUser(array('nickname' => "'".addslashes($_POST['nickname'])."'",'role' => intval($_POST['role']),'agerange' => intval($_POST['agerange']),'workyears' => intval($_POST['workyears']),),array('id'=>$user_id));
            }else{
                $params = array(
                'user_id' => $this->userInfo['user_id'],
                'name' => '"'.addslashes($_POST['name']).'"',
                'nickname' => "'".addslashes($_POST['nickname'])."'",
                'role' => intval($_POST['role']),
                'gender' => $gender,
                'agerange' => intval($_POST['agerange']),
                'workyears' => intval($_POST['workyears']),
                );
                $res = $this->UserProfile->updateinfo($params, $conditions);
                $this->User->updateUser(array('nickname' => "'".addslashes($_POST['nickname'])."'",'role' => intval($_POST['role']),'agerange' => intval($_POST['agerange']),'workyears' => intval($_POST['workyears']),),array('id'=>$user_id));
            }
            if($res){
                $this->goMsg('修改成功', '/user/index');
            }
        }

        #获取角色
        $roleList = $this->Role->getList();
        $this->set('roleList', $roleList);
    }


    public function detail(){
        $user_id = $_SESSION['user_id'];
        $conditions = array('user_id'=>$user_id);
        $userdetail = $this->UserDetail->getUserDetail($conditions);
        $userinfo = $this->UserProfile->getOne($conditions);

        if(isset($_POST['dosubmit'])){
            $industry_id = intval($_POST['industry_id']);
            $intro = isset($_POST['intro']) ? addslashes($_POST['intro']) : '';
            $study_experience = isset($_POST['study_experience']) ? addslashes($_POST['study_experience']) : '';
            $work_experience = isset($_POST['work_experience']) ? addslashes($_POST['work_experience']) : '';

            if(!empty($userdetail)){
                $params = array(
                'industry_id' => $industry_id,
                'intro' => "'".$intro."'",
                'study_experience' => "'".$study_experience."'",
                'work_experience' => "'".$work_experience."'",
                );
                $conditions = array('user_id'=>$user_id);
                $this->UserDetail->updateUserDetail($params, $conditions);
            }else{
                $params = array(
                'industry_id' => $industry_id,
                'intro' => $intro,
                'study_experience' => $study_experience,
                'work_experience' => $work_experience,
                'ctime' => time(),
                'user_id' => $user_id
                );
                $this->UserDetail->addUserDetail($params);
            }
            $this->goMsg('修改成功', '/user/detail');
        }

        $this->set('userdetail', $userdetail);

        $industry = $this->Industry->getList();
        $this->set('industry', $industry);
    }

    public function tag(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];

        $conditions = array('user_id'=>$user_id);
        $userTags = array();
        $userTaginfo = $this->UserTags->getUserTags($conditions);
        if(!empty($userTaginfo['tags'])){
            $userTags = unserialize($userTaginfo['tags']);
        }

        if(isset($_POST['dosubmit'])){
            $user_tags = isset($_POST['usertags']) ? $_POST['usertags'] : array();
            $user_tags = serialize($user_tags);
            if(!empty($userTaginfo)){
                $params = array(
                'tags' => "'".$user_tags."'",
                );
                $this->UserTags->updateUserTags($params, $conditions);
            }else{
                $params = array(
                'tags' => $user_tags,
                'user_id' => $user_id
                );
                $this->UserTags->addUserTag($params);
            }
            $this->goMsg('修改成功', '/user/tag');
        }

        $this->set('userTags', $userTags);
    }

    public function state(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];
        if(isset($_POST['dosubmit'])){
            $xintai = intval($_POST['xintai']);
            $nowstatus = intval($_POST['nowstatus']);
            $params = array(
            'xintai' => $xintai,
            'nowstatus' => $nowstatus
            );
            $conditions = array('id'=>$user_id);
            $this->User->updateUser($params, $conditions);
            $this->goMsg('修改成功', '/user/state');
        }
    }

    public function auth(){

    } 

    public function companyauth(){

    } 


    public function background(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];
        if(isset($_POST['dosubmit'])){
            $startupExperience = intval($_POST['startupExperience']);
            $startupMoney = intval($_POST['startupMoney']);
            $spenttime = intval($_POST['spenttime']);
            $startupArea = intval($_POST['startupArea']);

            $params = array(
            'startupExperience' => $startupExperience,
            'startupMoney' => $startupMoney,
            'spenttime' => $spenttime,
            'startupArea' => $startupArea,
            );
            $conditions = array('id'=>$user_id);
            $this->User->updateUser($params, $conditions);
            $this->goMsg('修改成功', '/user/background');
        }
    }

    public function password(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];
        if(isset($_POST['dosubmit'])){
            $oldpassword = $_POST['oldpassword'];
            $newpassword = $_POST['newpassword'];
            $newpasswordconfirm = $_POST['newpasswordconfirm'];
            if($newpassword != $newpasswordconfirm){
                $this->goMsg('两次输入的密码不一致！请重新输入', '/user/password');
            }
            $user = $this->User->getUserInfo(array('id'=>$user_id));
            if($user['password'] != md5($oldpassword)){
                $this->goMsg('当前密码输入错误，请重新输入', '/user/password');
            }
            $res = $this->User->updateUser(array('password'=>"'".md5($newpassword)."'"), array('id'=>$user_id));
            if($res){
                $this->goMsg('修改成功，请牢记新密码', '/user/password');
            }else{
                $this->goMsg('修改失败，请重新输入', '/user/password');
            }
        }
    }

    /**
    * 创业话题
    * 
    */
    public function mytopic(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];

        $conditions = array('author_id'=>$user_id);
        $p = isset($_GET['p']) && intval($_GET['p']) > 0 ? $_GET['p'] : 1;
        $limit = 20;
        $offset = ($p -1) * $limit;
        $order = '';
        $data = $this->ForumPost->getList($conditions, $offset, $limit, $order);
        $total = $this->ForumPost->getCount($conditions);

        $this->set('data', $data);

        //分页html
        $pagehtml = '';
        if($total>$limit){
            //可以显示分页
            $pageHtmlObj = $this->ListPage;
            $param = array(
            'total_rows' => $total,
            'method' => 'html',
            'parameter' => $this->dm['www'].'user/mytopic?p=*',
            'now_page' => $p,
            'list_rows' => $limit
            );
            $pageHtmlObj->init($param);
            $pagehtml = $pageHtmlObj->show(1);
        }
        $this->set('pagehtml', $pagehtml);
    }

    /**
    * 参与话题
    * 
    */
    public function topic(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];

        $conditions = array('author_id'=>$user_id);
        $p = isset($_GET['p']) && intval($_GET['p']) > 0 ? $_GET['p'] : 1;
        $limit = 20;
        $offset = ($p -1) * $limit;
        $order = '';
        $data = $this->ForumPost->getList($conditions, $offset, $limit, $order);
        $total = $this->ForumPost->getCount($conditions);

        $this->set('data', $data);

        //分页html
        $pagehtml = '';
        if($total>$limit){
            //可以显示分页
            $pageHtmlObj = $this->ListPage;
            $param = array(
            'total_rows' => $total,
            'method' => 'html',
            'parameter' => $this->dm['www'].'user/mytopic?p=*',
            'now_page' => $p,
            'list_rows' => $limit
            );
            $pageHtmlObj->init($param);
            $pagehtml = $pageHtmlObj->show(1);
        }
        $this->set('pagehtml', $pagehtml);
    }

    /**
    * 项目
    * 
    */
    public function project(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];
        //推荐合伙人
        $recommend_user = $this->Partner->recommend();
        $this->set('recommend_user', $recommend_user);
        //推荐合伙人END

        $projectList = $this->UserProject->getList(array('user_id'=>$user_id), 0, 30, 'ctime DESC');
        $this->set('projectList', $projectList);

    }

    public function addproject(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];
        if(isset($_POST['dosubmit'])){
            $logo = !empty($_POST['logo']) ? $_POST['logo'] : '';
            $name = !empty($_POST['name']) ? addslashes($_POST['name']) : '';
            $direction = isset($_POST['direction']) ? intval($_POST['direction']) : 0;
            $stage = !empty($_POST['stage']) ? intval($_POST['stage']) : 0;
            $brief = !empty($_POST['brief']) ? addslashes($_POST['brief']) : '';
            $advantage = !empty($_POST['advantage']) ? addslashes($_POST['advantage']) : '';
            $teamstatus = !empty($_POST['teamstatus']) ? addslashes($_POST['teamstatus']) : '';
            $investstatus = !empty($_POST['investstatus']) ? intval($_POST['investstatus']) : 0;
            $investmoney = !empty($_POST['investmoney']) ? intval($_POST['investmoney']) : 0;
            $needpartner = !empty($_POST['needpartner']) ? $_POST['needpartner'] : array();
            $partnerduty = !empty($_POST['partnerduty']) ? addslashes($_POST['partnerduty']) : '';
            $cooperation = isset($_POST['cooperation']) ? intval($_POST['cooperation']) : 0;
            $huibao = !empty($_POST['huibao']) ? addslashes($_POST['huibao']) : '';

            if(!$name || !$brief || !$advantage){
                $this->goMsg('请填写完整信息后提交', '/user/addproject'); 
            }
            $needpartner = implode('|', $needpartner);

            $params = array(
            'user_id' => $user_id,
            'logo' => $logo,
            'name' => $name,
            'direction' => $direction,
            'stage' => $stage,
            'brief' => $brief,
            'advantage' => $advantage,
            'teamstatus' => $teamstatus,
            'investstatus' => $investstatus,
            'investmoney' => $investmoney,
            'needpartner'=> $needpartner,
            'partnerduty' => $partnerduty,
            'cooperation' => $cooperation,
            'huibao' => $huibao,
            'ctime' => time(),
            );
            $id = $this->UserProject->addinfo($params);
            if($id){
                $this->goMsg('添加成功', '/user/project'); 
            }else{
                $this->goMsg('添加失败', '/user/addproject');
            }
        }
        //推荐合伙人
        $recommend_user = $this->Partner->recommend();
        $this->set('recommend_user', $recommend_user);
        //推荐合伙人END
        $prodirection = $this->ProjectDirection->getList();
        $this->set('prodirection', $prodirection);
        #获取角色
        $roleList = $this->Role->getList();
        $this->set('roleList', $roleList);
    }

    public function editproject(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];

        $id = intval($_REQUEST['proid']);
        if(isset($_POST['dosubmit'])){
            $logo = !empty($_POST['logo']) ? $_POST['logo'] : '';
            $name = !empty($_POST['name']) ? addslashes($_POST['name']) : '';
            $direction = isset($_POST['direction']) ? intval($_POST['direction']) : 0;
            $stage = !empty($_POST['stage']) ? intval($_POST['stage']) : 0;
            $brief = !empty($_POST['brief']) ? addslashes($_POST['brief']) : '';
            $advantage = !empty($_POST['advantage']) ? addslashes($_POST['advantage']) : '';
            $teamstatus = !empty($_POST['teamstatus']) ? addslashes($_POST['teamstatus']) : '';
            $investstatus = !empty($_POST['investstatus']) ? intval($_POST['investstatus']) : 0;
            $investmoney = !empty($_POST['investmoney']) ? intval($_POST['investmoney']) : 0;
            $needpartner = !empty($_POST['needpartner']) ? $_POST['needpartner'] : array();
            $partnerduty = !empty($_POST['partnerduty']) ? addslashes($_POST['partnerduty']) : '';
            $cooperation = isset($_POST['cooperation']) ? intval($_POST['cooperation']) : 0;
            $huibao = !empty($_POST['huibao']) ? addslashes($_POST['huibao']) : '';
            if(!$name ||  !$brief || !$advantage){
                $this->goMsg('请填写完整信息后提交', '/user/editproject?proid='.$id); 
            }
            $needpartner = implode('|', $needpartner);

            $params = array(
            'logo' => "'".$logo."'",
            'name' => "'".$name."'",
            'direction' => $direction,
            'stage' => $stage,
            'brief' => "'".$brief."'",
            'advantage' => "'".$advantage."'",
            'teamstatus' => "'".$teamstatus."'",
            'investstatus' => $investstatus,
            'investmoney' => $investmoney,
            'needpartner'=> "'".$needpartner."'",
            'partnerduty' => "'".$partnerduty."'",
            'cooperation' => $cooperation,
            'huibao' => "'".$huibao."'",
            );
            $proid = $this->UserProject->updateinfo($params, array('id'=>$id));
            if($proid){
                $this->goMsg('编辑成功', '/user/editproject?proid='.$id); 
            }else{
                $this->goMsg('编辑失败', '/user/editproject?proid='.$id);
            }
        }
        //推荐合伙人
        $recommend_user = $this->Partner->recommend();
        $this->set('recommend_user', $recommend_user);
        //推荐合伙人END
        #获取角色
        $roleList = $this->Role->getList();
        $this->set('roleList', $roleList);
        //方向
        $prodirection = $this->ProjectDirection->getList();
        $this->set('prodirection', $prodirection);
        $data = $this->UserProject->getOne(array('id'=>$id));
        $this->set('data', $data);
    }

    public function delproject(){
        $proid = intval($_GET['proid']);
        $ret = $this->UserProject->delinfo(array('id'=>$proid));
        if($ret){
            $this->goMsg('操作成功', '/user/project');
        }else{
            $this->goMsg('操作失败', '/user/project');
        }
    }

    public function ajaxprojectpic(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];
        if(isset($_FILES['pic']) && !empty($_FILES['pic'])){
            //查询用户项目信息
            $userproject = $this->UserProject->getList(array('user_id'=>$user_id),0,1, 'id desc');
            if(!empty($userproject)){
                $id = substr(md5($user_id.'_'.$userproject[0]['id']), 8, 16);
            }else{
                $id = substr(md5($user_id.'_1'), 8, 16);
            }

            $tmp=preg_replace("/^(\w{4})(\w{4})(\w{4})(\w{4,})/i","\\1/\\2/\\3/\\4", $id);
            $ret = $this->Upload->uploadedFile($_FILES['pic'], PROJECT_PIC_PATH.$tmp.'_b'); //大
            #$ret = $this->Upload->uploadedFile($_FILES['avatar'], AVATAR_PATH.$tmp.'_m'); //中
            #$ret = $this->Upload->uploadedFile($_FILES['avatar'], AVATAR_PATH.$tmp.'_s'); //小的
            if($ret['errCode']==0){
                $rs = array(
                'errCode' => 0,
                'msg' => $id,
                'url' => Url::getProjectPic($id)
                );
            }else{
                $rs = $ret;
            }
            $this->outputJson($rs);
        }
    }


    public function uploadavater(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];
        if(isset($_FILES['avatar']) && !empty($_FILES['avatar'])){
            $id = str_pad($user_id,9,0,STR_PAD_LEFT);
            $tmp=preg_replace("/^(\d{3})(\d{2})(\d{2})(\d{2,})/i","\\1/\\2/\\3/\\4", $id);
            $ret = $this->Upload->uploadedFile($_FILES['avatar'], AVATAR_PATH.$tmp.'_b'); //大
            #$ret = $this->Upload->uploadedFile($_FILES['avatar'], AVATAR_PATH.$tmp.'_m'); //中
            #$ret = $this->Upload->uploadedFile($_FILES['avatar'], AVATAR_PATH.$tmp.'_s'); //小的
            if($ret['errCode']==0){
                $rs = array(
                'errCode' => 0,
                'msg' => 'ok',
                'url' => Url::getUserPic(array('uid'=>$user_id, 'tp'=>'b'))
                );
            }else{
                $rs = $ret;
            }
            $this->outputJson($rs);
        }  
    }

}
