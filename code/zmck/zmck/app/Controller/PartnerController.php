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
class PartnerController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array('User', 'Role', 'UserProfile','UserTags', 'Industry', 'UserDetail');
    public $components = array('ListPage');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        #获取角色
        $roleList = $this->Role->getList();
        $this->set('roleList', $roleList);

        $pagesize = 10;
        $p = isset($_GET['p'])?intval($_GET['p']):1;
        $offset = ($p-1) * $pagesize;
        $conditions = array();
        $userList = $this->User->userList($conditions, $offset, $pagesize);
        if(!empty($userList)){
            foreach($userList as &$val){
                $val['base'] = $this->UserProfile->getOne(array('user_id'=>$val['id']));
                if(isset($val['base']['role']) && $val['base']['role'] && !empty($val['base'])){
                    $roleinfo = $this->Role->getRole(array('id'=>$val['base']['role']));
                    $val['rolename'] = isset($roleinfo['name']) ? $roleinfo['name'] : '';
                }
                #tag
                $val['tags'] = $this->UserTags->getUserTags(array('user_id'=>$val['id']));
            }
        }
        $total = $this->User->getCount($conditions);
        $this->set('userList', $userList);
        //分页html
        $pagehtml = '';
        if($total>$pagesize){
            //可以显示分页
            $pageHtmlObj = $this->ListPage;
            $param = array(
            'total_rows' => $total,
            'method' => 'html',
            'parameter' => $this->dm['www'].'partner/?p=*',
            'now_page' => $p,
            'list_rows' => $pagesize
            );
            $pageHtmlObj->init($param);
            $pagehtml = $pageHtmlObj->show(1);
        }
        $this->set('pagehtml', $pagehtml);
    }

    public function detail(){
        $user_id = intval($_GET['id']);
        if(!$user_id){
            $this->redirect("/partner");
        }
        $user = $this->User->getUserInfo(array('id'=>$user_id));
        $base_info = $this->UserProfile->getOne(array('user_id'=>$user_id));
        $detail_info = $this->UserDetail->getUserDetail(array('user_id'=>$user_id));
        $user_info = array_merge($user, $base_info, $detail_info);
        $this->set('user_info', $user_info);
        #industry
        $industryList = $this->Industry->getList();
        $industryRs = array();
        if(!empty($industryList)){
            foreach($industryList as $val){
                $industryRs[$val['id']] = $val['name'];
            }
        }
        $this->set('industryRs', $industryRs);
        #tag
        $user_tags = $this->UserTags->getUserTags(array('user_id'=>$user_id));
        //var_dump($user_info);
        $this->set('user_tags', $user_tags);
    }
}
