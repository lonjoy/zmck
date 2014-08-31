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
    public $layout='';
    public $uses = array('Suggest');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */


    public function add(){
        $user_id = 0;
        if(isset($_POST['dosubmit'])){
            $params = array(
            'content' => addslashes(htmlspecialchars($_POST['content'])),
            'user_id' => $user_id,
            'ctime' => time()
            );
            
            #update survey
            $ret = $this->Suggest->addinfo($params);
            if($ret){
                $return = array(
                'errCode' => 0,
                'msg' => '添加成功'
                );
            }else{
                $return = array(
                'errCode' => 1,
                'msg' => '添加失败'
                );
            }
            echo json_encode($return);die;
            #$this->redirect();

        }
    }
}
