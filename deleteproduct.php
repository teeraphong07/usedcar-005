<?php
    session_start();
    include("connect.php");

    $pid = $_GET['pid'];

    $sql = "DELETE FROM car WHERE id=$pid ";

    $result = $conn->query($sql);
    if(!result){
        echo "error: ".$conn->error;
    }
    else{
        header("location:index.php");
    }

?>