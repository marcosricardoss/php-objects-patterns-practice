<?php
class Product {

    public function __get($property) {
        // Invoked when an undefined property is accessed
        $method = "get{$property}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }
    
    public function __set($property, $value) {
        // Invoked when a value is assigned to an undefined property
    }
    
    public function __isset($property) {
        // Invoked when isset()is called on an undefined property
    }

    public function __unset($property) {
        // Invoked when unset()is called on an undefined property
    }

    public function __call($method, $arg_array) {
        // Invoked when an undefined non-static method is called
    }

    public static function __callStatic($method, $arg_array) {
        // Invoked when an undefined static method is called
    }

    public function __destruct() {
        // Invoked just before an object is garbage-collected
        print "Object expunged from memory";
    }

    public function getName(): string {
        return "Product Name";
    }

    public function getPrice(): float {
        return 99.99;
    }
}    

$p = new Product();
print $p->name . ": $ " . $p->price."<br>";
print $p->undefinedProperty;unset($p);

?>