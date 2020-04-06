<?php 

    include APP.'core/Model.php';

    class Users extends Model{
        
        public function __construct($link){
            parent::__construct($link);
            $this->setTable('users');
            $this->setUniqueKey('user_email');
        }
        
        public function login($data){
            $userEmail = $data['user_email'];
            $userPassword = $data['user_password'];
           
            $result = false;
            
            $sql = "SELECT * 
                    FROM {$this->table} 
                    WHERE user_email = '{$userEmail}' and user_password = '{$userPassword}' LIMIT 1";
            $check = $this->query($sql);
            if($check->num_rows > 0){
                $check = mysqli_fetch_assoc($check);
                if($check){
                    $token = md5(time() . $check['user_id']);
                    $sql = "UPDATE {$this->table} SET user_token = '{$token}' WHERE user_id = {$check['user_id']}";
                    if($this->query($sql)){
                        $result = true;
                        $_SESSION['auth_token'] = $token;
                    }
                }
            }
            
            return $result;
        }
        
        public function isAuth($token){
            $sql = "SELECT * 
                    FROM {$this->table} 
                    WHERE user_token = '{$token}' LIMIT 1";
            $check = $this->query($sql);
            if($check->num_rows > 0){
                return mysqli_fetch_assoc($check);
            }
            return false;
        }

    }