<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    
    public function afterFind($results, $primary=false) {

        $results = $this->getListWithoutModelName($results);

        return $results;
    }

    /**
     * 去除find方法返回的结果中的model键值
     *
     * @param type $items
     * @return type
     */
    public function getListWithoutModelName($items) {
        if(!isset($items) || !is_array($items) || empty($items)) {
            return $items;
        }

        $modelName = $this->name;
        if(isset($items[$modelName])) {
            $items = $items[$modelName];
            unset($items[$modelName]);
        }else{
            foreach ($items as $k => $v) {
               if(isset($v[$modelName])) {
                   $items[$k] = $v[$modelName];
               }
            }
        }

        return $items;
    }
}
