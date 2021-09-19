<?php

use \PHPUnit\Framework\TestCase;
use app\Router;
use app\Database;
use app\controllers\RoomController;

class RoomControllerTest extends TestCase{
    protected $router;
    protected $roomController;

    protected function setUp():void{
        $mockDB = $this->createMock(Database::class);
        $mockDB->expects($this->once())->method('getRoomByID')->will($this->returnValue([null]));
        Database::$db = $mockDB;
        $this->router = $this->createMock(Router::class);
        $this->router->expects($this->atLeastOnce())->method('renderView')->will($this->returnArgument(2));
        $this->roomController = new RoomController();
        $_SERVER['REQUEST_METHOD'] = 'GET';
    }

    protected function tearDown(): void
    {
        unset($_SESSION['current_user']);
        unset($_SERVER['REQUEST_METHOD']);
    }

    public function testViewRoom(){
        $_SESSION['current_user'] = ['role'=>1];
        $actual = $this->roomController->viewRoom($this->router);

        $this->assertEquals([
            'login_status' => true,
            'errors'=> [],
            'room' =>null,
            'role' =>1],$actual);
    }
}