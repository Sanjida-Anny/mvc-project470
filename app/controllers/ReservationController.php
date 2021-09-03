<?php

namespace app\controllers;

use app\Router;
use app\models\Reservation;

class ReservationController{

    public function deleteReservation(Router $router){
        $id = $_POST['id'];      
        Reservation::delete($id);
    }

    public function createReservation(Router $router){
        if(!isset($_SESSION['current_user'])){
            header("location:/login");
            exit;
        }
        $current_user =  $_SESSION['current_user'];
        $role = $current_user['role'];
        $login_status = isset($_SESSION['current_user'] ) ?? false;
        $title = "Confirm Reservation | The Grand Maharaja";
        $errors = [];
        $reservation = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['user_id'] = $current_user['id'];
            date_default_timezone_set("Asia/Dhaka");
            $data['reservation_date'] =date("Y-m-d H:i:s");
            $data['reservation'] = 'Adult: '.$_POST['adult'].' Child: ' .$_POST['adult'].' Rooms: '.$_POST['room'];
            $data['reserved_date_from'] = $_POST['checkin'];
            $data['reserved_date_to'] = $_POST['checkout'];


            $reservation = new Reservation();
            $reservation->build($data);
            $reservation->create();
        }


        return $router->renderView('dashboard/confirmReservation',$title,[
            'login_status' => $login_status,
            'errors'=> $errors,
            'reservation' =>$reservation,
            'role' =>$role
            ]);
    }

    public function ViewReservation(Router $router){
        if(!isset($_SESSION['current_user'])){
            header("location:/login");
            exit;
        }
        
        $current_user =  $_SESSION['current_user'];
        if($current_user['role']== 0){
            header("location:\index");
            exit;
        }
        $role = $current_user['role'];
        $login_status = isset($_SESSION['current_user'] ) ?? false;
        $title = "Reservation | The Grand Maharaja";
        $errors = [];
        $id = $_GET['id'] ?? "";
        $reservation = Reservation::getReservationByID($id)[0];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['id'] = $reservation['id'];
            $data['rent'] = $_POST['rent'];
            $data['checkin'] = $_POST['checkin'];
            $data['checkout'] = $_POST['checkout'];
            $data['assigned_rooms'] = $_POST['assigned_rooms'];
            $data['comments'] = $_POST['comments'];
            $data['status'] = $_POST['status'] =="Select"? $reservation['status'] : $_POST['status'];

            $updated_reservation = new Reservation();
            $updated_reservation->build($data);
            $updated_reservation->update();
        }

        return $router->renderView('dashboard/viewReservation',$title,[
            'login_status' => $login_status,
            'errors'=> $errors,
            'reservation' =>$reservation,
            'role' =>$role
            ]);

    }
    
}