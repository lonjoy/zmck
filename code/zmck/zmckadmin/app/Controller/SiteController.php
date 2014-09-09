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
class SiteController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout='layout';
    public $uses = array('Site');

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
        if(isset($_POST['dosubmit'])){
            $params = $_POST;
            unset($params['dosubmit'], $params['pc_hash']);

            if(!empty($params)){
                foreach($params as $key=>$value){
                    $conditions = array('name'=>$key);
                    $ret = $this->Site->getOne($conditions);
                    if($ret){
                        $this->Site->updateinfo(array('value'=>"'".$this->replaceTextarea1($value)."'"), $conditions);
                    }else{
                        $this->Site->addinfo(array('name'=>$key, 'value'=>$this->replaceTextarea1($value)));
                    }
                }
            }
            $this->redirect('/site/index');
        }
        $rs = $this->Site->getList(array(), 100);
        if($rs){
            foreach($rs as $k=>$v){
                $data[$v['name']] = $v['value'];
            }
        }
        $this->set('data', $data);
    }

    public function replaceTextarea1($str){
        $reg=preg_replace("/\r\n/","<br>", $str);
        $reg1=preg_replace("/\s+/","<p>", $str);
        return $str;
    }
    public function aboutus(){

    }

}
