<?php 
    session_start();
    define("APP", "W:/domains/test-php-reg/");
    require '../system/functions.php';
    require '../models/Users.php';
    $config['db'] = require('../config/db.php');
    
    $db_link = mysqli_connect(
        $config['db']['db_host'], 
        $config['db']['db_user'], 
        $config['db']['db_password'],
        $config['db']['db_name']
    );

    $result = [
        'error' => true,
        'data' => [],
        'message' => ''
    ];


    if(isset($_POST['type'])){
        switch($_POST['type']){
            case 'register':
                // валідація
                $_POST['registerData']['user_password'] = trim($_POST['registerData']['user_password']);
                if(strlen($_POST['registerData']['user_password']) >= 8){
                    $canRegister = true;
                    preg_match(
                        '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/',
                        $_POST['registerData']['user_password'],
                        $check
                    );
                    if(!$check){
                        $canRegister = false;
                    }
                    
                    
                    if($canRegister){
                        $user = new Users($db_link);
                        $_POST['registerData']['user_password'] = md5($_POST['registerData']['user_password']);
                        $result['error'] = !$user->insert($_POST['registerData']);
                        if(!$result['error']){
                            $result['error'] = !$user->login($_POST['registerData']);
                        }
                    }
                }
                
                
                break;
            case 'auth':
                // валідація
                $user = new Users($db_link);
                $_POST['authData']['user_password'] = md5($_POST['authData']['user_password']);
                $result['error'] = !$user->login($_POST['authData']);
                break;
        }
    }


    print_r(json_encode($result));