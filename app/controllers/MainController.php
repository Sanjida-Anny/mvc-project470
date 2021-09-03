<?php

namespace app\controllers;

use app\models\User;
use app\models\Validation;
use app\Router;


class MainController{
    
    public function index(Router $router){
        $current_user =  $_SESSION['current_user'] ?? [];
        $role = $current_user['role'] ?? 0;
        $login_status = isset($_SESSION['current_user'] ) ?? false;
        $title = 'The Grand Maharaja';
        return $router->renderView('users/index',$title,['role' =>$role,'login_status' => $login_status]);

    }

    public function signup(Router $router){
        if(isset($_SESSION['current_user'])){
            header("location:/profile");
            exit;
        }
        $errors = [];
        
        $login_status = isset($_SESSION['current_user'] ) ?? false;
        $title = 'Join The Grand Maharaja';
        $user_data = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_data['name'] = trim($_POST['name']);
            $user_data['username'] = trim($_POST['username']);
            $user_data['password'] = trim($_POST['password']);
            $user_data['conf-password'] = trim($_POST['conf-password']);
            $user_data['phone'] = trim($_POST['phone']);
            $user_data['email'] = trim($_POST['email']);
            $user_data['dob'] = trim($_POST['dob']);
            $user_data['address'] = trim($_POST['address']);
            if($user_data['conf-password'] ==$user_data['password']){
                $user = new User();
                $user->buildUser($user_data);
                $user->saveUser();
                header("Location: /login");
                exit();
            }
            else {
                $errors = ['Password and confirm password doesnot match. Please try again'];
            }
        }



        return $router->renderView('users/signup',$title,['login_status' => $login_status,
        'role' =>0, 'errors'=> $errors
        ]);
    }

    public function logout(Router $router){
        if(!isset($_SESSION['current_user'])){
            header("location:/");
            exit;
        }
        unset($_SESSION['current_user'] );
        header("Location: /");
        exit();
    }

    public function login(Router $router){
        if(isset($_SESSION['current_user'])){
            header("location:\profile");
            exit;
        }
        $errors = [];
        $login_status = isset($_SESSION['current_user'] ) ?? false;
        $title = 'Sign in to The Grand Maharaja';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['login-pass'];

            $validation = new Validation();
            $errors = $validation->validate($username, $password);
            
        }

        
        return $router->renderView('users/login',$title,[
            'errors' => $errors,
            'role' =>0,
            'login_status' => $login_status
        ]
    );
    }
}
