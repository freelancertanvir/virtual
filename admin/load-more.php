<?php
$id=$_POST['id'];
include('../dbconfig.php');
$query = "SELECT * from company where isConfirmed=1 LIMIT $id,3";
$result = mysqli_query($conn, $query);
$output="";
if (mysqli_num_rows($result) == 0) {
    echo 0;
} else {
    while ($row = mysqli_fetch_row($result)) {

$output .="<table style='margin-left:auto; margin-right:auto' class='content-table'><thead><tr><th>Company Name &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
Company Manager &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
Remove &emsp;&emsp;&emsp;&emsp;
</th></tr></thead><tbody><tr><td>
<div class='faq-block wow bounceInDown' data-wow-duration='1.5s' data-wow-delay='0s'>
<div class='panel-group'>
<div class='panel panel-default'>
<div class='panel-heading' style='border: 1px solid black;'>
<h4 class='panel-title'>
<a data-toggle='collapse' data-parent='#accordion'";
$str = str_replace('@', '', $row[3]);
$str = str_replace('.', '', $str);
$output.= " href='"  . '#'. $str . "' >
                                                <div class='company' style='padding-bottom: 10px;'>
                                                    <p id='company_name' style='float: left; width: 40%;'>".  $row[0] ." </p>
                                                    <p id='company_manager' style='float: left; width: 52%;'>".  $row[1] ."</p>
                                                </div>

                                            </a>
                                            <a style='color:red;' id='company-btn' data-email='". $row[3] ."'>Remove</a>
                                        </h4>
                                    </div>
                                    <div id='". $str ."' class='panel-collapse collapse'>";
                                    
                                        
                                        $query1 = "SELECT * from building where company_email='{$row[3]}'";
                                        $result1 = mysqli_query($conn, $query1) or die('Error');
                                        if (mysqli_num_rows($result1) > 0) {
                                            $i = 0;
                                            while ($row1 = mysqli_fetch_row($result1)) {

                                                $i++;
                                        
                                        $output .="<table class='content-table'>
                                        <!--Bulding Table header-->
                                        <thead>
                                            <tr style='background-color: #6575e0;'>
                                                <th>Sr No.</th>
                                                <th>Building Number &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                    Building Name &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                </th>
                                                <th>
                                                    <a style='cursor: pointer; font-size:17px; color:red;' id='building-btn' data-number='". $row1[2]. "'>Remove</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>" . $i ." </td>
                                                <td>
                                                    <div class='faq-block wow bounceInDown' data-wow-duration='1.5s' data-wow-delay='0s'>
                                                        <div class='panel-group'>
                                                            <div class='panel panel-default'>
                                                                <div class='panel-heading' style='border: 1px solid black;'>
                                                                    <h4 class='panel-title'>
                                                                        <a data-toggle='collapse' data-parent='#accordion' href='" . '#' . $row1[2]. "'>
                                                 
                                                                                        <div class='bulding' style='padding-bottom: 20px;'>
                                                                                            <p id='building_number' style='float: left; width: 43%;'> " .  $row1[2] ."</p>
                                                                                            <p id='building_name' style='float: left; width: 32%;'> ". $row1[1] ."</p>

                                                                                        </div>
                                                                                    </a>



                                                                                </h4>
                                                                            </div>
                                                                            <div id='" . $row1[2] . "' class='panel-collapse collapse' style='color: black;'>

                                                                                <div class='col-md-6' style='width: 50%; height: 250px; border-right: 2.5px solid black;'>
                                                                                    <div class='row'>
                                                                                        <div class='col' style='width: 100%; height: 250px;'>
                                                                                            <h4 style='text-align: center; padding-top: 15px;'>Building</h4>
                                                                                            <div style='width: 100%; border-top: 1px solid grey; padding-bottom: 10px;'></div>
                                                                                            <h5 class='lighter'><strong>Address:</strong> " . $row1[3] ."</h5>
                                                                                            <div style='width: 100%; border-top: 1px solid grey; padding-bottom: 10px;'></div>
                                                                                            <h5 style='float: left; padding: 7px 0px;'>Status:</h5>
                                                                                            <h5 class='lighter' style='float: left; background-color: palegreen; padding: 7px; border-radius: 5px; margin-left: 5px;'>" . $row1[7] ."</h5>
                                                                                            <br><br>
                                                                                            <div style='width: 100%; border-top: 1px solid grey; padding-bottom: 10px;'></div>
                                                                                            <h5 class='lighter'><strong>Invoice:</strong><a href='" . $row1[8] ."' download='". basename($row1[8]) ."' class='btn-default' style='margin-left: 1%; padding: 7px; background-color: #6575e0; border-radius: 5px;'>Download</a></h5>
                                                                                            <div style='width: 100%; border-top: 1px solid grey; padding-bottom: 10px;'></div>
                                                                                            <h5 class='lighter'><strong>View Data:</strong>";
                                                                                            if($row1[7]=='active'){
                                                                                                $output .=" <a class='btn-default' style='margin-left: 1%; padding: 7px; background-color: #6575e0; border-radius: 5px;' target='_blank' href='".'./building-data.php?b_number=' . $row1[2] ."'>View</a>";
                                                                                            }
                                                                                          $output .=" </h5>

                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <div class='col-md-6' style='width: 50%; height: 400px; border-left: 2.5px solid black;'>
                                                                                    <div class='row'>
                                                                                        <div class='col' style='width: 100%; height: 100%; margin-left: 5px;'>
                                                                                            <h4 style='text-align: center; padding-top: 15px;'>Tag</h4>
                                                                                            <div style='width: 100%; border-top: 1px solid grey; padding-bottom: 10px;'></div>
                                                                                            <div style='height: 350px; overflow: auto;'>";
                                                                                                $query2 = "SELECT * from qr_codes where building_number='{$row1[2]}'";
                                                                                                $result2 = mysqli_query($conn, $query2);
                                                                                                if (mysqli_num_rows($result2) > 0) {

                                                                                                  $output .= "<table class='content-table'>
                                                                                                  <thead>
                                                                                                      <tr style='background-color: #9f6bca;'>

                                                                                                          <th>Unit</th>
                                                                                                          <th>Status</th>
                                                                                                          <th>Invoice</th>
                                                                                                          <th>Label</th>
                                                                                                      </tr>
                                                                                                  </thead>
                                                                                                  <tbody>";
                                                                                                            while ($row2 = mysqli_fetch_row($result2)) {
                                                                                                                if (strpos($row2[1], ",")) {
                                                                                                                    $array = explode(",", $row2[1]);
                                                                                                                    for ($k = 0; $k < sizeof($array); $k++) {

                                                                                                                    $output .= "<tr>
                                                                                                                    <td>". $array[$k] . "</td>
                                                                                                                    <td>
                                                                                                                        <h5 class='lighter' style='background-color: palegreen; padding: 7px; border-radius: 5px; margin-top: 12px;'>". $row2[2] ."</h5>
                                                                                                                    </td>
                                                                                                                    <td>"; if ($row2[3]) {
                                                                                                                        $output.="<a class='btn btn-outline-success' href='". $row2[3] ."' download='". basename($row2[3])."'>Download</a>";
                                                                                                                        
                                                                                                                        } else {
                                                                                                                            $output .="In Building Invoice"; }
                                                                                                                            $output .="</td>
                                                                                                                            <td>"; if ($row2[2] == 'active') {
                                                                                                                                $output .="
                                                                                                                                <h5 class='lighter'><a target='_blank' href='./generate-qr-code.php?b_number=". $row1[2]."&unit=". $array[$k] ."' class='btn-default' style='margin-top: 10px; padding: 5px; background-color: #6575e0; border-radius: 5px;'>Generate</a></h5>";
                                                                                                                             } $output .="</td>
                                                                                                                    </tr>";
                                                                                                                         }
                                                                                                                } else {
                                                                                                                    $output .="
                                                                                                                    <tr>
                                                                                                                        <td>". $row2[1] ."</td>
                                                                                                                        <td>
                                                                                                                            <h5 class='lighter' style='background-color: palegreen; padding: 7px; border-radius: 5px; margin-top: 12px;'>". $row2[2] ."</h5>
                                                                                                                        </td>
                                                                                                                        <td>"; if ($row2[3]) {
                                                                                                                            $output .=" <a href='" .  $row2[3] ."' download='". basename($row2[3]) ."'>Download</a>";
                                                                                                                            } else{ $output.= "In Building Invoice"; }
                                                                                                                            $output .="</td>
                                                                                                                            <td>"; if ($row2[2] == 'active') {
                                                                                                                                $output .="
                                                                                                                                <h5 class='lighter'><a target='_blank' href='./generate-qr-code.php?b_number=". $row1[2]."&unit=". $row2[1] ."' class='btn-default' style='margin-top: 10px; padding: 5px; background-color: #6575e0; border-radius: 5px;'>Generate</a></h5>";
                                                                                                                             } $output .="</td>
                                                                                                                    </tr>";
                                                                                                                 }
                                                                                                                
                                                                                                         }
                                                                                                        } 

                                                                                                       $output .=" </tbody>
                                                                                                    </table>

                                                                                            </div>

                                                                                        </div>
                                                                                    </div>

                                                                                </div>






                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>";
                                        
                                            }
                                        } else {
                                            $output .= "<p class='text-center alert alert-danger mt-5'>No Buildings registered!</p>";
                                        }
                                   $output.=" </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>






            </tbody>
        </table>";
    }
}
echo $output;
?>