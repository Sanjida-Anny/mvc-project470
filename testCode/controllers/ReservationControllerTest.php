<?php

use \PHPUnit\Framework\TestCase;
use app\Router;
use app\controllers\ReservationController;
use app\Database;

class ReservationControllerTest extends TestCase{
    protected $router;
    protected $reservationController;

    protected function setUp():void{
        $mockDB = $this->createMock(Database::class);
        $mockDB->method('getReservationByID')->will($this->returnValue([null]));
        Database::$db = $mockDB;
        $this->router = $this->createMock(Router::class);
        $this->router->expects($this->atLeastOnce())->method('renderView')->will($this->returnArgument(2));
        $this->reservationController = new ReservationController();
        $_SERVER['REQUEST_METHOD'] = 'GET';
    }

    protected function tearDown(): void
    {
        unset($_SESSION['current_user']);
        unset($_SERVER['REQUEST_METHOD']);
    }

    public function testCreateReservation(){
        $_SESSION['current_user'] = ['role'=>1];
        $actual = $this->reservationController->createReservation($this->router);
        $this->assertEquals([
            'login_status' => true,
            'errors'=> [],
            'reservation' =>'',
            'role' =>1],$actual);
    }

    public function testViewReservation(){
        $_SESSION['current_user'] = ['role'=>1];
        $actual = $this->reservationController->viewReservation($this->router);
        $this->assertEquals([
            'login_status' => true,
            'errors'=> [],
            'reservation' =>null,
            'role' =>1],$actual);
    }

    
}