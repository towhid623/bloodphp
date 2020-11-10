<?php
class bloodgroup {
    private static $enum = array(1 => "A+", 2 => "A-", 3 => "B+", 4 => "B-", 5 => "O+", 6 => "O-", 7 => "AB+", 8 => "AB-");

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