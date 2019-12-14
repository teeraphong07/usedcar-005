<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    </br>
    </br>
    </br>
    <title>Soi5 Used Cars 005</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/startmin.js"></script>

</head>
<body>  

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Soi 5 Used Cars 005</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="index.php"><i class="fa fa-home fa-fw"></i> หน้าหลัก</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
                <?php 
                    if(isset($_SESSION['id'])){
                ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"role="button"aria-haspopup="true"aria-expanded="false">
                        <i class="glyphicon glyphicon-user"></i>
                            ยินดีต้อนรับ <?php echo $_SESSION ['name']?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">โปรไฟล์</a></li>
                            <li><a href="#">รายการสั่งซื้อ</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-shopping-cart"></i>(0)
                        </a>
                    </li>
                    <?php 
                    }
                    else{
                    ?>
                    <li><a href="login.php">เข้าสู่ระบบ</a></li>
                    <li><a href="#">สมัครสมาชิก</a></li>
                    <?php 
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="text-center">
                        <a href="showall.php">รถยนต์ของเรา</a>
                    </li>
                    <li>
                        <a href="showall.php" class="active"><i class="fa fa-car fa-fw"></i> รถทุกประเภท</a>
                    </li>
                    <li>
                        <a href="showproduct.php?carType=1" class="active"><i class="fa fa-car fa-fw"></i> รถเก๋ง</a>
                    </li>
                    <li>
                        <a href="showproduct.php?carType=2" class="active"><i class="fa fa-truck fa-fw"></i> รถกระบะ</a>
                    </li>
                    <li>
                        <a href="showproduct.php?carType=3" class="active"><i class="fa fa-truck fa-fw"></i> รถตู้</a>
                    </li>
                    <li>
                        <a href="newproduct.php" class="active"><i class=""></i> + Post a car</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content -->    
    
    <p><a href="newproduct.php" class="btn btn-success">+ Post a car</a>

    <div class="container">
        <div class = "row">
           <?php  
                include_once("connect.php");
                $sql ="SELECT * FROM car ORDER BY id";
                $result = $conn->query($sql);
                if(!$result){
                    echo "Error during data retrieval";
                }
                else{
                    while($prd=$result->fetch_object()){
                ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="thumbnail">
                    <a href="productdetail.php?pid=<?php echo $prd->id; ?>&carType=<?php echo $id;?>">
                        <img src="img/<?php echo $prd->carpic;?>" alt="">
                    </a>
                    <div class="caption">
                        <h3><?php echo $prd->brand?></h3>
                            <p><?php echo $prd->model?></p>
                                <p><strong>ปี: <?php echo $prd->modelYear?></strong></p>
                                <p><strong>สี: <?php echo $prd->color?></strong></p>
                                <p><strong><?php echo $prd->license?></strong></p>
                                <p><strong>Price: <?php echo $prd->price?></strong></p>
                                <p><a href="#" class="btn btn-success">Read more</a></p>
                                <p><a href="#" class="btn btn-success">Add to Basket</a>
                                
                                <a href="editproduct.php?pid=<?php echo $prd->id?>"
                                class="btn btn-warning">
                                    <i class="glyphicon glyphicon-pencil"></i>Edit                     
                                </a>
                                
                                <a href="deleteproduct.php?pid=<?php echo $prd->id?>"
                                class="btn btn-danger lnkdelete" >
                                    <i class="glyphicon glyphicon-trash"></i>Delete                     
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
        $(document).ready(function(){
        });
        $(".lnkdelete").click(function(){
            if(confirm("Confirm Delete?")){
                return true;
            }
            else{
            return false;
            }
        });
    </script>
</body>
</html>