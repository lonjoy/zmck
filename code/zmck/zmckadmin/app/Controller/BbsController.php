<?php
/**
* BbsController.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Controller
* @since         CakePHP(tm) v 0.2.9
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

App::uses('AppController', 'Controller');
App::uses('Url', 'Utility');
class BbsController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout = 'layout';
    public $uses = array('Forum', 'ForumPost');

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
        $data = array();
        $data = $this->Forum->getList();
        $this->set('data', $data);
    }

    public function add(){
        if(isset($_POST['dosubmit'])){
            $params = array(
            'user_id'=>1,//$this->userInfo['user_id'],
            'name' => $_POST['name'],
            'desc' => $_POST['desc'],
            'listorder' => intval($_POST['listorder']),
            'enable' => intval($_POST['enable']),
            'ctime' => time(),
            );

            $id = $this->Forum->addinfo($params);
            if(isset($_FILES['logo']) && !empty($_FILES['logo'])){
                $file = $_FILES['logo'];

                $id = str_pad($id,9,0,STR_PAD_LEFT);
                $tmp=preg_replace("/^(\d{3})(\d{2})(\d{2})(\d{2,})/i","\\1/\\2/\\3/\\4",$id);
                $ret = $this->Upload->uploadedFile($file, BBS_PATH.$tmp);
            }
        }
    }

    public function edit(){
        if(isset($_POST['dosubmit'])){
            $id = intval($_POST['id']);
            $params = array(
            'user_id'=>1,//$this->userInfo['user_id'],
            'name' => "'".$_POST['name']."'",
            'desc' => "'".$_POST['desc']."'",
            'listorder' => intval($_POST['listorder']),
            'enable' => intval($_POST['enable']),
            );
            #update survey
            $this->Forum->updateinfo($params, array('id'=>$id));

            //上传
            if(isset($_FILES['logo']) && !empty($_FILES['logo'])){
                $file = $_FILES['logo'];
                $id = str_pad($id,9,0,STR_PAD_LEFT);
                $tmp=preg_replace("/^(\d{3})(\d{2})(\d{2})(\d{2,})/i","\\1/\\2/\\3/\\4",$id);
                $ret = $this->Upload->uploadedFile($file, BBS_PATH.$tmp);
            }
            $this->redirect('/bbs/edit?id='.$id);
        }
        $id = intval($_GET['id']);
        $conditions = array('id'=>$id);
        $data =  $this->Forum->getOne($conditions);
        $this->set('id', $id);
        $this->set('data', $data);

    }

    public function del(){
        $id = intval($_GET['id']);
        if($id){
            $this->Forum->delete($id);
            $this->redirect('/bbs/index');
        }
    }

    public function subject(){
        $data = array();
        $data = $this->ForumPost->getList();
        $this->set('data', $data);
    }



    public function subjectdel(){
        $id = intval($_GET['pid']);
        if($id){
            $this->ForumPost->delete($id);
            $this->redirect('/bbs/subject');
        }
    }
}
