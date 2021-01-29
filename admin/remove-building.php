<?php

    include('../dbconfig.php');
    $b_number=$_POST['b_number'];
        
            $query="DELETE FROM building WHERE building_number='{$b_number}'";
            if(mysqli_query($conn,$query)){
                echo 1;
            }else{
                echo 0;
            }

?>