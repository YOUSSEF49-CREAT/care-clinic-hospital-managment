<?php

$conn = mysqli_connect("localhost","root","","hospital_db");

if(!$conn){
    die("database error : " . mysqli_connect_error());
}
?>