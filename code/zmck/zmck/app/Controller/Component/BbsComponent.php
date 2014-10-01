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
class BbsComponent  extends Component {
    public $defaults;
    
    public $uses = array();
    
    
    /**
    *  构造函数
    * @param unknown_type $collection
    */
    public function __construct($collection){
        $this->ForumPost = ClassRegistry::init('ForumPost');
        $this->User = ClassRegistry::init('User');
        parent::__construct($collection);
    }
    
    public function hotTopic(){
        $data = $this->ForumPost->getList(array(), 0, 6, 'replynum DESC');
        if(!empty($data)){
            foreach($data as $key=>$val){
                $user = $this->User->getUserInfo(array('id'=>$val['author_id']));
                $data[$key]['author'] = $user['nickname'];
            }
        }
        return $data;
    }
}