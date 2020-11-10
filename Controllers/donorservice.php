<?php
    include "../class/Dbconnection.php";
   
    class donorservice{
        public function getNumberOfRegisteredDonor(){
            $obj = new DBconnection();
            $rows = $obj->getAllData("SELECT donorid FROM donor");
            $data = count($rows);
            return $data;
        }

        public function getNumberOfActiveDonor(){
            $obj = new DBconnection();
            $rows = $obj->getAllData("SELECT donorid FROM donor where ready_to_donate!=0");
            $data = count($rows);
            return $data;
        }
    }
?>