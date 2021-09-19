<?php

use \PHPUnit\Framework\TestCase;
use app\Database;
use app\models\Validation;



class ValidationTest extends TestCase{
    protected $validation;
    
    protected function setUp():void{
        $mockDB = $this->createMock(Database::class);
        $dummy = ['password'=>'$2y$10$hteKXL3877k/AuVcH383su3Ida33lgYjxZmT/cMcuNpcymVZN3Dx.','role'=>2];
        $mockDB->expects($this->exactly(2))->method('validate')->will($this->returnValue($dummy));
        Database::$db = $mockDB;
        $this->validation = new Validation();
    }

    protected function tearDown(): void
    {
        Database::$db = null;
    }

    public function testValidate(){
        $actual = $this->validation->validate("username","password",true);
        $this->assertEquals(['*username or password is incorrect'],$actual);

        $actual = $this->validation->validate("username","admin",true);
        $this->assertEquals(null,$actual);
    }     
    
}