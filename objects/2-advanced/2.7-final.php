<?php
final class FinalExample1 {    
    // ...
}

class IllegalClass1 extends FinalExample1 {    
    // ...
}

class FinalExample2 {    
    final public function methodName() {        
        // ...
    }
}

class IllegalClass2 extends FinalExample2 {   
    final public function methodName() {
        // ...
    }
}