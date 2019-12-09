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
                    <li><a href="#">Home</a> </li>

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
                            <li><a href="saveproduct.php">เพิ่มรายการสินค้า</a></li>
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
        <div class="jumbotron">
        <h1>oaas Shop</h1>
            <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa sint ratione error? Unde recusandae natus eum, repellat dolor id, alias dicta autem eius, nisi quaerat doloribus libero vel tenetur doloremque.
            Cumque esse iste rem quo quidem incidunt earum culpa numquam autem est optio quasi iusto suscipit consequuntur expedita dolorem repudiandae eum, dolorum perspiciatis facere vitae eius cupiditate vel voluptatem. Nam!
            Porro soluta, facilis, suscipit ipsum magnam minus veniam dolores quibusdam esse libero tenetur! Sit distinctio ea quae vero fuga, odio vel perspiciatis voluptate quod tenetur fugiat natus eos eaque iure.
            Reiciendis magnam ipsa deleniti, molestias non voluptatem officiis temporibus tempore iusto hic consequatur ratione ea quisquam vel ut suscipit quam provident distinctio quis, ducimus vero, nihil exercitationem! Facilis, iure ut?
            Ad commodi odit corporis. Ipsa quam suscipit molestiae, ducimus labore ipsum consectetur cumque quaerat commodi voluptatem velit beatae dignissimos voluptatum, neque rem asperiores quo delectus quibusdam sunt doloremque officia eos!</p>
        </div>
    </div>
    <h1>วัตถุดิบแนะนำ</h1><h3></h3>
    <div class="container">
        <div class="row">
        <?php 
            $sql = "SELECT * FROM product ORDER BY id";
            $result = $conn->query($sql);
            if(!$result){
                echo "Error during retrieval data".$conn->error;
            }
            else{
                //ดึงข้อมูล
                while($prd = $result->fetch_object()){
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
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $().ready(function(){
            $(".lnkDelete").click(function(){
            if(confirm("confirm delete?")){
                return true;
            }
            else{
                return false;
            }
           // retun confirm("Confirm delete?")
            });
        });
        
    </script>
</body>
</html>