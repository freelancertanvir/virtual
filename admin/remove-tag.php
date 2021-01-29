<?php

    include('../dbconfig.php');
    $b_number=$_POST['b_number'];
    $type=$_POST['type'];
        
            $query="DELETE from qr_codes WHERE building_number='{$b_number}' and qr_type='{$type}' and qr_mode=1";
            if(mysqli_query($conn,$query)){
                echo 1;
            }else{
                echo 0;
            }

?>