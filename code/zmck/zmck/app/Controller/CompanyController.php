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

class CompanyController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array();
    public $components = array('Forum');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $hot_topic = $this->Forum->hotTopic();
        $this->set('hot_topic', $hot_topic);
    }

    public function detail(){

    }
}
