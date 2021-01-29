<?php
session_start();
ob_start();
if (!(isset($_COOKIE['b_number']) && isset($_COOKIE['unit']) && isset($_COOKIE['id']))) {
    header('Location: ../index.php');
} else {
    $_SESSION['b_number'] = $_COOKIE['b_number'];
    $_SESSION['unit'] = $_COOKIE['unit'];
    $_SESSION['id'] = $_COOKIE['id'];
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
    <h1 style="color: #5c34c2;" class="text-center  mb-5 mt-5">Work Information</h1>
    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require '../vendor/autoload.php';
    include('../dbconfig.php');
    if (isset($_POST['s-button'])) {
        if (!isset($_FILES['work'])) {
            echo "<p class='text-center alert alert-danger mt-5'>Upload Photo</p>";
        } else {
            $report = mysqli_real_escape_string($conn, $_POST['report']);
            $time = mysqli_real_escape_string($conn, $_POST['time']);
            $b_number = $_SESSION['b_number'];
            $query = "SELECT company_email,building_name from building where building_number='{$b_number}'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_row($result);
            $email = $row[0];
            $b_name = $row[1];
            $id = $_SESSION['id'];
            $fileInfo = $_FILES['work'];
            $fileName = $fileInfo['name'];
            $fileTmp = $fileInfo['tmp_name'];
            $path = "../building_works/" . uniqid() . $fileName;
            move_uploaded_file($fileTmp, $path);
            $query = "UPDATE building_data SET pic_link='{$path}',contractor_comment='{$report}',out_time='{$time}' where id='{$id}' AND building_number='{$b_number}'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $mail = new PHPMailer();
                $mail->setFrom('manager@virtualbuildingmanager.com');
                $mail->addAddress($email);
                $mail->Subject = "Contractor Comments";
                $mail->isHTML(true);
                $mail->Body = "Contractor has visited the building " . $b_name . " and he has submitted the following information <br><br>
                Comment:" . $report . ".<br> You can check the complete information by logging into <a href='www.virtualbuildingmanager.com'> Our Site </a> ";
                $mail->addAttachment($path, 'Contractor_Photo.png');
                session_unset();
                session_destroy();
                setcookie('b_number', '', time() - 28800);
                setcookie('unit', '', time() - 28800);
                setcookie('id', '', time() - 28800);
                if ($mail->send()) {
                    echo "<p class='text-center alert alert-danger mt-5'>Work Report Submitted Successfully</p>";
                    // session_unset();
                    // session_destroy();
                    // setcookie('b_number', '', time() - 28800);
                    // setcookie('unit', '', time() - 28800);
                    // setcookie('id', '', time() - 28800);
                    header('Location: ../index.php');
                }
            } else {
                echo 'Error';
                die();
            }
        }
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 m-lg-auto col-md-8 m-md-auto col-sm-10 m-sm-auto">
                <form method="post" name="contractor-comments.php" enctype="multipart/form-data">
                    <input type="hidden" id="time" name="time" value="" />
                    <div class="form-group mb-4">
                        <label>Report</label>
                        <textarea class="form-control" name="report" rows="5" required></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label>Photo of Work</label>
                        <input type="file" class="form-control-file" name="work" accept="image/png,image/jpg,image/jpeg" required>
                    </div>

                    <div class="row">
                        <div class="col-3 ml-auto mr-auto mb-5 mt-3">
                            <button style="padding: 5px 25px;" class="custom-btns" type="submit" name="s-button">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var d = new Date();
        document.getElementById("time").setAttribute('value', d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds());
    </script>
</body>

</html>