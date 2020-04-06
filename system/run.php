<?php

    $db_link = mysqli_connect(
        $config['db']['db_host'], 
        $config['db']['db_user'], 
        $config['db']['db_password'],
        $config['db']['db_name']
    );

    if(isset($_GET['lang']) && in_array($_GET['lang'], ['ru', 'en'])){
        $_SESSION['lang'] = $_GET['lang'];
    }

    if(!isset($_SESSION['lang'])){
        $_SESSION['lang'] = 'ru';
    }

    if(isset($_GET['page']) && $_GET['page'] == 'logout'){
        try{
            unset($_SESSION['auth_token']);
        }catch(Exception $E){
            
        }
    }

    $authUser = false;
    if(isset($_SESSION['auth_token']) && !empty($_SESSION['auth_token'])){
        $token = $_SESSION['auth_token'];
        $user = new Users($db_link);
        $authUser = $user->isAuth($token);
    }