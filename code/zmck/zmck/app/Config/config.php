<?php
    define('ZMCK_DOMAIN', '.zmckr.com');
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
    'host' => '192.168.199.129',
    'user' => 'root',
    'password' => '111111',
    'database' => 'zmck',
    'prefix' => 'zm_',
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
?>
