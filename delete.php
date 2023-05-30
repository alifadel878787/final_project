<?php

header("Content-Type: applicationjson; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");


include_once 'conn.php';
include_once 'employee.php';

$database  =new DataBase();
$db = $conn->getConnection();
$item  =new Employee($db);
$data  = json_decode(file_get_contents("php://input"));
$item->id  =$data->id;
$item->name = $data->name;
$item->email = $data->email;
$item->age = $data->age;
$item->distance = $data->distance;

if($item->deleteEmployee()){
    echo json_encode("employee is delete");
}else{
    echo json_encode("employee is not delete");
}

?>