<?php


App::uses('BaseComponent', 'Controller/Component');

class MenuComponent extends BaseComponent {
    
    public function __construct(ComponentCollection $collection, $settings = array())
    {
        parent::__construct($collection, $settings);
        $this->Menu = ClassRegistry::init('Menu');
    }

    /**
     * 获取菜单
     * @param array $params
     */
    public function getMenu($parentid, $with_self = 0)
    {
        $conditions = array('parentid'=>$parentid);
        $limit = 1000;
        $order = 'listorder ASC';
        $data = $this->Menu->getMenu($conditions, $limit, $order, $with_self);var_dump($data, 2222);die;
    }

    /**
     * 添加班级和讲次的关系数据
     * @param array $params
     */
    public function addChapterRelationTemp($params)
    {
        $this->ClassChaptersTemps->add($params);
    }



    public function modifyClassTemp($classId,$params)
    {
        
    }
    
    
}
