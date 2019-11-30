<?php
    //connect Server
    $conn = new mysqli("localhost", "root","12345678","aooa");
    if($conn->connect_errno){
        die("connection failed : ".$conn->connect_error);
    }
?>