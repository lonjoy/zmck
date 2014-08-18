<?php

/**
*
* 菜单
*
*/

App::uses('AppModel', 'Model');

class Menu extends AppModel {
    public $useTable = 'menu';

    public $primaryKey = 'id';


    /**
    * 查询记录
    * @return array
    */
    public function getMenu($conditions=array(), $limit=10, $order='', $fields = array())
    {
        return $this->find('all', array(
        'contain'    => array(),
        'conditions' => $conditions,
        'fields'    => $fields,
        'limit' => $limit,
        'order' => $order,
        ));
    }


}

