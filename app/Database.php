<?php


namespace app;

use app\models\Reservation;
use app\models\User;
use app\models\Room;
use PDO;

class Database{

    public $pdo = null;
// public static ?Database $db = null;
public static $db;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=hms','root','');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }

    public function validate($username){
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE username = :usrname');
        $statement->bindValue(':usrname',$username);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function createUSer(User $user){
        $statement = $this->pdo->prepare('INSERT INTO users (name,username,email,password,phone_number,date_of_birth,address) VALUES
            (:name, :username,:email,:password,:phone,:dob,:address)
            ');
        $statement->bindValue(':name',$user->name);
        $statement->bindValue(':username',$user->username);
        $statement->bindValue(':email',$user->email);
        $statement->bindValue(':password',$user->password);
        $statement->bindValue(':phone',$user->phone);
        $statement->bindValue(':dob',$user->dob);
        $statement->bindValue(':address',$user->address);        
        $statement->execute();
    }

    public function updateUser(User $user){
        $statement = $this->pdo->prepare('UPDATE users SET name = :name, username = :username, email = :email, phone_number = :phone, address = :address 
        WHERE id=:id');

        $current_user = $_SESSION['current_user'];

        $statement->bindValue(':name',$user->name);
        $statement->bindValue(':username',$user->username);
        $statement->bindValue(':email',$user->email);
        $statement->bindValue(':phone',$user->phone);
        $statement->bindValue(':address',$user->address); 
        $statement->bindValue(':id',$current_user['id']);         
        $statement->execute();

        

        $current_user['name'] = $user->name;
        $current_user['username'] =  $user->username;
        $current_user['email'] = $user->email;
        $current_user['phone_number'] =  $user->phone;
        $current_user['address'] = $user->address;
        
        $_SESSION['current_user'] = $current_user;

        header('location:/profile');
        exit();
    }

    public function getReservations($keyword){
        if ($keyword) {
            $statement = $this->pdo->prepare('SELECT * FROM users RIGHT JOIN reservations ON reservations.user_id = users.id WHERE name
            like :keyword ORDER BY status ASC, reservation_date DESC');
            $statement->bindValue(":keyword", "%$keyword%");
        }
        else {
            $statement = $this->pdo->prepare('SELECT * FROM users RIGHT JOIN reservations ON reservations.user_id = users.id ORDER BY  status ASC, reservation_date DESC');
        }
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getReservationByID($id){
        
        $statement = $this->pdo->prepare('SELECT * FROM users RIGHT JOIN reservations ON reservations.user_id = users.id WHERE reservations.id = :id');
        $statement->bindValue(":id", $id);
        
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
    public function createReservation(Reservation $reservation){
        $statement = $this->pdo->prepare('INSERT INTO reservations (user_id, reservation_date, reserved_date_from, reserved_date_to, reservation) VALUES
        (:user_id, :reservation_date, :reserved_date_from, :reserved_date_to, :reservation)');
        $statement->bindValue(":user_id", $reservation->user_id);
        $statement->bindValue(":reservation_date", $reservation->reservation_date);
        $statement->bindValue(":reserved_date_from", $reservation->reserved_date_from);
        $statement->bindValue(":reserved_date_to", $reservation->reserved_date_to);
        
        $statement->bindValue(":reservation", $reservation->reservation);
        $statement->execute();
    }

    public function updateReservation(Reservation $reservation){
        $statement = $this->pdo->prepare('UPDATE reservations SET checkin_date = :checkin_date , checkout_date = :checkout_date ,rent = :rent,
        assigned_rooms = :assigned_rooms, status= :status, comments= :comments WHERE id=:id');
        $statement->bindValue(":id", $reservation->id);
        $statement->bindValue(":comments", $reservation->comments);
        $statement->bindValue(":checkin_date", $reservation->checkin);
        $statement->bindValue(":checkout_date", $reservation->checkout);
        $statement->bindValue(":assigned_rooms", $reservation->assigned_rooms);
        $statement->bindValue(":status", $reservation->status);
        $statement->bindValue(":rent", $reservation->rent);
        $statement->execute();

        header('location:/reservation/view?id='.$reservation->id);
        exit();
    }

    public function deleteReservation($id){
        $statement = $this->pdo->prepare('DELETE FROM reservations WHERE id=:id');
        $statement->bindValue(":id", $id);
        $statement->execute();

        header('location:/dashboard');
        exit();
    }

    public function getRooms($keyword){
        $statement = $this->pdo->prepare('SELECT * FROM rooms WHERE type LIKE :keyword ORDER BY status');
        $statement->bindValue(":keyword", "%$keyword%");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoomByID($id){
        $statement = $this->pdo->prepare('SELECT * FROM rooms WHERE room_id = :id');
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateRoom(Room $room){
        $statement = $this->pdo->prepare('UPDATE rooms SET status= :status WHERE room_id = :id');
        $statement->bindValue(":id", $room->id);
        $statement->bindValue(":status", $room->status);
        $statement->execute();
        header('location:/dashboard');
        exit();
    }
}