<?php

    include('../dbconfig.php');
    $b_number=$_POST['b_number'];
        
            $query="UPDATE building SET building_status='active' WHERE building_number='{$b_number}'";
            $query1="UPDATE qr_codes SET qr_status='active' WHERE building_number='{$b_number}' and qr_mode=0";
            if(mysqli_query($conn,$query) && mysqli_query($conn,$query1)){
                echo 1;
            }else{
                echo 0;
            }

?>