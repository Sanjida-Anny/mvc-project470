<?php

use \PHPUnit\Framework\TestCase;
use app\Database;
use app\models\User;



class UserTest extends TestCase{
    protected $user;
    
    protected function setUp():void{
        $mockDB = $this->createMock(Database::class);
        $mockDB->method('createUser')->will($this->returnArgument(0));
        $mockDB->method('updateUser')->will($this->returnArgument(0));
        Database::$db = $mockDB;
        $this->user = new User();
        $this->user->buildUser([]);
    }

    protected function tearDown(): void
    {
        Database::$db = null;
    }

    public function testSaveUser(){
        $actual = $this->user->saveUser();
        $this->assertEquals($this->user,$actual);
    }

    public function testUpdateUser(){
        $actual = $this->user->updateUser();
        $this->assertEquals($this->user,$actual);
    }

    

    

    
}