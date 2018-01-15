<?php
interface InterfaceExample {
    public function getText(): string;
}

class Implementation1 implements InterfaceExample {
    public function getText(): string {
        return "Hello World";
    }
}

class Implementation2 implements InterfaceExample {
    public function getText(): string {
        return "Hello PHP 7";
    }
}

echo "## Interfaces #####" . "<br>";
$obj1 = new Implementation1();
echo $obj1->getText() . "<br>";
$obj2 = new Implementation2();
echo $obj2->getText() . "<br>";