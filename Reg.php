<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เข้าสู่รับบ</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php 
        //รับข้อมูลจาก Fome
        include("connex.php");
        if(isset($_POST['submit'])){ //check if it is posted back
            // รับข้อมูล
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = md5($conn->escape_string($_POST['password']));
            $email = $_POST['email'];

            //echo "$firstname $lastname $username $password $email";
            //insert to table
            $sqlInsert ="INSERT INTO customer (frisname, lasname, usename, password, emaill, actve) VALUES('$firstname','$lastname','$username','$password','$email','0')";

            //echo $sqlInsert;
            //การเรียก 
            $result = $conn->query($sqlInsert);
            if($result){
                //สำเร็จ
               echo "<script>alert('Register Complete');</script>"; 
               header("Location: login.php");
            }
            else{
                echo "Error during insert: ".$conn->error;
            }
        } 
    ?>
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            กรุณาเข้าสู่ระบบ
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="username" class = "col-md-3">firstname </label>
                                <div class="col-md-9">
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class = "col-md-3">lastname </label>
                                <div class="col-md-9">
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class = "col-md-3">username </label>
                                <div class="col-md-9">
                                    <input type="text" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class = "col-md-3">password </label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class = "col-md-3">E-mail </label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary btn-block" name="submit">Log in</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>