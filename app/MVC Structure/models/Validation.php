<?php

namespace app\models;

use app\Database;

class Validation{

    public function validate($username = '', $password ='',$test = false){
        $db = Database::$db;

        $login = $db->validate($username);

        if($login && password_verify($password,$login['password'])){
            $_SESSION['current_user'] = $login;
            if(!$test){
                $this->redirect($login);
            }
        }
        else{
            return ['*username or password is incorrect'];
        }   
        
    }

    private function redirect( $current_user){
        $role = $current_user['role'];

        if($role == 0){
            
            header("location:/");
            exit;
        }
        else{
            header('location:/dashboard');
            exit;
        }
        
        
    }
}