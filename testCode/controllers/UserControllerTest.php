<?php

use \PHPUnit\Framework\TestCase;
use app\Router;
use app\Database;
use app\controllers\UserController;

class UserControllerTest extends TestCase{
    protected $router;
    protected $userController;

    protected function setUp():void{
        $mockDB = $this->createMock(Database::class);
        $mockDB->method('getRooms')->will($this->returnValue([]));
        $mockDB->method('getReservations')->will($this->returnValue([]));
        Database::$db = $mockDB;
        $this->router = $this->createMock(Router::class);
        $this->router->expects($this->atLeastOnce())->method('renderView')->will($this->returnArgument(2));
        $this->userController = new UserController();
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SESSION['current_user'] = ['name'=>'Test User','role'=>2];
    }

    protected function tearDown(): void
    {
        unset($_SESSION['current_user']);
        unset($_SERVER['REQUEST_METHOD']);
    }

    public function testUserProfile(){
        $current_user = $_SESSION['current_user'];
        $actual = $this->userController->userProfile($this->router);
        $this->assertEquals([
            'login_status' => true,
            'current_user'=>$current_user,
            'role' =>2],$actual);
    }

    public function testDashboard(){
        $_SERVER['REQUEST_METHOD'] = 'NONE';
        $actual = $this->userController->dashboard($this->router);
        $this->assertEquals([
            'login_status' => true,
            'errors'=> [],
            'reservations' =>[],
            'rooms' => [],
            'role' =>2,
            'keyword' => "",
            'keyword_room' =>""
            ],$actual);
    }

}