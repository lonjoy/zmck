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
    class PartnerComponent  extends Component {
        public $defaults;

        public $uses = array();


        /**
        *  构造函数
        * @param unknown_type $collection
        */
        public function __construct($collection){
            $this->User = ClassRegistry::init('User');
            $this->UserDetail = ClassRegistry::init('UserDetail');
            $this->Role = ClassRegistry::init('Role'); 
            parent::__construct($collection);
        }

        public function recommend(){
            $data = array();
            $conditions = array('recommend'=>1, 'baseinfo'=>1);
            $order = '';
            $recommend_user = $this->User->userList($conditions, 0, 6, $order);
            if(!empty($recommend_user)){
                foreach($recommend_user as $key=>$val){
                    $v=$this->UserDetail->getUserDetail(array('user_id'=>$val['id']));
                    $recommend_user[$key]['intro'] = mb_substr($v['intro'], 0, 20).'...';
                }
            }
            $data['users'] = $recommend_user;

            $roles_data = $this->Role->getList();
            $roles = array();
            if(!empty($roles_data)){
                foreach($roles_data as $val){
                    $roles[$val['id']] = $val['name'];
                }
            }
            $data['roles'] = $roles;
            return $data;
        }
    }
?>
