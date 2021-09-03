<?php

namespace app\controllers;

use app\models\Room;
use app\Router;

class RoomController{

    public static function viewRoom(Router $router){
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
        $title = "Room | The Grand Maharaja";
        
        $id = $_GET['id'] ?? "";
        $room = Room::getRoomByID($id)[0];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['status'] = $_POST['status'] =="Select"? $room['status'] : $_POST['status'];
            $data['id'] = $room['room_id'];

            $updated_room = new Room();
            $updated_room->build($data);
            $updated_room->update();
        }

        return $router->renderView('dashboard/viewRoom',$title,[
            'login_status' => $login_status,
            'errors'=> [],
            'room' =>$room,
            'role' =>$role
            ]);
    }
}