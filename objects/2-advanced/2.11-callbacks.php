<?php
class Product {
    public $name;
    public $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

class Process {
    private $callbacks;

    public function registerCallback(callable $callback) {
        if( !is_callable($callback)) {
            throw new Exception("callback not callable");
        }
        $this->callbacks[] = $callback;
    }

    public function sale(Product $product) {
        print "{$product->name}: processing <br>";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}

# using create_function() function
print "# using create_function() function <br>";
$logger = create_function(
    '$product',
    'print "    logging ({$product->name})<br>";'
);
$processor = new Process();
$processor->registerCallback($logger);
$processor->sale(new Product("phone", 200));
$processor->sale(new Product("computer", 1200));


# using anonymous functions
print "<br><br># using anonymous functions <br>";
$logger = function ($product) {
    print "    logging ({$product->name})<br>";
};
$processor = new Process();
$processor->registerCallback($logger);
$processor->sale(new Product("coffe", 6));
$processor->sale(new Product("computer", 1200));

# using object's method
print "<br><br># using object's method <br>";
class Logger{
    public function doLog(Product $product) {
        print "    logging ({$product->name})<br>";
    }
}
$processor = new Process();
$processor->registerCallback([new Logger(), "doLog"]);
$processor->sale(new Product("Shoes", 60));
$processor->sale(new Product("Notebook", 1500));

# return anonymous functions from method as a factory
print "<br><br># # return anonymous functions from method as a factory <br>";
class Totalizer {
    /**  
    * This anonymous uses closures. In other words, this function continues 
    * to remember the context in which $amt and $count variable were created
    */
    public static function warnAmount($amt) {        
        $count = 0;
        return function (Product $product) use ($amt, &$count) {
            if($product->price > 5) {
                $count += $product->price;
                if($count > $amt) {
                    print "    reached high price: {$product->price}<br>";
                }                
            }
        };
    }
}
$processor = new Process();
$processor->registerCallback(Totalizer::warnAmount(1300));
$processor->sale(new Product("coffe", 200));
$processor->sale(new Product("computer", 1200));