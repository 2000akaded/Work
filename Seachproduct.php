<?php
    session_start();
    include("connex.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>aodd Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><!-- บนหัว -->
                <button type = "button" class = "navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded = "false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">aoaad</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a> </li>
                    <li><a href="#">Menu</a> </li>
                    <li><a href="">Search</a> </li>


                    <!-- -->
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-hapopup="true" aria-expanded="false"> 
                           ประเภท <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="showproduct.php?category=1">ปลา</a></li>
                            <li><a href="showproduct.php?category=2">ผัก</a></li>
                            <li><a href="showproduct.php?category=3">หมู</a></li>
                            <li><a href="showproduct.php?category=4">ไก่</a></li>
                        </ul>
                    </li>
                    <!-- -->
                    
                </ul>
               
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        if(isset($_SESSION['id'])){
                    ?>
                    <li class = "dropdown">
                        <a href="#" class = "dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded ="false">
                            <i class ="glyphicon glyphicon-user"></i>
                            ยินดีตอนรับ 5555555 <?php echo $_SESSION['name'] ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">โปรไฟล์</a></li>
                            <li><a href="#">รายการสั่งซื้อ</a></li>
                            <li><a href="newproduct.php">เพิ่มรายการสินค้า</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="sessiondestroy.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                        <li><a href="#">
                            <i class="glyphicon glyphicon-shopping-cart"></i> (0)
                        </a>
                    </li>

                    <?php
                        }
                        else{
                    ?>
                        <li><a href="login.php">เข้าสู่ระบบ</a> </li>
                        <li><a href="Reg.php">สมัคร</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <h2>Search Product</h2>
            <div class="col-md-12">
            <form action="" method="post">
                    <div class="form-group">
                        <div class="col-md-10">

                        <!--*********************************-->
                            <select name="searchCol">
                                <option value="1">ชื่อสินค้า</option>
                                <option value="2">รายละเอียด</option>
                                <option value="3">ราคา</option>
                            </select>
                        <!--*********************************-->

                            <input type="text" class="form-control" name="txtSearch" placeholder="กรอกข้อมูล">
                        </div>
                        <div class="col-md-2">
                            <button name="submit" class="btn btn-block btn-success">
                                <i class="glyphicon glyphicon-search"></i> Go!
                            </button>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
    

    <?php 
        
    ?>
    
    <?php
            if(isset($_POST['submit'])){
                $Search = $_POST['txtSearch'];
                $searchCol = $_POST['searchCol'];
                //$search1 = $_POST['txtSearch1'];
                //$sql = "SELECT * FROM product WHERE name LIKE '%$search%'";
                //wildcard %  _
                //Regular Expression RegEx
                
                //Information Retrieval
        //************************************************


        $sql = "SELECT * FROM product";
        switch($searchCol){
            case 1: $sql .= " Where name LIKE '%$Search%'";
                break;
            case 2: $sql .= " Where description LIKE '%$Search%'";
                break;
            case 3: $sql .= " Where price <= $Search";
                break;
        }
        ?>
        <!--<div class="row">
                <div class="col-md-12">
                    <?php echo $_POST['txtSearch']; ?>
                    
                </div>
            </div> -->
        <div class="container">
        <div class="row">
        <?php 
            //$sql = "SELECT * FROM product ORDER BY id";
            $result = $conn->query($sql);
            if(!$result){
                echo "Error during retrieval data".$conn->error;
            }
            else{
                //ดึงข้อมูล
                while($prd = $result->fetch_object()){
                    $prd->id;
        ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="thumbnail">
                    <a href="productdetail.php?pid=<?php echo $prd->id; ?>">
                        <img src="jpg/<?php echo $prd->picture; ?>" alt="" >
                    </a>
                        <div class="caption">
                        <h3><?php echo $prd->name; ?></h3>
                            <p><?php echo $prd->description; ?></p>
                            <p>
                                <strong>Price: <?php echo $prd->price; ?></strong>
                            </p>
                            <p>
                                <a href="#" class="btn btn-succcess">Add to basket</a>
                                <a href="editproduct.php?pid=<?php echo $prd->id?>" class="btn btn-warning">
                                    <i class="glyphicon glyphicon-pencil"></i>Edit
                                </a>
                                <a href="deleteditproduct.php?pid=<?php echo $prd->id?>" class="btn btn-danger lnkDelete" id="">
                                    <i class="glyphicon glyphicon-trash"></i>Dele
                                </a>
                            </p>
                        </div>
                        
                    </div>
                    
                </div>
            <?php 
                }
            }
            ?> 
        </div>
    </div>
    <!--************************************************-->
<?php } 
       else if(isset($_POST['submit'])){
           $Search1 = $_POST['txtmin'];
           $Search2 = $_POST['txtmax'];
           $sql = "SELECT * FROM product WHERE price BETWEEN '$Search1' AND '$Search2'";
        ?>
        <?php //echo $_POST['txtSearch']; ?>
        
        <div class="row">
        <?php 
            $result = $conn->query($sql);
            if(!$result){
                echo "Error during retrieval data";
            }
            else{
                //ดึงข้อมูล
                while($prd = $result->fetch_object()){
                    $prd->id;
        ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="thumbnail">
                    <a href="productdetail.php?pid=<?php echo $prd->id; ?>">
                        <img src="jpg/<?php echo $prd->picture; ?>" alt="" >
                    </a>
                        <div class="caption">
                        <h3><?php echo $prd->name; ?></h3>
                            <p><?php echo $prd->description; ?></p>
                            <p>
                                <strong>Price: <?php echo $prd->price; ?></strong>
                            </p>
                            <p>
                                <a href="#" class="btn btn-succcess">Add to basket</a>
                                <a href="editproduct.php?pid=<?php echo $prd->id?>" class="btn btn-warning">
                                    <i class="glyphicon glyphicon-pencil"></i>Edit
                                </a>
                                <a href="deleteditproduct.php?pid=<?php echo $prd->id?>" class="btn btn-danger lnkDelete" id="">
                                    <i class="glyphicon glyphicon-trash"></i>Dele
                                </a>
                            </p>
                        </div>
                        
                    </div>
                    
                </div>
            <?php 
                }
            }
            ?>
        </div>
    </div>
<?php } ?>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>