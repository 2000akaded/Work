<?php 
    include("connex.php");
    echo ini_get("upload_max_fillesize")."<br>";
    $allowedType=["jpg","jpeg","gif","png","tif","tiff"];
    $fileType=explode("/",$_FILES["filepic"]["type"]);
    $size = $_FILES["filepic"]["size"]/1024/1024;
    //image/pns fileType=["imge", "png"]
    if(!in_array($fileType[1],$allowedType)){
        //เมื่ออัพโหลดไฟล์ให้ตรงกับ ในผ Allowedtyp
        echo "Non-image file is not allowed,";

    }
    else if($size>1.00){
        echo "File size exceeds the maximum treshold";
    }
    else{
        $name = $_POST['txtName'];
        $desc = $_POST['txtDescription'];
        $prices = $_POST['txtPrice'];
        $unitInStock = $_POST['txtStock'];                                                                                           
        $filename = $_POST['filePic']["name"];
        //echo "Type: " . $_FILES["filePic"]["type"] . "<br>";
        //echo "Name: " . $_FILES["filePic"]["name"] . "<br>";
        //echo "Size: " . $_FILES["filePic"]["size"] . "<br>";
        //echo "Temp name: " . $_FILES["filePic"]["tmp_name"] . "<br>";
        //echo "Error: " . $_FILES["filePic"]["error"] . "<br>";

        move_uploaded_file($_FILES["filePic"]["tmp_name"],"jpg/".$_FILES["filePic"]["name"]);

        $sqlInsert = "INSERT INTO product (name,description,price,unitInStock,picture) VALUES('$name','$desc','$price','$unitInStock','$filename')";
        //echo $sqlInsert;
        $result=$conn->query($sqlInsert);
        if($result){
           echo "<script language='javascript'>alert('Insert Product Complete');</script>"; 
           header("Location: index.php");
        }
        else{
            echo "Error during insert: ".$conn->error;
        }
    }
?>