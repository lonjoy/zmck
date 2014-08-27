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
class DatacarouselController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout='layout';
    public $uses = array('Datacarousel');
    public $components = array('Upload');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $data = $this->Datacarousel->getList();
        
        $this->set('data', $data);
    }

    public function add(){
        if(isset($_POST['dosubmit'])){

            $params = array(
            'name' => $_POST['homepicname'],
            'url' => $_POST['url'],
            'order' => $_POST['order'],
            'ctime' => time(),
            );

            $id = $this->Datacarousel->addinfo($params);
            if(isset($_FILES['homepic']) && !empty($_FILES['homepic'])){
                $ret = $this->Upload->uploadedFile($_FILES['homepic'], HOMEPIC_PATH.$id); //大
            }
            $this->redirect('/datacarousel/index');
        }
    }

    public function edit(){
        if(isset($_POST['dosubmit'])){
            $id = intval($_POST['id']);
            $params = array(
            'name' => "'".addslashes($_POST['homepicname'])."'",
            'order' => intval($_POST['order']),
            'url' => "'".addslashes($_POST['url'])."'",
            );
            $this->Datacarousel->updateinfo($params, array('id'=>$id));
            if(isset($_FILES['homepic']) && !empty($_FILES['homepic'])){
                $ret = $this->Upload->uploadedFile($_FILES['homepic'], HOMEPIC_PATH.$id); //大
            }
            $this->redirect('/datacarousel/index');
        }
        $id = intval($_GET['id']);
        $conditions = array('id'=>$id);
        $data =  $this->Datacarousel->getOne($conditions);
        $this->set('id', $id);
        $this->set('data', $data);

    }
    
    public function del(){
        $id = intval($_GET['id']);
        if($id){
            $this->Datacarousel->delete($id);
            $this->redirect('/datacarousel/index');
        }
    }
}
