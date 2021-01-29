<?php

    include('../dbconfig.php');
    $email=$_POST['email'];
        
            $query="DELETE FROM company WHERE company_email='{$email}'";
            if(mysqli_query($conn,$query)){
                echo 1;
            }else{
                echo 0;
            }

?>