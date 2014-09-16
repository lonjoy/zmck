<?php
/**
* CompanyController.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Controller
* @since         CakePHP(tm) v 0.2.9
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

App::uses('AppController', 'Controller');
App::uses('Url', 'Utility');
class FollowController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $uses = array('Follow', 'User', 'UserTags', 'Role');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {
        $data = $this->Follow->getList(array('user_id'=>$this->userInfo['id'])); //我关注的的
        if(!empty($data)){
            foreach($data as &$val){
                #user
                $user = $this->User->getUserInfo(array('id'=>$val['follower_id']));
                #baseinfo
                $base_info = $this->UserProfile->getOne(array('user_id'=>$val['follower_id']));
                $user_info = array_merge($user, $base_info);
                $val['userinfo'] = $user_info;
                #tag
                $user_tags = $this->UserTags->getUserTags(array('user_id'=>$val['follower_id']));
                $val['userinfo']['tags'] = !empty($user_tags['tags'])?$user_tags['tags']:'';
                #role
                if(isset($val['userinfo']['role']) && $val['userinfo']['role'] && !empty($val['userinfo'])){
                    $roleinfo = $this->Role->getRole(array('id'=>$val['userinfo']['role']));
                    $val['rolename'] = isset($roleinfo['name']) ? $roleinfo['name'] : '';
                }
            }
        }

        $this->set('data', $data);
    }


    public function company(){

    }

    public function care(){
        $data = $this->Follow->getList(array('follower_id'=>$this->userInfo['id'])); //我关注的的
        if(!empty($data)){
            foreach($data as &$val){
                #user
                $user = $this->User->getUserInfo(array('id'=>$val['user_id']));
                #baseinfo
                $base_info = $this->UserProfile->getOne(array('user_id'=>$val['user_id']));
                $user_info = array_merge($user, $base_info);
                $val['userinfo'] = $user_info;
                #tag
                $user_tags = $this->UserTags->getUserTags(array('user_id'=>$val['user_id']));
                $val['userinfo']['tags'] = !empty($user_tags['tags'])?$user_tags['tags']:'';
                #role
                if(isset($val['userinfo']['role']) && $val['userinfo']['role'] && !empty($val['userinfo'])){
                    $roleinfo = $this->Role->getRole(array('id'=>$val['userinfo']['role']));
                    $val['rolename'] = isset($roleinfo['name']) ? $roleinfo['name'] : '';
                }
            }
        }

        $this->set('data', $data);
    }

    public function ban(){

    }

    /**
    * ajax 关注
    * 
    */
    public function ajaxcare(){
        if(empty($this->userInfo)){
            $this->goMsg('请登录后进行操作', '/');
        }
        $user_id = $this->userInfo['id'];
        $follower_id = isset($_POST['follower_id']) ? intval($_POST['follower_id']) : 0;
        if(!$follower_id){
            $this->goMsg('请选择关注的人', '/');
        }
        $params = array(
        'user_id' => $user_id,
        'follower_id' => $follower_id,
        'ctime' =>time()
        );
        $info = $this->Follow->getOne(array('user_id'=>$user_id, 'follower_id'=>$follower_id));
        if(!empty($info)){
            $return = array('errCode'=>2, 'msg'=>'已关注此用户');
        }else{
            $rs = $this->Follow->addinfo($params);
            if(!empty($rs)){
                $return = array('errCode'=>0, 'msg'=>'关注成功');
            }else{
                $return = array('errCode'=>1, 'msg'=>'关注失败');
            }
        }
        $this->outputJson($return);
    }

}
