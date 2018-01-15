<?php
class Product {
    private $name;
    private $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getprice(): float {
        return $this->price;
    }

    public function output(Writer $write) {
        $write->write($this);
    }
}

interface Writer {
    public function write(Product $product);
}

# Using anonymous class
print "Using anonymous class:<br>";
$p = new Product("Computer", 1200);
$p->output(
    new class implements Writer{
        public function write(Product $product) {
            print $product->getName() . " " . $product->getPrice() . "<br><br>";
        }
    }
);

# Passing values to an anonymou class's constructor
print "Passing values to an anonymou class's constructor:<br>";
$p = new Product("Coffe", 3);
$p->output(
    new class(4) implements Writer{
        private $quantity;

        public function __construct(int $quantity) {
            $this->quantity = $quantity;
        }

        public function write(Product $product) {
            print "{$product->getName()} {$product->getPrice()} ({$this->quantity} item(s))";
        }
    }
);