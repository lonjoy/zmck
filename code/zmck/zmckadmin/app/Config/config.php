<?php
    define('ZMCK_DOMAIN', '.zmckr.com:8080');
    define('AVATAR_PATH', WWW_ROOT.'img'.DS.'data'.DS.'avatar'.DS);
    define('HOMEPIC_PATH', WWW_ROOT.'img'.DS.'data'.DS.'homepic'.DS);


    Configure::write('meta', array(
    'title' => '众梦创客',
    'desc'  => '',
    'keywd' => '',
    ));
    Configure::write('dm', array(
    'www'     => 'http://www'.ZMCK_DOMAIN.'/',//主页
    'img'     => 'http://www'.ZMCK_DOMAIN.'/img/',//主页
    ));
    Configure::write('db',array(
    'master' => array(
    'host' => '10.1.2.71',
    'user' => 'root',
    'password' => 'root',
    'database' => 'haibian',
    'prefix' => 'hb_',
    'encoding' => 'utf8',
    )

    ));

    define('SITE_NAME','众梦创客');//站点名字

 Configure::write('age', array(
    1=>'<25',
    2=>'25-30',
    3=>'30-35',
    4=>'35-40',
    5=>'>40',
    ));

    Configure::write('workyears', array(
    '无工作经验',
    '1年以内',
    '1年-2年',
    '3年左右',
    '5年到8年',
    '8年到12年',
    '12年到20年',
    '20年+',
    ));

    Configure::write('xintai', array(
    1=>'找项目参与创业',
    2=>'有项目主导创业',
    3=>'开放心态',
    ));
    
    
    Configure::write('nowstatus', array(
    1=>'已在全职创业',
    2=>'已在兼职创业',
    3=>'准备全职创业',
    4=>'准备兼职创业',
    5=>'准备兼职创业',
    6=>'认识朋友为主',
    ));  
      
    Configure::write('startupExperience', array(
    1=>'能纸上谈兵',
    2=>'尝试过',
    3=>'正在创业',
    4=>'多次，有所斩获',
    5=>'多次，并且很成功',
    ));    
      
    Configure::write('startupMoney', array(
    1=>'没有资金',
    2=>'只投入我的时间',
    3=>'少出一点可以',
    4=>'力所能及',
    5=>'愿意大力出资',
    )); 
         
    Configure::write('spenttime', array(
    1=>'很少（5小时以下/周）',
    2=>'不多（5-15小时/周）',
    3=>'业余部分时间（15-25小时/周）',
    4=>'业余全部时间（25小时以上）',
    5=>'全部时间参与创业',
    ));
         
    Configure::write('startupArea', array(
    1=>'我所处的城市',
    2=>'外地也可考虑',
    ));
?>
