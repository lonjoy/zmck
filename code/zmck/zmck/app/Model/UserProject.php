<?php

/**
*
* 用户
*
*/

App::uses('AppModel', 'Model');

class UserProject extends AppModel {
    public $useTable = 'user_project';

    public $primaryKey = 'id';


    /**
    * 查询记录
    * @return array
    */
    public function getList($conditions=array(), $offset=0, $limit=30, $order='', $group=array(), $fields = array())
    {
        return $this->find('all', array(
        'conditions' => $conditions,
        'fields'    => $fields,
        'offset' => $offset,
        'limit' => $limit,
        'group' => $group,
        'order' => $order,
        ));
    }

    public function getOne($conditions=array(), $fields=array()){
        return $this->find('first', array('conditions'=>$conditions, 'fields'=>$fields));
    }

    public function getCount($conditions=array(), $group=array()){
        return $this->find('count', array('conditions'=>$conditions, 'group'=>$group));
    }
    
    public function addinfo($params=array()){
        if(empty($params)){
            return false;
        }
        //$params = $this->filterData($params);
        $this->create();
        $this->save($params);
        return $this->id;
    }

    public function updateinfo($params=array(), $conditions=array()){
        if(empty($conditions)){
            return false;
        }
        $ret = $this->updateAll($params, $conditions);
        return $ret;
    }
    
    public function delinfo($conditions=array()){
        if(empty($conditions)){
            return false;
        }
        
        $ret = $this->deleteAll($conditions);
        return $ret;
    }

}

