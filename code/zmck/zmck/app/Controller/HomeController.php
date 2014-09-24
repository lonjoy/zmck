<?php
/**
* Static content controller.
*
* This file will render views from views/pages/
*
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
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
class HomeController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array('User', 'Role');
    public $layout = 'index';

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *	or MissingViewException in debug mode.
    */
    public function index() {
        #首页推荐人
        App::uses('Url', 'Utility');
        $i = '1';
        $conditions = array('homeshow'=>$i);
        $order = '';
        $data = $this->User->userList($conditions, 0, 16, $order);
        
        $this->set('data', $data);

        $roles_data = $this->Role->getList();
        $roles = array();
        if(!empty($roles_data)){
            foreach($roles_data as $val){
                $roles[$val['id']] = $val['name'];
            }
        }
        
        $this->set('roles', $roles);

    }
}
