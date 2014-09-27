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
class ProjectController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout='layout';
    public $uses = array('UserProject', 'ProjectDirection');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $data = $this->UserProject->getList();

        $this->set('data', $data);
    }

    public function direction(){
        $data = $this->ProjectDirection->getList();

        $this->set('data', $data);
    }

    public function adddirection(){
        if(isset($_POST['dosubmit'])){
            $params = array(
            'name' => $_POST['name'],
            'ctime' => time(),
            );

            $this->ProjectDirection->addinfo($params);
        }
    }

    public function editdirection(){
        if(isset($_POST['dosubmit'])){
            $id = intval($_POST['id']);
            $params = array(
            'name' => "'".addslashes($_POST['name'])."'",
            );

            $this->ProjectDirection->updateinfo($params, array('id'=>$id));
            $this->redirect('/project/direction');
        }
        $id = intval($_GET['id']);
        $conditions = array('id'=>$id);
        $data =  $this->ProjectDirection->getOne($conditions);
        $this->set('id', $id);
        $this->set('data', $data);

    }
    
    public function deldirection(){
        $id = intval($_GET['id']);
        if($id){
            $this->ProjectDirection->delete($id);
            $this->redirect('/project/direction');
        }
    }

    public function add(){
        if(isset($_POST['dosubmit'])){
            $params = array(
            'name' => $_POST['name'],
            'ctime' => time(),
            );

            $this->Industry->addinfo($params);
        }
    }

    public function edit(){
        if(isset($_POST['dosubmit'])){
            $id = intval($_POST['id']);
            $params = array(
            'name' => "'".addslashes($_POST['name'])."'",
            'isdel' => intval($_POST['isdel']),
            );

            $this->Industry->updateinfo($params, array('id'=>$id));
            $this->redirect('/industry/index');
        }
        $id = intval($_GET['id']);
        $conditions = array('id'=>$id);
        $data =  $this->Industry->getOne($conditions);
        $this->set('id', $id);
        $this->set('data', $data);

    }
}
