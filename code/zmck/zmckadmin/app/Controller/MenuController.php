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
class MenuController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout='';
    public $uses = array('Menu');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function publicMenuLeft() {
        $menu_id = intval($_GET['menuid']);
        /*
        $conditions = array('parentid'=>$menuid);
        $limit = 1000;
        $order = array();// 'listorder ASC';
        $datas = $this->Menu->getMenu($conditions, $limit, $order);
        var_dump($datas);die;
        */
        $datas = array(
        array('id'=>1, 'url'=>'', 'name'=>'用户管理', 'sub'=>array(
        array('id'=>2, 'url'=>'/user/index', 'name'=>'用户列表', 'sub'=>array()),
        array('id'=>3, 'url'=>'/user/roles', 'name'=>'合伙人类型管理', 'sub'=>array()),
        )),
        array('id'=>4, 'url'=>'', 'name'=>'站点配置', 'sub'=>array(
        array('id'=>5, 'url'=>'/datacarousel/index', 'name'=>'首页轮播图管理', 'sub'=>array()),
        array('id'=>6, 'url'=>'/industry/index', 'name'=>'行业管理', 'sub'=>array()),
        array('id'=>7, 'url'=>'/salary/index', 'name'=>'薪酬体系配置', 'sub'=>array()),
        #array('id'=>8, 'url'=>'/site/index', 'name'=>'站点配置', 'sub'=>array()),
        array('id'=>8, 'url'=>'/survey/index', 'name'=>'创业问答管理', 'sub'=>array()),
        array('id'=>9, 'url'=>'/site/index', 'name'=>'项目管理', 'sub'=>array()),
        array('id'=>11, 'url'=>'/site/index', 'name'=>'相关配置', 'sub'=>array()),
        array('id'=>18, 'url'=>'/suggest/index', 'name'=>'意见建议', 'sub'=>array()),
        array('id'=>19, 'url'=>'/systemTag/index', 'name'=>'系统标签配置', 'sub'=>array()),
        array('id'=>20, 'url'=>'/message/sys', 'name'=>'系统消息', 'sub'=>array()),
        )),
        array('id'=>12, 'url'=>'', 'name'=>'企业管理', 'sub'=>array(
        array('id'=>13, 'url'=>'/user/roles', 'name'=>'企业信息', 'sub'=>array()),
        array('id'=>14, 'url'=>'/user/roles', 'name'=>'认证信息的审核', 'sub'=>array()),
        )),
        array('id'=>15, 'url'=>'', 'name'=>'创业圈管理', 'sub'=>array(
        array('id'=>16, 'url'=>'/bbs/index', 'name'=>'创业圈管理', 'sub'=>array()),
        array('id'=>17, 'url'=>'/bbs/subject', 'name'=>'话题管理', 'sub'=>array()),
        )),
        );

        $this->set('datas', $datas);
        $this->set('menu_id', $menu_id);
        $this->render('left');

    }
}
