<?php
/**
*
* 文件上传
*
* @copyright Copyright (c) 2013 Haibian.com Inc.
* @package
* @version $Id: Upload.php 3355 2014-06-04 08:02:47Z  $
*/

App::uses('Component', 'Controller');
class ForumComponent  extends Component {
    public $defaults;
    
    public $uses = array();
    
    
    /**
    *  构造函数
    * @param unknown_type $collection
    */
    public function __construct($collection){
        $this->ForumPost = ClassRegistry::init('ForumPost');
        parent::__construct($collection);
    }
    
    public function hotTopic(){
        $data = $this->ForumPost->getList(array(), 0, 6, 'replynum DESC');
        return $data;
    }
}