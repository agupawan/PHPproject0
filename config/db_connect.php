<?php
$connect = mysqli_connect('localhost','pawan','vendor123','vendordetails');
if(!$connect){
    echo "Connection error:" . mysqli_connect_error();
} 
?>