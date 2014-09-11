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

class RegController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array('User', 'UserProfile');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $email = isset($_POST['username']) ? addslashes($_POST['username']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $xintai = isset($_POST['xintai']) ? intval($_POST['xintai']) : 0;

        if(!$email || !$password){
            $this->goMsg('用户名密码必须填写', $this->dm['www']);
        }
        if(!$xintai){
            $this->goMsg('请选择你的创业心态', $this->dm['www']);
        }
        $user = $this->User->getUserInfo(array('email'=>$email));
        if(!empty($user)){
            $this->goMsg('该邮箱已被注册，请重新输入', $this->dm['www']);
        }
        $params = array('email'=>$email, 'password'=>md5($password), 'xintai'=>$xintai);
        $id = $this->User->addUser($params);
        #创建随机昵称
        $profiles = array('nickname' => '创客-'.$id, 'user_id'=>$id);
        $this->UserProfile->addinfo($profiles);
        if($id){
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email; 
            $_SESSION['xintai'] = $xintai; 
            $this->goMsg('恭喜！注册成功，请完善个人资料', $this->dm['www'].'user');
        }else{
            $this->goMsg('注册失败！请重新注册', $this->dm['www']);
        }
    }
}
