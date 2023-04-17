<?php

class Add{
    public $num1;
    public $num2;
    public function __construct($a,$b)
    {
        $this->num1=$a;
        $this->num2=$b;
    }
    public function add (){
        return  $this->num1+ $this->num2;
    }
}