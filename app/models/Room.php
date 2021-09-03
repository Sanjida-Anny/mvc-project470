<?php

namespace app\models;

use app\Database;

class Room{
    public $id;
    public $status;

    public function build($data){
        $this->status = $data['status']?? 0;
        $this->id = $data['id'] ?? null;
    }

    public static function getRooms($keyword){
        $db = Database::$db;
        return $db ->getRooms($keyword);
    }

    public static function getRoomByID($id){
        $db = Database::$db;
        
        return $db-> getRoomByID($id);
    }

    public function update(){
        $db = Database::$db;
       return $db-> updateRoom($this);
    }
}