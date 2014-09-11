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

class LoginController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array('User');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $email = isset($_POST['email']) ? addslashes($_POST['email']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if(!$email || !$password){
            $this->goMsg('用户名密码必须填写', $this->dm['www']);
        }

        $user = $this->User->getUserInfo(array('email'=>$email, 'password'=>md5($password)));
        if(!empty($user)){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email']; 
            $_SESSION['xintai'] = $user['xintai'];
            $this->goMsg('恭喜！登录成功', $this->dm['www'].'default');
        }else{
            $this->goMsg('用户名密码错误，请重新输入', $this->dm['www']);
        }
    }
    
    
    public function loginout(){
        session_destroy();
        $this->goMsg('恭喜！登录成功', $this->dm['www']);
    }
}
