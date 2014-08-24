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
                array('id'=>5, 'url'=>'/user/roles', 'name'=>'合伙人类型管理', 'sub'=>array()),
                array('id'=>6, 'url'=>'/industry/index', 'name'=>'行业管理', 'sub'=>array()),
            )),
        );

        $this->set('datas', $datas);
        $this->set('menu_id', $menu_id);
        $this->render('left');

    }
}
