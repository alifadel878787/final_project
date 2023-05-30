<?php
class Employee{
private $coon;
private $db_table = "employee";

public $id;
public $name;
public $email;
public $age;
public $distance;

public function _construct($db){
    $this->conn = $db;
}

public function getEmployee(){
    $sqlQuery = "select id,name,email,age,distance from ". $this->db_table ."";
$stmt  = $this->conn->prepare($sqlQuery);
$stmt->execute();
return $stmt;
}

public function createEmployee(){
$sqlQuery =  
"insert into $db_table(name,email,age,distance) values(?,?,?,?)";
$stmt =$this->conn->prepare($sqlQuery);


$this->name=htmlspecialchars(strip_tags($this->name));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->age=htmlspecialchars(strip_tags($this->age));
$this->distance=htmlspecialchars(strip_tags($this->distance));

$stmt->bind_param("ssis" ,$this->name,$this->email,$this->age,$this->distance
);

if($stmt->execute()){
    return true;
}else{
    return false;
}

function deleteEmployee(){
    $sqlQuery = "delete from ${this->db_table}  where id=?";
    $stmt = $this->conn->prepare($sqlQuery);
    $this->id=htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam('i',$this->id);

    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
    
}
public function updateEmployee(){
    $sqlQuery =  
    "update ${this->db_table} set name=?,email=?,age=?,distance=? where id=?";;
    $stmt =$this->conn->prepare($sqlQuery);
    
    
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->age=htmlspecialchars(strip_tags($this->age));
    $this->distance=htmlspecialchars(strip_tags($this->distance));
    
    $stmt->bind_param("ssisi" ,$this->name,$this->email,$this->age,$this->distance,$this->id,
    );
    
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }


}
}
}



?>