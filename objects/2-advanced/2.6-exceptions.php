<?php
Class Conf1 {
    private $file;
    private $xml;

    public function __construct(string $file) {
        $this->file = $file;
        if(! file_exists($file)) {
            throw new \Exception("file '$file' does not exist");
        }
        $this->xml = simplexml_load_file($file);
    }
}

Class Conf2 {    
    private $file;
    private $xml;

    public function __construct(string $file) {
        $this->file = $file;
        if(! file_exists($file)) {
            throw new FileException("file '$file' does not exist");
        }

        $this->xml = simplexml_load_file($file, null, LIBXML_NOERROR);
        if (! is_object($this->xml)) {
            //throw new XmlException(libxml:get_last_error());
            throw new XmlException("broken xml");
        }
    }       
}

Class XmlException extends \Exception {
    private $error;

    public function __construct(\LibXmlErro $erro) {
        $shortfile = basename($erro->file);
        $msg = "[{$shortfile}, line {$error->line}, col {$error->column}] {$error->message}";
        $this->error = $error;
        parent::__construct($msg, $error->code);
    }

    public function getLibXmlErro() {
        return $this->error;
    }
}

Class FileException extends \Exception {

}   

// Using Conf1 class
try {
    $conf = new Conf1(__DIR__ . "/file.xml");
} catch (Exception $e) {    
    #die($e->__toString());    
}

// Using Conf2 class
try {
    $conf = new Conf2(__DIR__ . "/file.xml");
} catch (FileException $e) {
    // permissions issue or non-existent file
    die($e->__toString());
} catch (XmlException $e) {
    // broken xml
    die($e->__toString());
} catch (\Exception $e) {
    // backstop: should not be called
    die($e->__toString());
} finally {
    // if the function die() is not called in the script, the finallyclause is always run.
}
    