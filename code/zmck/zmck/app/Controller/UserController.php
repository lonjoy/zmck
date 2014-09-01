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
    public $uses = array('User', 'Role', 'Industry');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $user_id = 1;//$this->userInfo['id'];
        $conditions = array('id'=>$user_id);
        if(isset($_POST['dosubmit'])){
            $params = array(
            'name' => '"'.$_POST['name'].'"',
            'nickname' => "'".$_POST['nickname']."'",
            'role' => intval($_POST['role']),
            'gender' => intval($_POST['gender']),
            'agerange' => intval($_POST['agerange']),
            'workyears' => intval($_POST['workyears']),
            );
            $this->User->updateUser($params, $conditions);
            $this->redirect('/user/index');
        }
        $userinfo = $this->User->getUserInfo($conditions);
        $this->set('userinfo', $userinfo);
        #获取角色
        $roleList = $this->Role->getList();
        $this->set('roleList', $roleList);
    }


    public function detail(){
        $user_id = 1;//$this->userInfo['id'];
        $conditions = array('id'=>$user_id);
        $userinfo = $this->User->getUserInfo($conditions);
        $this->set('userinfo', $userinfo);
        $industry = $this->Industry->getList();
        $this->set('industry', $industry);
    }

    public function tag(){

    }

    public function state(){

    }

    public function auth(){

    } 

    public function companyauth(){

    } 


    public function background(){

    }

    public function password(){

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
