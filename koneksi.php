<?php 
$conn = new mysqli("localhost","root","","db_cafe");
if($conn -> connect_error){
    die($conn -> connect_error);
}

?>