<?php
trait TraitsExample1 {
    public function getText1(){
        return "Hello world";
    }

    public static function getText2() { // static method {
        return "Hello 'Static method'";
    }

    public function getText3(){
        return "Hello 'Method that is overriding another one'";
    }

    public function getText4(){} //method overridden {}    
    
    abstract public function getText5(): float;

    public function getText6(){
        return "Hello";
    }    
}

trait TraitsExample2 {   
    public function getText3(){ // method overridden
        return "Hello 'Method overridden'";
    }

    public function getText4() {
        return "Hello 'Method that is overriding another one'";
    }

    public function getText7() {
        return "world";
    }
}

class UsingTraits {
    use TraitsExample1, TraitsExample2 {
        TraitsExample1::getText3 insteadof TraitsExample2;
        TraitsExample2::getText4 insteadof TraitsExample1;
        TraitsExample2::getText3 as getText3Overridden;
        TraitsExample1::getText6 as private;
        TraitsExample2::getText7 as private;        
    }
    
    public function getText() {
        return "'{$this->getText6()} {$this->getText7()}'  from differents trait";
    }

    public function getText5(): String {
        return "Hello 'Abstract Class on Trait'";
    }
}

echo "## Traits #####" . "<br>";
$obj1 = new UsingTraits();
echo $obj1->getText1() . "<br>";
echo $obj1::getText2() . "<br>";
echo $obj1->getText3() . "<br>";
echo $obj1->getText3Overridden() . "<br>";
echo $obj1->getText4() . "<br>";
echo $obj1->getText5() . "<br>";
echo $obj1->getText() . "<br>";