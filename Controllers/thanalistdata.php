<?php

$file = "../Jsons/thana.json";
$json = file_get_contents($file,0,null,null);
$obj = json_decode($json);
$data = $obj->upazilas;


echo json_encode($data);
?>