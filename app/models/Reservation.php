<?php



namespace app\models;

use app\Database;

class Reservation{
    public $user_id;
    public $reservation_date;
    public $reserved_date_from;
    public $reserved_date_to;
    public $reservation;
    public $id;
    public $checkin;
    public $checkout;
    public $assigned_rooms;
    public $status;
    public $comments;
    public $rent;

    public function build($data){
        $this->user_id = $data['user_id'] ?? 0;
        $this->reservation_date = $data['reservation_date'] ?? 0;
        $this->reservation = $data['reservation'] ?? "";
        $this->reserved_date_from = $data['reserved_date_from'] ?? 0;
        $this->reserved_date_to = $data['reserved_date_to'] ?? 0;
        $this->rent = $data['rent'] ?? 0;
        $this->id = $data['id'] ?? null;
        $this->checkin = $data['checkin'] ?? 0;
        $this->checkout = $data['checkout']?? 0;
        $this->assigned_rooms = $data['assigned_rooms'] ?? "";
        $this->comments = $data['comments'] ?? "";
        $this->status = $data['status']?? 0;
    }

    public static function getReservations($keyword = ''){
        $db = Database::$db;
        
        return $db-> getReservations($keyword);
    }

    public static function getReservationByID($id){
        $db = Database::$db;
        
        return $db-> getReservationByID($id);
    }

    public function create(){
        $db = Database::$db;
        return $db-> createReservation($this);
    }

    public function update(){
        $db = Database::$db;
        return $db-> updateReservation($this);
    }

    public static function delete($id){
        $db = Database::$db;
        return $db-> deleteReservation($id);
    }

}