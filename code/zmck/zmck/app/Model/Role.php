<?php

/**
*
* 用户
*
*/

App::uses('AppModel', 'Model');

class Role extends AppModel {
    public $useTable = 'user_roles';

    public $primaryKey = 'id';


    /**
    * 查询记录
    * @return array
    */
    public function getList($conditions=array(), $limit=10, $order='', $fields = array())
    {
        return $this->find('all', array(
        'conditions' => $conditions,
        'fields'    => $fields,
        'limit' => $limit,
        'order' => $order,
        ));
    }

    public function getRole($conditions=array(), $fields=array()){
        return $this->find('first', array('conditions'=>$conditions, 'fields'=>$fields));
    }

    public function addRole($params=array()){
        if(empty($params)){
            return false;
        }
        //$params = $this->filterData($params);
        $this->save($params);
        return true;
    }

    public function updateRole($params=array(), $conditions=array()){
        if(empty($conditions)){
            return false;
        }
        $ret = $this->updateAll($params, $conditions);
        return $ret;
    }

}

