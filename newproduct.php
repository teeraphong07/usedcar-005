<?php
    session_start();
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content -->
    </br>
    </br>
    </br>

    <div class="container">
            <div class="row">
                <form action="saveproduct.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">ประเภทรถ :</label>
                        <div class="col-md-9">
                            <input type="radio" name="rdoType" value="1" checked require>รถเก๋ง</label>
                            <input type="radio" name="rdoType" value="2" >รถกระบะ</label>
                            <input type="radio" name="rdoType" value="3" >รถตู้</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">ยี่ห้อรถ :</label>
                        <div class="col-md-9">
                            <input type="text" name="txtbrand" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">รุ่น :</label>
                        <div class="col-md-9">
                            <input type="text" name="txtmodel" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">ปี :</label>
                        <div class="col-md-9">
                            <input type="text" name="txtyear" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">สี:</label>
                        <div class="col-md-9">
                            <input type="text" name="txtcolor" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">เลขทะเบียน :</label>
                        <div class="col-md-9">
                            <input type="text" name="txtlicense" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">จังหวัด :</label>
                        <div class="col-md-9">
                            <input type="text" name="txtprovince" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">ราคา :</label>
                        <div class="col-md-9">
                            <input type="text" name="txtprice" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">ID :</label>
                        <div class="col-md-9">
                            <input type="text" name="txtid" class="form-control">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">รูปรถ</label>
                        <div class="col-md-9">
                            <input type="file" name="filepic" class="form-control-file" accept="image/*">
                        </div>
                    </div>
                    
                    

                    <div class="from-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="summit" class="btn btn-primary">Post</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </from>
            </div>
        </div>
</div>
</body>
</html>
