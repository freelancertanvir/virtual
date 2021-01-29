
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include('navbar.php') ?>
    <?php
    if (isset($_POST['login-button'])) { 
        include('dbconfig.php');
        $c_email=mysqli_real_escape_string($conn,$_POST['email']);
        $c_password=mysqli_real_escape_string($conn,$_POST['password']);
        $c_password=sha1($c_password);
        $sql="select isConfirmed from company where company_email='{$c_email}' and company_password='{$c_password}'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0 ){
            $row=mysqli_fetch_assoc($result);
            if($row['isConfirmed']==0){
                echo "<p class='text-center alert alert-danger mt-5'>Email Not Verified</p>";
            }else{
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['company_email']=$c_email;
                header('Location: users/index.php');
            }
        }
        else {
            echo "<p class='text-center alert alert-danger mt-5'>Wrong Credentials</p>";
        }
    }
    ?>
    <h1 style="color: #5c34c2;" class="text-center mb-md-5 mb-sm-4 mt-5">Login</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-lg-auto col-md-8 m-md-auto col-sm-10 m-sm-auto">
                <form  method="post">
                    <div class="mb-3">
                        <label >Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="mb-1">
                        <label >Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <a href="./users/reset-email.php">Forgot Password</a>
                    <div class="row">
                        <div class=" col-4 ml-auto mr-auto mb-5 mt-4">
                            <button style="padding: 5px 30px;" class="custom-btns" type="submit" name="login-button" >Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</body>

</html>