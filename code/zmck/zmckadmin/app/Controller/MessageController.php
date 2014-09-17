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
class MessageController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout='layout';
    public $uses = array('SysMessage');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function sys() {
        $data = $this->SysMessage->getList();

        $this->set('data', $data);
    }

    public function add(){
        if(isset($_POST['dosubmit'])){
            $params = array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'ctime' => time(),
            );

            $this->SysMessage->addinfo($params);
        }
    }

    public function edit(){
        if(isset($_POST['dosubmit'])){
            $id = intval($_POST['id']);
            $params = array(
            'title' => "'".addslashes($_POST['title'])."'",
            'content' => "'".addslashes($_POST['content'])."'",
            'uptime' => time()
            );

            $this->SysMessage->updateinfo($params, array('id'=>$id));
            $this->redirect('/message/sys');
        }
        $id = intval($_GET['id']);
        $conditions = array('id'=>$id);
        $data =  $this->SysMessage->getOne($conditions);
        $this->set('id', $id);
        $this->set('data', $data);

    }
}
