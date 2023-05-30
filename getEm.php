<?php


header("Content_Type: application/json; charset=UTF-8");

include_once 'conn.php';
include_once 'employee.php';

$database  =new DataBase();
$db = $conn->getConnection();
$item  =new Employee($db);
$item->id  = isset($_GET['id']) ? $_GET['id'] :die();

$item->getSingleEm();
if($item->name !=null){
$em_err  = array(
"id"=>$item->id;
"name"=>$item->name;
"email"=>$item->email;
"age"=>$item->age;
"distance"=>$item->distance;

);
http_response_code(200);
echo json_encode($em_err);
}else{
    http_response_code(404);
    echo json_encode("eMPLOYEE nOT found");
    
}



?>