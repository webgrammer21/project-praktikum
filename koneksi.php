<?php 
$conn = new mysqli("localhost","root","","testcafe");
if($conn -> connect_error){
    die($conn -> connect_error);
}

?>