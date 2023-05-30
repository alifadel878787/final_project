<?php

header("Content_Type: application/json; charset=UTF-8");

include_once 'conn.php';
include_once 'employee.php';

$database  =new DataBase();
$db = $conn->getConnection();
$items  =new Employee($db);
$stmt = $items->rowCount();


echo json_encode($itemsCount);
if($itemsCount>0){
    $employeeArr  =array();
    $employeeArr["body"]=array();
    $employeeArr["itemCount"]=$itemsCount;
    $result= $stmt->get_result();
    while($row=$stmt->fetch_assoc()){
        $e = array(
"id" =>$row["id"];
"name" =>$row["name"];
"email" =>$row["email"];
"age" =>$row["age"];
"distance" =>$row["distance"];

        );
        array_push($employeeArr["body"] ,$e);
    }
    echo json_encode($employeeArr);

}else{
    http_response_code(404);
    echo json_encode(array("message"=> "No record found"))
}


?>