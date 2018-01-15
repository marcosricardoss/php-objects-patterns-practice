<?php
class Product {
    protected $id;
    protected $name;
    protected $price;

    public function __construct(int $id, string  $name, float $price){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function setId(string $id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }    
    
    public function setPrice(int $price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getSummaryLine() {
        return  "$this->id $this->name (Price: $this->price)";
    }
}

class BookProduct extends Product {    
    private $numPages;

    public function __construct(int $id, string  $name, float $price, int $numPages){
        parent::__construct($id, $name, $price);
        $this->numPages = $numPages;
    }

    public function getSummaryLine() {
        $summary = parent::getSummaryLine();
        $summary .= " - Page count: $this->numPages";
        return $summary;
    }
}

class CdProduct extends Product {
    private  $playLength;

    public function __construct(int $id, string  $name, float $price, int $playLength){
        parent::__construct($id, $name, $price);
        $this->playLength = $playLength;
    }

    public function getSummaryLine() {
        $summary = parent::getSummaryLine();
        $summary .= " - Total play: $this->playLength";
        return $summary;
    }
}

echo "## The Inheritance #####" . "<br><br>";
$obj1 = new BookProduct(1, "TV", 800, 520);
echo $obj1->getSummaryLine() . "<br><br>";

$obj2 = new BookProduct(1, "PHP", 33.9, 520);
echo $obj2->getSummaryLine() . "<br><br>";

$obj3 = new CdProduct(1, "ColdPlay", 10, 60);
echo $obj3->getSummaryLine() . "<br>";