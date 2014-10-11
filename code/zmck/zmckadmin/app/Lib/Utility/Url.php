<?php
/**
*
* URL方法
*
* @copyright Copyright (c) 2013 Haibian.com Inc.
* @package
* @author qinqf<qinqinfeng@163.com>
* @version $Id: Url.php 1312 2014-06-3 14:16:14Z qinqf $
*/

class Url
{                  
    /**
    * 获取用户头像图片地址
    * @param unknown_type $pars
    * @return string
    */
    public static function getUserPic($pars){
        $dm = Configure::read('dm');

        static $tps=array('s'=>'_s.jpg','m'=>'_m.jpg','b'=>'_b.jpg');
        $tp=empty($pars['tp']) ? 's' : $pars['tp'];
        $tmp='nopic'.$tps[$tp];
        $ttmp = $tmp;
        if(isset($pars['uid']) && $pars['uid']){//000/01/00/37.jpg
            $pars['uid']=str_pad($pars['uid'],9,0,STR_PAD_LEFT);
            $tmp=preg_replace("/^(\d{3})(\d{2})(\d{2})(\d{2,})/i","\\1/\\2/\\3/\\4",$pars['uid']).$tps[$tp];
        }elseif(isset($pars['gid']) && $pars['gid']){
            $pars['gid']=str_pad($pars['gid'],8,0,STR_PAD_LEFT);
            $tmp=preg_replace("/^(\d{2})(\d{2})(\d{2})(\d{2})/i","group/\\1/\\2/\\3/\\4".$tps[$tp],$pars['gid']);
        }
        $tmp= (file_exists(AVATAR_PATH.$tmp)?$dm['img'].'data/avatar/'.$tmp:$dm['www'].'img/data/avatar/'.$ttmp);
        return $tmp;
    }


    /**
    * 获取首页轮播图片地址
    * @param unknown_type $pars
    * @return string
    */
    public static function getHomePic($id){
        $dm = Configure::read('dm');

        $ttmp = 'nopic.jpg';
        #$id=str_pad($id,9,0,STR_PAD_LEFT);
        #$tmp=preg_replace("/^(\d{3})(\d{2})(\d{2})(\d{2,})/i","\\1/\\2/\\3/\\4",$id).'.jpg';
        $tmp=$id.'.jpg';

        $tmp= (file_exists(HOMEPIC_PATH.$tmp)?$dm['img'].'data/homepic/'.$tmp:$dm['www'].'img/data/homepic/'.$ttmp);
        return $tmp;
    }


    public static function getForum($id){
        $dm = Configure::read('dm');

        $id=str_pad($id,9,0,STR_PAD_LEFT);
        $tmp=preg_replace("/^(\d{3})(\d{2})(\d{2})(\d{2,})/i","\\1/\\2/\\3/\\4",$id).'.jpg';

        $tmp= (file_exists(BBS_PATH.$tmp)?$dm['img'].'data/bbs/'.$tmp:$dm['www'].'img/data/bbs/'.$tmp);
        return $tmp;
    }

}