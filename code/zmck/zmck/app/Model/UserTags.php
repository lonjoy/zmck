<?php

/**
*
* 用户
*
*/

App::uses('AppModel', 'Model');

class UserTags extends AppModel {
    public $useTable = 'user_tags';

    public $primaryKey = 'id';


    /**
    * 查询记录
    * @return array
    */
    public function tagList($conditions=array(), $limit=10, $order='', $fields = array())
    {
        return $this->find('all', array(
        'conditions' => $conditions,
        'fields'    => $fields,
        'limit' => $limit,
        'order' => $order,
        ));
    }
    
    public function getUserTags($conditions=array(), $fields=array()){
        return $this->find('first', array(
        'conditions' => $conditions,
        'fields'    => $fields
        ));
    }

    public function addUserTag($params=array()){
        if(empty($params)){
            return false;
        }
        //$params = $this->filterData($params);
        $this->save($params);
        return $this->id;
    }    
    
    public function updateUserTags($params=array(), $conditions=array()){
        if(empty($conditions)){
            return false;
        }
        return $this->updateAll($params, $conditions);
    }

}

