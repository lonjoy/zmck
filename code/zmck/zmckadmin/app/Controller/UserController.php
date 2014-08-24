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
class UserController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout='layout';
    public $uses = array('User', 'Role');
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

        $data = $this->User->userList();

        $this->set('data', $data);
    }


    public function addUser(){
        if(isset($_POST['dosubmit'])){

            $params = array(
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'nickname' => addslashes($_POST['nickname']),
            'role' => intval($_POST['role']),
            'gender' => intval($_POST['gender']),
            'intro' => addslashes($_POST['intro']),
            'agerange' => intval($_POST['agerange']),
            'workyears' => intval($_POST['workyears']),
            'regtime' => time(),
            );

            $id = $this->User->addUser($params);
            if(isset($_FILES['avatar']) && !empty($_FILES['avatar'])){
                $id = str_pad($id,9,0,STR_PAD_LEFT);
                $tmp=preg_replace("/^(\d{3})(\d{2})(\d{2})(\d{2,})/i","\\1/\\2/\\3/\\4",$id);
                $ret = $this->Upload->uploadedFile($_FILES['avatar'], AVATAR_PATH.$tmp.'_b'); //大
                #$ret = $this->Upload->uploadedFile($_FILES['avatar'], AVATAR_PATH.$tmp.'_m'); //中
                #$ret = $this->Upload->uploadedFile($_FILES['avatar'], AVATAR_PATH.$tmp.'_s'); //小的
            }
            $this->redirect('/user/');
        }
        //
        $roles = $this->Role->getList();
        $this->set('roles', $roles);
    }

    public function editUser(){
        if(isset($_POST['dosubmit'])){
            extract($_POST);

            $params = array(
            'email' => '"'.$_POST['email'].'"',
            'nickname' => "'".$_POST['nickname']."'",
            'role' => intval($role),
            'gender' => intval($gender),
            'intro' => "'".addslashes($intro)."'",
            'agerange' => intval($agerange),
            'workyears' => intval($workyears),
            );
            
            $id = intval($_POST['id']);
            if(isset($_FILES['avatar']) && !empty($_FILES['avatar'])){
                $file = $_FILES['avatar'];
                $id = str_pad($id,9,0,STR_PAD_LEFT);
                $tmp=preg_replace("/^(\d{3})(\d{2})(\d{2})(\d{2,})/i","\\1/\\2/\\3/\\4",$id);
                $ret = $this->Upload->uploadedFile($file, AVATAR_PATH.$tmp.'_b'); //大的
                #$ret = $this->Upload->uploadedFile($file, AVATAR_PATH.$tmp.'_s'); //小的
                #$ret = $this->Upload->uploadedFile($file, AVATAR_PATH.$tmp.'_m'); //中的
            }
            $conditions = array('id'=>$id);
            $this->User->updateUser($params, $conditions);
            $this->redirect('/user/editUser?id='.$id);
        }else{
            $id = intval($_GET['id']);
            $user_avatar = Url::getUserPic(array('uid'=>$id, 'tp'=>'b'));
            $this->set('user_avatar', $user_avatar);

            $roles = $this->Role->getList();
            $this->set('roles', $roles);

            $con = array('id' => $id);
            $data = $this->User->getUserInfo($con);
            $this->set('data', $data);
            $this->set('id', $id);
        }
    }

    public function roles(){

        $data = $this->Role->getList();

        $this->set('data', $data);
    }

    public function addRole(){
        if(isset($_POST['dosubmit'])){
            $params = array(
            'name' => $_POST['name'],
            'state' => intval($_POST['state']),
            'ctime' => time(),
            );

            $this->Role->addRole($params);
        }
    }

    public function editRole(){
        if(isset($_POST['dosubmit'])){
            $id = intval($_POST['id']);
            $params = array(
            'name' => "'".addslashes($_POST['name'])."'",
            'state' => intval($_POST['state']),
            );

            $this->Role->updateRole($params, array('id'=>$id));
            $this->redirect('/user/roles');
        }
        $id = intval($_GET['id']);
        $conditions = array('id'=>$id);
        $data =  $this->Role->getRole($conditions);
        $this->set('id', $id);
        $this->set('data', $data);
        
    }
}
