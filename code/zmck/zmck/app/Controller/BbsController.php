<?php
/**
* BbsController.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Controller
* @since         CakePHP(tm) v 0.2.9
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

App::uses('AppController', 'Controller');
App::uses('Url', 'Utility');
class BbsController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array('User', 'Forum', 'ForumPost', 'ForumThreads', 'UserProfile');
    public $components = array('ListPage');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $data = $this->Forum->getList();
        /*
        $count = $this->Forum->getCount($conditions);
        //初始分页不用改变
        $p = isset($_GET['p'])?intval($_GET['p']):1;

        //每页显示多少条记录
        $pagesize = 10;
        //分页html
        $data['pagehtml'] = '';
        $total = $otherCourseCount;
        if($total>$pagesize){
        //可以显示分页
        $pageHtmlObj = $this->ListPage;
        $param = array(
        'total_rows' => $total,
        'method' => 'html',
        'parameter' => $this->dm['www'].'bbs/index/?p=*',
        'now_page' => $p,
        'list_rows' => $pagesize
        );
        $pageHtmlObj->init($param);
        $data['pagehtml'] = $pageHtmlObj->show(1);
        }
        */
        $this->set('data', $data);
        $hot_topic = $this->hotTopic();
        $this->set('hot_topic', $hot_topic);
    }

    public function subject(){
        $fid = isset($_GET['fid']) ? intval($_GET['fid']) : '';
        if(!$fid){
            $this->goMsg('此圈子不存在或已被删除', '/bbs'); 
        }
        $order = isset($_GET['order']) ? $_GET['order'] : 'time';
        $order_str = '';
        switch($order){
            case 'time' : $order_str = 'ctime DESC';break;
            case 'hot' : $order_str = 'replynum DESC';break;
            case 'jinghua' : $order_str = 'jinghua DESC';break;
            default: $order_str = 'ctime DESC';break;
        }
        $pagesize = 30;
        $p = isset($_GET['p'])?intval($_GET['p']):1;
        $offset = ($p-1) * $pagesize;

        $data = $this->ForumPost->getList(array('fid'=>$fid), $offset, $pagesize, $order_str);
        $count = $this->ForumPost->getCount(array('fid'=>$fid));

        //分页html
        $pagehtml = '';
        $total = $count;
        if($total>$pagesize){
            //可以显示分页
            $pageHtmlObj = $this->ListPage;
            $param = array(
            'total_rows' => $total,
            'method' => 'html',
            'parameter' => $this->dm['www'].'bbs/subject/?fid='.$fid.'&order='.$order.'&p=*',
            'now_page' => $p,
            'list_rows' => $pagesize
            );
            $pageHtmlObj->init($param);
            $pagehtml = $pageHtmlObj->show(1);
        }
        $this->set('pagehtml', $pagehtml);
        $this->set('data', $data);
        $this->set('fid', $fid);
        
        $hot_topic = $this->hotTopic();
        $this->set('hot_topic', $hot_topic);
    }

    public function threads(){
        $fid = isset($_GET['fid']) ? intval($_GET['fid']) : 0;
        $pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
        $postinfo = $this->ForumPost->getOne(array('fid'=>$fid, 'pid'=>$pid));
        $postinfo['userinfo'] = $this->UserProfile->getOne(array('user_id'=>$postinfo['author_id']));
        $postinfo['userinfo']['id'] = $postinfo['author_id'];
        $postinfo['userinfo']['avater'] = Url::getUserPic(array('uid'=>$postinfo['author_id'], 'tp'=>'b'));
        $this->set('postinfo', $postinfo);

        $pagesize = 30;
        $p = isset($_GET['p'])?intval($_GET['p']):1;
        $offset = ($p-1) * $pagesize;

        $reply_list = $this->ForumThreads->getList(array('fid'=>$fid, 'pid'=>$pid, 'ismaster <>'=>1), $offset, $pagesize, 'ctime ASC');
        $count = $this->ForumThreads->getCount(array('fid'=>$fid, 'pid'=>$pid, 'ismaster <>'=>1));

        if(!empty($reply_list)){
            foreach($reply_list as &$val){
                #user
                $base_info = $this->UserProfile->getOne(array('user_id'=>$val['author_id']));
                $user = $this->User->getUserInfo(array('id'=>$val['author_id']));
                $val['userinfo'] = array_merge($user, $base_info);
                $val['userinfo']['avater'] = Url::getUserPic(array('uid'=>$val['author_id'], 'tp'=>'b'));
            }
        }
        $this->set('reply_list', $reply_list);

        //分页html
        $pagehtml = '';
        $total = $count;
        if($total>$pagesize){
            //可以显示分页
            $pageHtmlObj = $this->ListPage;
            $param = array(
            'total_rows' => $total,
            'method' => 'html',
            'parameter' => $this->dm['www'].'bbs/subject/?fid='.$fid.'&order='.$order.'&p=*',
            'now_page' => $p,
            'list_rows' => $pagesize
            );
            $pageHtmlObj->init($param);
            $pagehtml = $pageHtmlObj->show(1);
        }
        $this->set('pagehtml', $pagehtml);
        $this->ForumPost->updateinfo(array('clicknum'=>'`clicknum`+1'), array('pid'=>$pid));
        
        $hot_topic = $this->hotTopic();
        $this->set('hot_topic', $hot_topic);
    }

    public function reply(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];
        if(isset($_POST['dosubmit'])){
            $subject = isset($_POST['subject']) ? addslashes($_POST['subject']) : '';
            $content = isset($_POST['content']) ? addslashes($_POST['content']) : '';
            $fid = isset($_POST['fid']) ? intval($_POST['fid']) : 0;
            $pid = isset($_POST['pid']) ? intval($_POST['pid']) : 0;
            if(!$subject || !$content){
                $this->goMsg('请填写完整信息', '/bbs/threads?fid='.$fid.'&pid='.$pid);
            }
            $now = time();
            $params = array(
            'fid' => $fid,
            'pid' => $pid,
            'subject' => $subject,
            'author' => $this->userInfo['nickname'],
            'author_id' => $user_id,
            'ctime' => $now,
            'content' => $content,
            );
            $tid = $this->ForumThreads->addinfo($params);
            if($tid){
                #添加圈子数量
                $this->ForumPost->updateinfo(array('replynum'=>'`replynum`+1', 'replytime'=>$now), array('pid'=>$pid));
                $this->goMsg('回复成功！', '/bbs/threads?fid='.$fid.'&pid='.$pid);
            }else{
                $this->goMsg('回复失败！', '/bbs/threads?fid='.$fid.'&pid='.$pid);
            }
        }
    }

    public function publish(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];
        if(isset($_POST['dosubmit'])){
            $subject = isset($_POST['subject']) ? addslashes($_POST['subject']) : '';
            $content = isset($_POST['content']) ? addslashes($_POST['content']) : '';
            $fid = isset($_POST['fid']) ? intval($_POST['fid']) : 0;
            if(!$subject || !$content){
                $this->goMsg('请填写完整信息', '/bbs/subject?fid='.$fid);
            }
            $params = array(
            'fid' => $fid,
            'subject' => $subject,
            'author' => $this->userInfo['nickname'],
            'author_id' => $user_id,
            'ctime' => time(),
            'content' => $content,
            );
            $pid = $this->ForumPost->addinfo($params);
            if($pid){
                #添加圈子数量
                $this->Forum->updateinfo(array('posts'=>'`posts`+1'), array('id'=>$fid));
                #
                $params['ismaster'] = 1; //主贴
                $params['pid'] = $pid; //主贴
                $this->ForumThreads->addinfo($params);
                $this->goMsg('发布成功！', '/bbs/subject?fid='.$fid);
            }else{
                $this->goMsg('发布失败！', '/bbs/subject?fid='.$fid);
            }
        }
    }


    public function hotTopic(){
        $data = $this->ForumPost->getList(array(), 0, 6, 'replynum DESC');
        return $data;
    }
    
    public function viewthread(){
        
    }
}
