<?php
$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Load Composer's autoloader
include_once('dbconfig.php');
if (isset($_POST['r_button'])) {
    $c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
    $m_name = mysqli_real_escape_string($conn, $_POST['m_name']);
    $c_email = mysqli_real_escape_string($conn, $_POST['c_email']);
    $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);
    $c_cpassword = mysqli_real_escape_string($conn, $_POST['c_cpassword']);
    $c_address = mysqli_real_escape_string($conn, $_POST['c_address']);
    $c_phone = mysqli_real_escape_string($conn, $_POST['c_phone']);
    $c_city = mysqli_real_escape_string($conn, $_POST['c_city']);
    $c_state = mysqli_real_escape_string($conn, $_POST['c_state']);
    $c_code = mysqli_real_escape_string($conn, $_POST['c_code']);
    if ($c_password == $c_cpassword) {
        $query = "select company_email from company where company_email='{$c_email}'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $msg = "Email Already Exists";
        } else {
            $token = "asdfghjklpoiuytrewqzxcvbnmLKJHGFDSAQWERTYUIOPMNBVCXZ0987654321!$/()*";
            $token = str_shuffle($token);
            $token = substr($token, 0, 15);
            $c_password = sha1($c_password);
            $query = "insert into company values('{$c_name}','{$m_name}','{$c_phone}','{$c_email}',
            '{$c_city}','{$c_state}','{$c_code}','{$c_password}','{$token}',0)";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $mail=new PHPMailer();
                $mail->setFrom('register@virtualbuildingmanager.com');
                $mail->addAddress($c_email,$m_name);
                $mail->Subject = "Verify Email";
                $mail->isHTML(true);
                $mail->Body = "Thank You for registering your company to the Virtual Building Manager system. Please check the link below to complete registration.<br>
                <a href='http://virtualbuildingmanager.com/confirm.php?email=$c_email&token=$token'>Verify<a/>";
                if($mail->send()){
                    header('Location: verification-email.php');
                }
            }
        }
    } else {
        $msg = "Passwords Does not Match";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include('navbar.php') ?>
    <h1 style="color: #5c34c2;" class="text-center mb-4 mt-5">Register Company</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 m-lg-auto col-md-8 m-md-auto col-sm-10 m-sm-auto">
                <?php if ($msg != "") {
                ?> <div class="text-center text-danger"><?php echo $msg ?></div><?php
                                                                            } ?>
                <form action="register-company.php" method="post">
                    <div class="mb-3">
                        <label for="name">Company Name</label>
                        <input type="text" class="form-control" name="c_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="name">Manager Name</label>
                        <input type="text" class="form-control" name="m_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="c_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="c_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="c_cpassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="c_address" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">+61</span>
                            <input type="tel" class="form-control" name="c_phone" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="address">City</label>
                        <input type="text" class="form-control" name="c_city" required>
                    </div>
                    <div class="mb-3">
                        <label for="address">State</label>
                        <input type="text" class="form-control" name="c_state" required>
                    </div>
                    <div class="mb-3">
                        <label for="address">Postal Code</label>
                        <input type="text" class="form-control" name="c_code" required>
                    </div>
                    <div class="row">
                        <div class="col-3 ml-auto mr-auto mb-5 mt-4">
                            <button style="padding: 5px 30px;" class="custom-btns" type="submit" name="r_button">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>