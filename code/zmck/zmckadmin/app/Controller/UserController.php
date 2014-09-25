<?php
/**
* Static content controller.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Controller
* @since         CakePHP(tm) v 0.2.9
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

App::uses('AppController', 'Controller');


/**
* Static content controller
*
* Override this controller by placing a copy in controllers directory of an application
*
* @package       app.Controller
* @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
*/
App::uses('Url', 'Utility');
class UserController extends AppController {

    /**
    * This controller does not use a model
    *
    * @var array
    */
    public $layout='layout';
    public $uses = array('User', 'Role', 'UserProfile','UserTags', 'UserDetail', 'Industry');
    public $components = array('Upload');

    /**
    * Displays a view
    *
    * @param mixed What page to display
    * @return void
    * @throws NotFoundException When the view file could not be found
    *    or MissingViewException in debug mode.
    */
    public function index() {

        $data = $this->User->userList(array(), 0, 30, 'id desc');

        $this->set('data', $data);
    }


    public function addUser(){
        if(isset($_POST['dosubmit'])){

            $email = isset($_POST['email']) ? addslashes($_POST['email']) : '';
            $password = !empty($_POST['password']) ? $_POST['password'] : '';
            $homeshow = isset($_POST['homeshow']) ? intval($_POST['homeshow']) : 0;
            $recommend = isset($_POST['recommend']) ? intval($_POST['recommend']) : 0;
            $province = isset($_POST['cy_prov']) ? intval($_POST['cy_prov']) : 0;
            $city = isset($_POST['cy_city']) ? intval($_POST['cy_city']) : 0;

            $nickname = !empty($_POST['nickname']) ? addslashes($_POST['nickname']) : '';
            $name = !empty($_POST['name']) ? addslashes($_POST['name']) : '';
            $gender = intval($_POST['gender']);
            $role = !empty($_POST['role']) ?intval($_POST['role']) : 0;
            $agerange = !empty($_POST['agerange']) ? intval($_POST['agerange']) : 0;
            $workyears = !empty($_POST['workyears']) ? intval($_POST['workyears']) : 0;


            $xintai = isset($_POST['xintai']) ? intval($_POST['xintai']) : 0;
            $nowstatus = !empty($_POST['nowstatus']) ? intval($_POST['nowstatus']) : 0; //目前状态

            $industry_id = isset($_POST['industry_id']) ? intval($_POST['industry_id']) : 0; //关注领域
            $intro = !empty($_POST['intro']) ? addslashes($_POST['intro']) : '';
            $study_experience = !empty($_POST['study_experience']) ? addslashes($_POST['study_experience']) : '';
            $work_experience = !empty($_POST['work_experience']) ? addslashes($_POST['work_experience']) : '';

            $startupExperience = !empty($_POST['startupExperience']) ? intval($_POST['startupExperience']) : 0;
            $startupMoney = !empty($_POST['startupMoney']) ? intval($_POST['startupMoney']) : 0;
            $spenttime = !empty($_POST['spenttime']) ? intval($_POST['spenttime']) : 0;
            $startupArea = !empty($_POST['startupArea']) ? intval($_POST['startupArea']) : 0;

            if(!$email || !$password){
                return false;
            }
            $params = array(
            'email' => $email,
            'password' => md5($password),
            'nickname' => $nickname,
            'role' => $role,
            'gender' => $gender,
            'agerange' => $agerange,
            'workyears' => $workyears,
            'regtime' => time(),
            'xintai' => $xintai,
            'nowstatus'=> $nowstatus,
            'startupMoney'=> $startupMoney,
            'startupExperience'=> $startupExperience,
            'spenttime'=> $spenttime,
            'startupArea'=> $startupArea,
            'province'=> $province,
            'city'=> $city,
            'baseinfo' => 1,
            'homeshow' => $homeshow,
            'recommend' => $recommend,
            );
            $id = $this->User->addUser($params);

            $detail_params = array(
            'user_id' => $id,
            'intro' => $intro,
            'industry_id' => $industry_id,
            'study_experience' => $study_experience,
            'work_experience' => $work_experience,
            'ctime' => time(),
            );
            $this->UserDetail->addUserDetail($detail_params);

            $profile_params = array(
            'user_id' => $id,
            'nickname' => $nickname,
            'name' => $name,
            'gender' => $gender,
            'agerange' => $agerange,
            'workyears' => $workyears,
            'role' => $role,
            );
            $this->UserProfile->addinfo($profile_params);


            if(isset($_FILES['avatar']) && !empty($_FILES['avatar'])){
                $id = str_pad($id,9,0,STR_PAD_LEFT);
                $tmp=preg_replace("/^(\d{3})(\d{2})(\d{2})(\d{2,})/i","\\1/\\2/\\3/\\4",$id);
                $ret = $this->Upload->uploadedFile($_FILES['avatar'], AVATAR_PATH.$tmp.'_b'); //大
                #$ret = $this->Upload->uploadedFile($_FILES['avatar'], AVATAR_PATH.$tmp.'_m'); //中
                #$ret = $this->Upload->uploadedFile($_FILES['avatar'], AVATAR_PATH.$tmp.'_s'); //小的
            }
            $this->redirect('/user/');
        }
        //
        $roles = $this->Role->getList();
        $this->set('roles', $roles);

        $industry = $this->Industry->getList();
        $this->set('industry', $industry);
    }

    public function editUser(){
        if(isset($_POST['dosubmit'])){
            $email = isset($_POST['email']) ? "'".addslashes($_POST['email'])."'" : '';
            $password = '';//!empty($_POST['password']) ? $_POST['password'] : '';
            $homeshow = isset($_POST['homeshow']) ? intval($_POST['homeshow']) : 0;
            $recommend = isset($_POST['recommend']) ? intval($_POST['recommend']) : 0;
            $province = isset($_POST['cy_prov']) ? intval($_POST['cy_prov']) : 0;
            $city = isset($_POST['cy_city']) ? intval($_POST['cy_city']) : 0;

            $nickname = !empty($_POST['nickname']) ? "'".addslashes($_POST['nickname'])."'" : '';
            $name = !empty($_POST['name']) ? "'".addslashes($_POST['name'])."'" : '';
            $gender = intval($_POST['gender']);
            $role = !empty($_POST['role']) ?intval($_POST['role']) : 0;
            $agerange = !empty($_POST['agerange']) ? intval($_POST['agerange']) : 0;
            $workyears = !empty($_POST['workyears']) ? intval($_POST['workyears']) : 0;


            $xintai = isset($_POST['xintai']) ? intval($_POST['xintai']) : 0;
            $nowstatus = !empty($_POST['nowstatus']) ? intval($_POST['nowstatus']) : 0; //目前状态

            $industry_id = isset($_POST['industry_id']) ? intval($_POST['industry_id']) : 0; //关注领域
            $intro = !empty($_POST['intro']) ? "'".addslashes($_POST['intro'])."'" : '';
            $study_experience = !empty($_POST['study_experience']) ? "'".addslashes($_POST['study_experience'])."'" : '';
            $work_experience = !empty($_POST['work_experience']) ? "'".addslashes($_POST['work_experience'])."'" : '';

            $startupExperience = !empty($_POST['startupExperience']) ? intval($_POST['startupExperience']) : 0;
            $startupMoney = !empty($_POST['startupMoney']) ? intval($_POST['startupMoney']) : 0;
            $spenttime = !empty($_POST['spenttime']) ? intval($_POST['spenttime']) : 0;
            $startupArea = !empty($_POST['startupArea']) ? intval($_POST['startupArea']) : 0;

            $id = intval($_POST['id']);

            $params = array(
            'email' => $email,
            //'password' => md5($password),
            'nickname' => $nickname,
            'role' => $role,
            //'gender' => $gender,
            'agerange' => $agerange,
            'workyears' => $workyears,
            'xintai' => $xintai,
            'nowstatus'=> $nowstatus,
            'startupMoney'=> $startupMoney,
            'startupExperience'=> $startupExperience,
            'spenttime'=> $spenttime,
            'startupArea'=> $startupArea,
            'province'=> $province,
            'city'=> $city,
            'homeshow' => $homeshow,
            'recommend' => $recommend,
            'baseinfo' => 1,
            );
            $this->User->updateUser($params, array('id'=>$id));

            $detail_params = array(
            'intro' => $intro,
            'industry_id' => $industry_id,
            'study_experience' => $study_experience,
            'work_experience' => $work_experience,
            );
            $this->UserDetail->updateUserDetail($detail_params, array('user_id'=>$id));

            $profile_params = array(
            'nickname' => $nickname,
            'name' => $name,
            'gender' => $gender,
            'agerange' => $agerange,
            'workyears' => $workyears,
            'role' => $role,
            );
            $this->UserProfile->updateinfo($profile_params, array('user_id' => $id));

            if(isset($_FILES['avatar']) && !empty($_FILES['avatar'])){
                $file = $_FILES['avatar'];
                $id = str_pad($id,9,0,STR_PAD_LEFT);
                $tmp=preg_replace("/^(\d{3})(\d{2})(\d{2})(\d{2,})/i","\\1/\\2/\\3/\\4",$id);
                $ret = $this->Upload->uploadedFile($file, AVATAR_PATH.$tmp.'_b'); //大的
                #$ret = $this->Upload->uploadedFile($file, AVATAR_PATH.$tmp.'_s'); //小的
                #$ret = $this->Upload->uploadedFile($file, AVATAR_PATH.$tmp.'_m'); //中的
            }

            $this->redirect('/user/editUser?id='.$id);
        }else{
            $id = intval($_GET['id']);
            $user_avatar = Url::getUserPic(array('uid'=>$id, 'tp'=>'b'));
            $this->set('user_avatar', $user_avatar);

            $roles = $this->Role->getList();
            $this->set('roles', $roles);

            $con = array('id' => $id);
            $base_user = $this->User->getUserInfo($con);
            $detail_user = $this->UserDetail->getUserDetail(array('user_id'=>$id));
            $profile_user = $this->UserProfile->getOne(array('user_id'=>$id));
            $data = array_merge($base_user, $detail_user, $profile_user);

            $this->set('data', $data);
            $this->set('id', $id);

            $industry = $this->Industry->getList();
            $this->set('industry', $industry);
        }
    }

    public function roles(){

        $data = $this->Role->getList();

        $this->set('data', $data);
    }

    public function addRole(){
        if(isset($_POST['dosubmit'])){
            $params = array(
            'name' => $_POST['name'],
            'state' => intval($_POST['state']),
            'ctime' => time(),
            );

            $this->Role->addRole($params);
        }
    }

    public function editRole(){
        if(isset($_POST['dosubmit'])){
            $id = intval($_POST['id']);
            $params = array(
            'name' => "'".addslashes($_POST['name'])."'",
            'state' => intval($_POST['state']),
            );

            $this->Role->updateRole($params, array('id'=>$id));
            $this->redirect('/user/roles');
        }
        $id = intval($_GET['id']);
        $conditions = array('id'=>$id);
        $data =  $this->Role->getRole($conditions);
        $this->set('id', $id);
        $this->set('data', $data);

    }
}
