<?php

    include('../dbconfig.php');
    $b_number=$_POST['b_number'];
    $type=$_POST['type'];
        
            $query="UPDATE qr_codes SET qr_status='active' WHERE building_number='{$b_number}' and qr_type='{$type}'";
            if(mysqli_query($conn,$query)){
                echo 1;
            }else{
                echo 0;
            }

?>