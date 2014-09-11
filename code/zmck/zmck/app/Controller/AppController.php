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
App::uses('Url', 'Utility');
class AppController extends Controller {
    public $layout = 'default';

    public $components = array();
    public $uses = array('User', 'Site', 'Follow', 'UserProfile');

    public $userInfo=array();
    //初始化设置
    public function beforeFilter()
    {
        $this->meta = Configure::read('meta');
        $this->dm   = Configure::read('dm');

        $this->set('dm', $this->dm);
        $this->set('meta', $this->meta);

        $this->age = Configure::read('age');
        $this->xintai = Configure::read('xintai');
        $this->workyears   = Configure::read('workyears');
        $this->nowstatus   = Configure::read('nowstatus');
        $this->startupExperience   = Configure::read('startupExperience');
        $this->startupMoney   = Configure::read('startupMoney');
        $this->spenttime   = Configure::read('spenttime');
        $this->startupArea   = Configure::read('startupArea');

        $this->set('age', $this->age);
        $this->set('xintai', $this->xintai);
        $this->set('workyears', $this->workyears);
        $this->set('nowstatus', $this->nowstatus);
        $this->set('startupExperience', $this->startupExperience);
        $this->set('startupMoney', $this->startupMoney);
        $this->set('spenttime', $this->spenttime);
        $this->set('startupArea', $this->startupArea);
        
        #站点基本信息
        $siteinfo = $this->Site->getList();
        $sitesetting = array();
        if(!empty($siteinfo)){
            foreach($siteinfo as $val){
                $sitesetting[$val['name']] = $val['value'];
            }
        }
        $this->set('sitesetting', $sitesetting);

        /*初始化登录状态*/
        $user_info=array();
        $useravater = $this->dm['www'].'img/basic_infor_1.jpg';
        if(isset($_SESSION['user_id'])){
            $user_id = intval($_SESSION['user_id']);
            if($user_id && $this->request->params['controller']=='home'){
                $this->redirect("/default");
            }
            $useravater = Url::getUserPic(array('uid'=>$user_id, 'tp'=>'b'));
            $user = $this->User->getUserInfo(array('id'=>$user_id));
            #baseinfo
            $base_info = $this->UserProfile->getOne(array('user_id'=>$user_id));
            unset($user_info['password']);
            
            $user_info = array_merge($user, $base_info);
            #
            $user_info['follows'] = $this->Follow->getCount(array('user_id'=>$user_id)); //我关注的的
            $user_info['followed'] = $this->Follow->getCount(array('follower_id'=>$user_id)); //被关注的的
            $this->userInfo = $user_info;
            $this->userInfo['useravater'] = $useravater;
        }
        //用户映射到view
        $this->set('userInfo', $this->userInfo);
    }


    /**
    * 跳转
    * @param string $message
    * @param string $url
    * @param int $pause
    * @param string $layout
    */
    public function goMsg($message, $url, $second=1000, $pause = 1, $layout = 'showmsg') {
        $this->autoRender = true;
        $this->set('url', Router::url($url));
        $this->set('message', $message);
        $this->set('time', $pause*$second);
        $this->set('page_title', $message);
        echo $this->render('/Layouts/'.$layout);
        exit();
    }
    
     /**
     * 输出json数据，终止程序
     */
    public function outputJson($array)
    {
        header ( "Content-Type: application/json; charset=utf-8" );
        exit(json_encode($array));
    }
}
