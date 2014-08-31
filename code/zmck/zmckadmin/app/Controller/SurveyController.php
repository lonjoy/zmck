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
class SurveyController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout='layout';
    public $uses = array('Survey', 'Surveyoptions');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $data = $this->Survey->getList();

        $this->set('data', $data);
    }

    public function add(){
        if(isset($_POST['dosubmit'])){
            $options = $_POST['options'];
            $params = array(
            'title' => addslashes($_POST['title']),
            'enable' => intval($_POST['enable']),
            'ismultiple' => intval($_POST['ismultiple']),
            'ctime' => time(),
            );
            #add survey
            $id = $this->Survey->addinfo($params);
            #add option
            if(!empty($options)){
                foreach($options as $val){
                    if($val){
                        $this->Surveyoptions->addinfo(array('name'=>$val, 'survey_id'=>$id));
                    }  
                }
            }
            $this->redirect('/survey/index');
        }
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
            $this->Survey->updateinfo($params, array('id'=>$id));
            #update option
            $this->Surveyoptions->delinfo(array('survey_id'=>$id));
            if(!empty($options)){
                foreach($options as $val){
                    if($val){
                        $this->Surveyoptions->addinfo(array('name'=>$val, 'survey_id'=>$id));
                    }  
                }
            }
            $this->redirect('/survey/index');

        }
        $id = intval($_GET['id']);
        $conditions = array('id'=>$id);
        $data =  $this->Survey->getOne($conditions);
        $options = $this->Surveyoptions->getList(array('survey_id'=>$id));
        $data['options'] = $options;
        $this->set('id', $id);
        $this->set('data', $data);

    }

    public function del(){
        $id = intval($_GET['id']);
        if($id){
            $this->Survey->delete($id);
            $this->Surveyoptions->delinfo(array('survey_id'=>$id));
            $this->redirect('/survey/index');
        }
    }
}
