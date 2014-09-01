<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $layout = 'default';

    public $components = array();

    //初始化设置
    public function beforeFilter()
    {
        $this->meta = Configure::read('meta');
        $this->dm   = Configure::read('dm');

        $this->set('dm', $this->dm);
        $this->set('meta', $this->meta);
        
        $this->age = Configure::read('age');
        $this->workyears   = Configure::read('workyears');

        $this->set('age', $this->age);
        $this->set('workyears', $this->workyears);
        
        
        /*初始化登录状态
        $this->UserAuth = $this->Components->load('UserAuth');
        $this->UserAuth->loginInit();
        $this->userIsLogin = $this->UserAuth->userIsLogin;

        $user_info = $this->UserAuth->userInfo;
        $this->userInfo    = $user_info;
        //用户映射到view
        $this->set('userIsLogin', $this->userIsLogin);
        $this->set('userInfo', $this->userInfo);
        */



    }
}
