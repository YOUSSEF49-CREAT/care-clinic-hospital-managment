<?php
include("../config/db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = " DELETE FROM departements WHERE id=$id";
    if(mysqli_query($conn,$sql)){
        header("location:index.php");
        exit;
    }else{
        echo "error :  " . mysqli_error($conn);
    }
}else{
    echo "id manquant!";
}