<?php


namespace app\models;

use app\Database;
use app\Router;

class User{

    public String $name;
    public String $username;
    public String $password;
    public String $phone;
    public String $email;
    public String $dob;
    public String $address;

    public function buildUser($user_data){
        
    $this->name = trim($user_data['name'] ?? "");
    $this->username = trim($user_data['username']?? "") ;
    $this->password = trim(password_hash($user_data['password'] ?? "",PASSWORD_DEFAULT)) ;
    $this->phone =  trim($user_data['phone']?? "");
    $this->email = trim($user_data['email']?? "");
    $this->dob = trim($user_data['dob'] ?? "");
    $this->address = trim($user_data['address'] ?? "" );
    }

    public function saveUser(){
        $db = Database::$db;

        return $db->createUser($this);
    }

    public function updateUser(){
        $db = Database::$db;

        return $db->updateUser($this);
    }



    
}