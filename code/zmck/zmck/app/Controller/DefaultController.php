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
class DefaultController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array('User', 'Datacarousel');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $data = $this->Datacarousel->getList(array(), 0, 3, 'id DESC, order ASC');
        $this->set('data', $data);
        
        #最新合伙人
        $userList = $this->User->userList(array(), 0, 10, 'id DESC');
        if(!empty($userList)){
            foreach($userList as $k=>&$v){
                $v['baseinfo'] = $this->UserProfile->getOne(array('user_id'=>$v['id']));
            }
        }
        $this->set('userList', $userList);

    }

    public function aboutus(){

    }

    public function contactus(){

    }

    public function zhaopin(){

    }
}
