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
class AreaController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout='layout';
    public $uses = array('Area');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $data = $this->Area->getList();
        
        $this->set('data', $data);
    }

    public function add(){
        if(isset($_POST['dosubmit'])){
            $params = array(
            'name' => $_POST['name'],
            'isdel' => intval($_POST['isdel']),
            'parentid' =>intval($_POST['parentid'])
            );

            $this->Area->addinfo($params);
        }
        #获取所有区域
        $arealist = $this->Area->getList(array('parentid'=>0));
        $this->set('arealist', $arealist);
    }

    public function edit(){
        if(isset($_POST['dosubmit'])){
            $id = intval($_POST['id']);
            $params = array(
            'name' => "'".addslashes($_POST['name'])."'",
            'isdel' => intval($_POST['isdel']),
            'parentid' =>intval($_POST['parentid'])
            );

            $this->Area->updateinfo($params, array('id'=>$id));
            $this->redirect('/Area/index');
        }
        $id = intval($_GET['id']);
        $conditions = array('id'=>$id);
        $data =  $this->Area->getOne($conditions);
        $this->set('id', $id);
        $this->set('data', $data);

    }
}
