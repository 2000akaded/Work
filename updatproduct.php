<?php 
    session_start();
    include("connex.php");
    $pid = $_POST['hdnProductId'];
    $name = $_POST['txtName'];
    $description = $_POST['txtDescription'];
    $price= $_POST['txtPrice'];
    $unitInStock= $_POST['txtStock'];
    
    
    //update picture
    $picture=$_POST['hdnProductPic'];
    if($_FILES["filePic"]["name"]!=""){
        $picture = $_FILES["filePic"]["name"];

        //movefile
        move_uploaded_file($_FILES["filepic"]["tmp_name"],"jpg/".$_FILES["filepic"]["name"]);
        
    }
    
    

    $sql = "UPDATE product SET name='$name',description='$description',price=$price,unitInStock=$unitInStock, picture='$picture' WHERE id = $pid";
    
    //echo $sql;

    $result=$conn->query($sql);
    if(!$result){
        echo "Error: " .$conn->error;
    }
    else{
        header("Location:index.php");
    }



?>