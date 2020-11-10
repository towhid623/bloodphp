<?php

include "../class/Dbconnection.php";
include "../Enums/bloodgroup.php";
$obj = new DBconnection();
$return_arr = array();

$data = $obj->getAllData("SELECT * FROM donor ORDER BY donorid");

foreach ($data as  $row) {
    $donorid = $row['donorid'];
    $blood_group = $row['blood_group'];
    $email = $row['email'];
    $mobile_number = $row['mobile_number'];
    $full_name = $row['full_name'];
    $last_donated_date = $row['last_donated_date'];
    $return_arr[] = array("donorid" => $donorid,
                    "blood_group" => bloodgroup::toString($blood_group),
                    "email" => $email,
                    "mobile_number" => $mobile_number,
                    "last_donated_date" => $last_donated_date,
                    "full_name" => $full_name);
}


echo json_encode($return_arr);
?>