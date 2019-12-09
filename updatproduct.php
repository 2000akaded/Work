<?php 
    session_start();
    include("connex.php");
    $pid = $_POST['hdnProductId'];
    $name = $_POST['txtName'];
    $description = $_POST['txtDescription'];
    $price= $_POST['txtPrice'];
    $unitInStock= $_POST['txtStock'];

    $sql = "UPDATE product SET name='$name',description='$description',price=$price,unitInStock=$unitInStock WHERE id = $pid";
    
    //echo $sql;

    $result=$conn->query($sql);
    if(!$result){
        echo "Error: " .$conn->error;
    }
    else{
        header("Location:index.php");
    }



?>