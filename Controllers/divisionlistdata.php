<?php

$file = "../Jsons/division.json";
$json = file_get_contents($file,0,null,null);
$obj = json_decode($json);
$data = $obj->divisions;


echo json_encode($data);
?>