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
            $params = array(
            'name' => '"'.$_POST['name'].'"',
            'nickname' => "'".$_POST['nickname']."'",
            'role' => intval($_POST['role']),
            'gender' => $gender,
            'agerange' => intval($_POST['agerange']),
            'workyears' => intval($_POST['workyears']),
            );
            if(!empty($userinfo)){
                $res = $this->UserProfile->updateinfo($params, $conditions);
            }else{
                $params['user_id'] = $this->userInfo['user_id'];
                $res = $this->UserProfile->addinfo($params);
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

}
