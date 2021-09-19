<?php

use \PHPUnit\Framework\TestCase;
use app\controllers\MainController;
use app\Router;

class MainControllerTest extends TestCase{
    protected $router;
    protected $mainController;

    protected function setUp():void{
        $this->router = $this->createMock(Router::class);
        $this->router->expects($this->atLeastOnce())->method('renderView')->will($this->returnArgument(2));
        $this->mainController = new MainController();
        $_SERVER['REQUEST_METHOD'] = 'GET';
    }

    protected function tearDown(): void
    {
        unset($_SESSION['current_user']);
        unset($_SERVER['REQUEST_METHOD']);
    }
    
    public function testIndex(){
        
        $actual = $this->mainController->index($this->router);
        $this->assertEquals(['role' =>0,'login_status' => false],$actual);
        
        $_SESSION['current_user'] = ['role'=>1];
        $actual = $this->mainController->index($this->router);
        $this->assertEquals(['role' =>1,'login_status' => true],$actual);
        
    }
    
    public function testSignUp(){
        
        $actual = $this->mainController->signup($this->router);
        $this->assertEquals(['login_status' => false,
        'role' =>0, 'errors'=> []],$actual);
    }

    public function testLogin(){
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $actual = $this->mainController->login($this->router);
        $this->assertEquals(['login_status' => false,
        'role' =>0, 'errors'=> []],$actual);
    }

}