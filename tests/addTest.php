<?php
use PHPUnit\Framework\TestCase;
include_once "./src/add.php";
class AddTest extends TestCase{
    public function testadd(){
        $sum=new Add(2,4);
        $this->assertEquals(2,$sum->num1);
        $this->assertEquals(4,$sum->num2);
        $this->assertEquals(6,$sum->add());
    }
}