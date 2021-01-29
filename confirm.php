<?php
function redirect(){
    header('Location: register-company.php');
}

if(!isset($_GET['email']) && !isset($_GET['token'])){
    redirect();
}
else{
    include('dbconfig.php');
    $c_email=mysqli_real_escape_string($conn,$_GET['email']);
    $token=mysqli_real_escape_string($conn,$_GET['token']);
    $query="select * from company where company_email='{$c_email}' AND token='{$token}' AND
    isConfirmed=0";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        $query="update company set isConfirmed=1,token='' where company_email='{$c_email}'";
        $result=mysqli_query($conn,$query);
        if($result){
            header('Location: company-login.php');
        }
    }else{
        redirect();
    }
}



?>