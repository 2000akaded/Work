<?php 
    session_start();
    include("connex.php");

    $pid = $_GET['pid'];

    $sql="DELETE FROM product WHERE id=$pid";

    $result-$conn->query($sql);
    if(!$result){
        echo "Error: " .$conn->error;
    }
    else{
        header("Location : index.php");
    }
?>