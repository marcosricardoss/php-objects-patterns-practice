<?php
abstract class AbstractClass {
    protected $text = "Hello";
    abstract public function getText(): string;
}

class ConcreteClass1 extends AbstractClass {
    public function getText(): string {
        return $this->text . " World";
    }
}

class ConcreteClass2 extends AbstractClass {
    public function getText(): string {
        return $this->text . " PHP 7";
    }
}

echo "## Abstract Classes #####" . "<br>";
$obj1 = new ConcreteClass1();
echo $obj1->getText() . "<br>";
$obj2 = new ConcreteClass2();
echo $obj2->getText() . "<br>";