<?php

use \PHPUnit\Framework\TestCase;
use app\Database;
use app\models\Room;


class RoomTest extends TestCase{
    protected $room;
    
    protected function setUp():void{
        $mockDB = $this->createMock(Database::class);
        $mockDB->expects($this->once())->method('updateRoom')->will($this->returnArgument(0));
        Database::$db = $mockDB;
        $this->room = new Room();
        $this->room->build([]);
    }

    protected function tearDown(): void
    {
        Database::$db = null;
    }

    public function testUpdate(){
        $actual = $this->room->update();
        $this->assertEquals($this->room,$actual);
    }

    
}