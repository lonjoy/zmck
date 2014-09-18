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
class MessageController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array('Interview', 'User', 'UserProfile', 'SysMessage');
    public $layout = 'default';

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
        $user_id = $this->userInfo['id'];
        $pagesize = 30;
        $p = isset($_GET['p'])?intval($_GET['p']):1;
        $offset = ($p-1) * $pagesize;

        $order = '';
        $group = array('fromuser_id');

        $data = $this->Interview->getList(array('touser_id'=>$user_id), $offset, $pagesize, $order, $group);
        if(!empty($data)){
            foreach($data as &$val){
                #获取用户信息
                $user = $this->User->getUserInfo(array('id'=>$val['fromuser_id']));
                $baseinfo = $this->UserProfile->getOne(array('user_id'=>$val['fromuser_id']));
                $val['userinfo'] = array_merge($user, $baseinfo);
            }
        }
        
        $count = $this->Interview->getCount(array('touser_id'=>$user_id), $group);

        //分页html
        $pagehtml = '';
        $total = $count;
        if($total>$pagesize){
            //可以显示分页
            $pageHtmlObj = $this->ListPage;
            $param = array(
            'total_rows' => $total,
            'method' => 'html',
            'parameter' => $this->dm['www'].'message/index/?p=*',
            'now_page' => $p,
            'list_rows' => $pagesize
            );
            $pageHtmlObj->init($param);
            $pagehtml = $pageHtmlObj->show(1);
        }
        $this->set('pagehtml', $pagehtml);
        $this->set('data', $data);
    }

    public function ban(){

    }

    public function jianli(){

    }    

    public function sys(){
        $data = $this->SysMessage->getList(array(), 0, 30, $order='ctime DESC');

        $this->set('data', $data);
    }
}
