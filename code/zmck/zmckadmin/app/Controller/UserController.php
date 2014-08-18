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
class UserController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout='layout';
    public $uses = array('User', 'Role');

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
            extract($_POST);

            $params = array(
            'email' => $email,
            'password' => md5($password),
            'role' => intval($role),
            'gender' => intval($gender),
            'agerange' => intval($agerange),
            'workyears' => intval($workyears),
            'regtime' => time(),
            );

            $this->User->addUser($params);
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
            'agerange' => intval($agerange),
            'workyears' => intval($workyears),
            );
            $id = intval($_POST['id']);
            $conditions = array('id'=>$id);
            $this->User->updateUser($params, $conditions);
            $this->redirect('/user/editUser?id='.$id);
        }else{
            $id = intval($_GET['id']);

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
            $params = array(
            'name' => $_POST['name'],
            'state' => intval($_POST['state']),
            'ctime' => time(),
            );

            $this->Role->editRole($params);
        }
    }
}
