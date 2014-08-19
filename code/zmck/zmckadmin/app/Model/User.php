<?php

/**
*
* 用户
*
*/

App::uses('AppModel', 'Model');

class User extends AppModel {
    public $useTable = 'users';

    public $primaryKey = 'id';


    /**
    * 查询记录
    * @return array
    */
    public function userList($conditions=array(), $limit=10, $order='', $fields = array())
    {
        return $this->find('all', array(
        'conditions' => $conditions,
        'fields'    => $fields,
        'limit' => $limit,
        'order' => $order,
        ));
    }
    
    public function getUserInfo($conditions=array(), $fields=array()){
        return $this->find('first', array(
        'conditions' => $conditions,
        'fields'    => $fields
        ));
    }

    public function addUser($params=array()){
        if(empty($params)){
            return false;
        }
        //$params = $this->filterData($params);
        $this->save($params);
        return $this->id;
    }    
    
    public function updateUser($params=array(), $conditions=array()){
        if(empty($conditions)){
            return false;
        }
        return $this->updateAll($params, $conditions);
    }

}

