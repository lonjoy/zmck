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
    public $uses = array('User', 'Role', 'Industry', 'UserDetail', 'UserTags');
    public $components = array('Upload');

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
    public function topic(){

    }

    /**
    * 项目
    * 
    */
    public function project(){

    }

    public function addproject(){

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
