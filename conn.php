<?php

$conn  = mysqli_connect("localhost","root","","Sam");

if(mysqli_connect_error()){
echo "error in database";
}else{
return $conn ; 
}

?>