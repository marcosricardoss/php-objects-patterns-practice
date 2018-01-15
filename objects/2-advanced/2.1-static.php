<?php
class StaticExample {
    static public $text = "Hello World";

    public static function getText() {
        return self::$text;
    }
}

echo "## Static Methods and Properties #####" . "<br>";
echo StaticExample::$text . "<br>";
echo StaticExample::getText() . "<br>";