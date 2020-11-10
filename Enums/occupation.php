<?php
class occupation {
    private static $enum = array(1 => "Business", 2 => "Service_Holder", 3 => "Student", 4 => "Housewife", 5 => "Others");

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