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
class SuggestController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout='layout';
    public $uses = array('Suggest');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $data = $this->Suggest->getList();

        $this->set('data', $data);
    }
    
    public function view(){
        $id = intval($_GET['id']);
        $conditions = array('id'=>$id);
        $data =  $this->Suggest->getOne($conditions);
        $this->set('id', $id);
        $this->set('data', $data);
    }


    public function edit(){
        if(isset($_POST['dosubmit'])){
            $id = intval($_POST['id']);
            $options = $_POST['options'];
            $params = array(
            'title' => "'".addslashes($_POST['title'])."'",
            'enable' => intval($_POST['enable']),
            'ismultiple' => intval($_POST['ismultiple'])
            );
            #update survey
            $this->Suggest->updateinfo($params, array('id'=>$id));

            $this->redirect('/suggest/index');

        }
        $id = intval($_GET['id']);
        $conditions = array('id'=>$id);
        $data =  $this->Suggest->getOne($conditions);
        $this->set('id', $id);
        $this->set('data', $data);

    }

    public function del(){
        $id = intval($_GET['id']);
        if($id){
            $this->Suggest->delete($id);
            $this->redirect('/suggest/index');
        }
    }
}
