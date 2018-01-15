<?php
class ClassName {
    private $propertyString;
    private $propertyInteger;

    public function __construct(string  $propertyString, int $propertyInteger){
        $this->propertyString = $propertyString;        
        $this->propertyInteger = $propertyInteger;
    }

    public function __toString() {
        return "String: $this->propertyString - Integer: $this->propertyInteger";
    }
        
    public function setPropertyString(string $propertyString){
        $this->propertyString = $propertyString;
    }

    public function getPropertyString() {
        return $this->propertyString;
    }
    
    public function setPropertyInteger(int $propertyInteger){
        $this->propertyInteger = $propertyInteger;
    }

    public function getPropertyInteger(){
        return $this->propertyInteger;
    }
}

echo "## The Class #####" . "<br>";
$obj1 = new ClassName("Object", 256);
echo $obj1 . "<br>";