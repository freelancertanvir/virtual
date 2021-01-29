<?php
include('../dbconfig.php');
if(isset($_GET['b_number']) && isset($_GET['unit']) && isset($_GET['id'])){
    $b_number = mysqli_real_escape_string($conn, $_GET['b_number']);
    $unit = mysqli_real_escape_string($conn, $_GET['unit']);
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query="select * from routes where id='{$id}'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result) == 0){
        die('Error');
    }else{
    $query = "select * from building where building_number='{$b_number}' and building_status='active'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 0) {
            echo "<p class='text-center alert alert-danger mt-5'>Building Does Not Exists Or Inactive</p>";
            die();
        } else {
            $query = "select qr_type from qr_codes where building_number='{$b_number}' and qr_status='active'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 0) {
                echo "<p class='text-center alert alert-danger mt-5'>Unit Does Not Exists or Inactive For this Building</p>";
                die();
            } else{
                session_start();
                $_SESSION['b_number']=$b_number;
                $_SESSION['unit']=$unit;
                header("Location: contractor-registration.php");
            }
        }
    }
}else{
    die('Error');
}


