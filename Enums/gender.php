<?php
class gender {
    private static $enum = array(1 => "Male", 2 => "Female");

    public function toInt($name) {
        return array_search($name, self::$enum);
    }

    public function toString($ordinal) {
        return self::$enum[$ordinal];
    }

    public function getArray() {
        return self::$enum;
    }
}
?>