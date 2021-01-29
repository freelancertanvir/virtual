<?php
session_start();
if (!isset($_SESSION['b_number']) || !isset($_SESSION['unit'])) {
    header('Location: ./contractor-index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1 style="color: #5c34c2;" class="text-center  mb-5 mt-5">Contractor Information</h1>
    <?php
    include('../dbconfig.php');
    if(isset($_POST['r-button'])){
        $c_name=mysqli_real_escape_string($conn,$_POST['c_name']);
        $c_phone=mysqli_real_escape_string($conn,$_POST['c_phone']);
        $time=mysqli_real_escape_string($conn,$_POST['time']);
        $date=mysqli_real_escape_string($conn,$_POST['date']);
        $b_number=$_SESSION['b_number'];
        $unit=$_SESSION['unit'];
        $id=uniqid();
        $query="INSERT into building_data(id,building_number,contractor_name,contractor_phone,unit,data_date,in_time) values('{$id}','{$b_number}','{$c_name}',
        '{$c_phone}','{$unit}','{$date}','{$time}')";
        $result=mysqli_query($conn,$query);
        if($result){
            setcookie('b_number',$b_number,time()+28800);
            setcookie('unit',$unit,time()+28800);
            setcookie('id',$id,time()+28800);
            $_SESSION['id']=$id;
            header('Location: contractor-comments.php');
        }else{
            die('Error');
        }
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 m-lg-auto col-md-8 m-md-auto col-sm-10 m-sm-auto">
                <form method="post" action="contractor-registration.php">
                <input type="hidden" id="time" name="time" value=""/>
                <input type="hidden" id="date" name="date" />
                    <div class="mb-3">
                        <label  >Name</label>
                        <input type="text" class="form-control" name="c_name"  required>
                    </div>
                    <div class="mb-3">
                        <label  >Phone</label>
                        <input type="text" class="form-control" name="c_phone"  required>
                    </div>
                    <div class="row">
                        <div class="col-3 ml-auto mr-auto mb-5 mt-4">
                            <button style="padding: 5px 30px;" class="custom-btns" type="submit" name="r-button">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

   <script>
       var d = new Date();
    document.getElementById("time").setAttribute('value',d.getHours()+":"+d.getMinutes()+":"+d.getSeconds());
    document.getElementById("date").setAttribute('value',d.getFullYear()+":"+(d.getMonth()+1)+":"+d.getDate());
   </script>
</body>

</html>