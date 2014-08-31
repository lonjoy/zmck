<?php
/**
* CompanyController.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Controller
* @since         CakePHP(tm) v 0.2.9
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

App::uses('AppController', 'Controller');

class QaController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array('Survey', 'Surveyoptions', 'Surveydata');

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
        if(!empty($data)){
            foreach($data as $key=>$val){
                $options = $this->Surveyoptions->getList(array('survey_id'=>$val['id']));
                $data[$key]['options'] = $options;
            }
        }

        $this->set('data', $data);
    }

    public function add(){
        if(isset($_POST['dosubmit'])){
            $options = isset($_POST['options']) ? $_POST['options'] : array();
            $subject_id = intval($_POST['subject_id']);
            #查询用户
            $user_id = 1;
            $odata = $this->Surveydata->getOne(array('user_id'=>$user_id));
            if(empty($odata)){
                $data = array($subject_id=>$options[$subject_id]);
                $data = json_encode($data);
                $params = array(
                'user_id' => $user_id,
                'data' => $data,
                'ctime' => time(),
                );
                #add survey
                $id = $this->Surveydata->addinfo($params);
            }else{
                $odata_field = json_decode($odata['data'], true);
                $data[$subject_id] = $options[$subject_id];
                $data = "'".json_encode($data)."'";
                $params = array(
                'data' => $data,
                );
                $this->Surveydata->updateinfo($params, array('user_id'=>$user_id));
            }

            $this->redirect('/qa');
        }
    }
}
