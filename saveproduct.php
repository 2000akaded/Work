<?php 
    $allowedType=["jpg","jpeg","gif","png","tif","tiff"];
    $fileType=explode("/",$_FILES["filePic"]["type"]);
    //image/pns fileType=["imge", "png"]
    if(!in_array($fileType[1],$allowedType)){
        //เมื่ออัพโหลดไฟล์ให้ตรงกับ ในผ Allowedtyp
        echo "Non-image file is not allowed,";

    }
    else{
        echo "Type: " . $_FILES["filePic"]["type"] . "<br>";
        echo "Name: " . $_FILES["filePic"]["name"] . "<br>";
        echo "Size: " . $_FILES["filePic"]["size"] . "<br>";
        echo "Temp name: " . $_FILES["filePic"]["tmp_name"] . "<br>";
        echo "Error: " . $_FILES["filePic"]["error"] . "<br>";

        move_uploaded_file($_FILES["filePic"]["tmp_name"],"jpg/".$_FILES["filePic"]["name"]);
    }
?>