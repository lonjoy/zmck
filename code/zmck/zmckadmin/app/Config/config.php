<?php
    define('ZMCK_DOMAIN', '.zmck.com:8080');
    define('AVATAR_PATH', DATA.'avatar'.DS);
    Configure::write('meta', array(
    'title' => '众梦创客',
    'desc'  => '',
    'keywd' => '',
    ));
    Configure::write('dm', array(
    'www'     => 'http://www'.ZMCK_DOMAIN.'/',//主页
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

?>
