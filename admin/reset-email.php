
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include('navbar.php') ?>
    <h1 class="text-center mb-md-5 mb-sm-5 mb-4 mt-5 text-color">Generate Reset Password Link</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-lg-auto col-md-8 m-md-auto col-sm-10 m-sm-auto">
                <form  method="post">
                    <div class="mb-3">
                        <label >Email</label>
                        <input type="email" class="form-control" name="username" id="username" placeholder="Email" required>
                    </div>
                    <div class="row">
                        <div class="col-4 ml-auto mr-auto mb-5 mt-4">
                            <button style="width: 140px; padding: 5px 20px;" class="custom-btns" type="submit" name="save-button" id="save-button">Send Email</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</body>

</html>