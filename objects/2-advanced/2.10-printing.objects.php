<?php
class Product {
    private $name;
    private $price;    

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;        
    }    

    public function __toString(): string {
        return $this->name . ": $". $this->price;
    }
}

$p = new Product("Computer", 2000);
echo $p;