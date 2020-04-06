<?php 
    session_start();
    define("APP", "W:/domains/test-php-reg/");
    require APP.'models/Users.php';
    $config['db'] = require(APP.'config/db.php');
    $config['routes'] = require(APP.'config/routes.php');
    $languages = require(APP.'config/lang.php');
    
    require APP.'/system/functions.php';
    require APP.'/system/run.php';


    $currentPage = APP.'view/home.php';

    if(isset($_GET['page'])){
        if(isset($config['routes'][$_GET['page']])){
            $currentPage = $config['routes'][$_GET['page']];
        }else{
            $currentPage = './view/404.php';
        }
    }

    include './view/layouts/header.php';
    //include './view/login.php';

    if($authUser){
        include $currentPage;
    }else{
        if(stripos($currentPage, 'register') !== false){
            include $currentPage;
        }else{
            include APP.'view/login.php';
        }
    }

    include './view/layouts/footer.php';