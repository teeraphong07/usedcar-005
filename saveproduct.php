<?php
    include("connect.php");
    echo ini_get("upload_max_filesize")."<br>";
    $allowType=["jpg","jpeg","gif","png","tif","tiff"];
    $filetype=explode("/",$_FILES["filepic"]["type"]);
    $size = $_FILES["filepic"]["size"]/1024/1024;
    //echo "Type: ".$_FILES["filepic"]["type"]."<br>";
    if(!in_array($filetype[1],$allowType)){
        //เมื่ออัพโหลดไฟล์ที่ไม่ตรงกับ Type ในAllowType
        echo "Non-image file is not allow";
    }
    else if(size>100.00){
        echo "file size exceds the maximum .treshold";
    }
    else{
        $ctgy = $_POST['rdoType'];
        $brand = $_POST['txtbrand'];
        $model = $_POST['txtmodel'];
        $modelYear = $_POST['txtyear'];
        $color = $_POST['txtcolor'];
        $license = $_POST['txtlicense'];
        $province = $_POST['txtprovince'];
        $price = $_POST['txtprice'];
        $postid = $_POST['txtid'];
        $filename = $_FILES["filepic"]["name"];

        
        
        //echo "Type: ".$_FILES["filepic"]["type"]."<br>";
        //echo "Name: ".$_FILES["filepic"]["name"]."<br>";
        //echo "Size: ".$_FILES["filepic"]["size"]."<br>";
        //echo "Temp name: ".$_FILES["filepic"]["tmp_name"]."<br>";
        //echo "Error: ".$_FILES["filepic"]["error"]."<br>";
        move_uploaded_file($_FILES["filepic"]["tmp_name"],"img/".$_FILES["filepic"]["name"]);
        $sqlInsert ="INSERT INTO car (carType,brand,model,modelYear,color,license,province,price,postedBy,carpic) 
        VALUE('$ctgy','$brand','$model','$modelYear','$color','$license','$province','$price','$postid','$filename')";
        echo $sqlInsert;
        $result = $conn->query($sqlInsert);
            if($result){
               echo"<script>alert('Complete')<?script>";
               header("location:index.php");
            }
            else{
                echo"Error during :".$conn->error;
            }

    }
    
?>