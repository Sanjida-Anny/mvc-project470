<?php

namespace app\controllers;

use app\models\Room;
use app\models\Reservation;
use app\Router;
use app\models\User;

class UserController{

    public function userProfile(Router $router){
        if(!isset($_SESSION['current_user'])){
            header("location:/login");
            exit;
        }
        $current_user =  $_SESSION['current_user'];
        $role = $current_user['role'];
        $title = $current_user['name']."-Profile | The Grand Maharaja";
        $login_status = isset($_SESSION['current_user'] ) ?? false; 
        $user_data = [];

        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $name = $_POST['fname']." ".$_POST['lname'];
            $user_data['name'] = ($name == " " ? $current_user['name'] : $name); 
            $user_data['username'] = ($_POST['username'] == "" ? $current_user['username'] : $_POST['username']); 
            $user_data['email'] = ($_POST['email'] == "" ? $current_user['email'] : $_POST['email']); 
            $user_data['phone'] = ($_POST['phone'] == "" ? $current_user['phone_number'] : $_POST['phone']); 
            $user_data['address'] = ($_POST['address'] == "" ? $current_user['address'] : $_POST['address']); 

                $user = new User();
                $user->buildUser($user_data);
                $user->updateUser(); 
        }
        
        return $router->renderView('users/userProfile',$title,['current_user' =>$current_user, 
            'login_status'=> $login_status, 'role' =>$role
        ]);
        
    }


    public function dashboard(Router $router){
        if(!isset($_SESSION['current_user'])){
            header("location:\login");
            exit;
        }

        
        $current_user =  $_SESSION['current_user'];
        
        $role = $current_user['role'];
        $errors = [];
        $login_status = isset($_SESSION['current_user'] ) ?? false;
        $title = "Dashboard | The Grand Maharaja";
        if($current_user['role']== 0){
            header("location:\index");
            exit;
        }
        $reservations = [];
        $rooms = [];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $search = $_GET['search'] ?? "";
            $search_room = $_GET['search_room'] ?? "";

            $reservations = Reservation::getReservations($search);
            $rooms = Room::getRooms($search_room);
        }
        return $router->renderView('dashboard/managerDash',$title,[
        'login_status' => $login_status,
        'errors'=> $errors,
        'reservations' =>$reservations,
        'rooms' => $rooms,
        'role' =>$role,
        'keyword' => $search ?? "",
        'keyword_room' =>$search_room ?? ""
        ]);
    }

    
}