<?php

use \PHPUnit\Framework\TestCase;
use app\Database;
use app\models\Reservation;



class ReservationTest extends TestCase{
    protected $reservation;
    
    protected function setUp():void{
        $mockDB = $this->createMock(Database::class);
        $mockDB->method('createReservation')->will($this->returnArgument(0));
        $mockDB->method('updateReservation')->will($this->returnArgument(0));
        $mockDB->method('deleteReservation')->will($this->returnArgument(0));
        Database::$db = $mockDB;
        $this->reservation = new Reservation();
        $this->reservation->build([]);
    }

    protected function tearDown(): void
    {
        Database::$db = null;
    }

    public function testCreate(){
        $actual = $this->reservation->create();
        $this->assertEquals($this->reservation,$actual);
    }

    public function testUpdate(){
        $actual = $this->reservation->update();
        $this->assertEquals($this->reservation,$actual);
    }

    public function testDelete(){
        $actual = $this->reservation->delete(154);
        $this->assertEquals(154,$actual);
    }

    
}