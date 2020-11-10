<?php

$file = "../Jsons/district.json";
$json = file_get_contents($file,0,null,null);
$obj = json_decode($json);
$data = $obj->districts;


echo json_encode($data);
?>