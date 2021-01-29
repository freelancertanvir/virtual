<?php
 session_start();
 if(!isset($_SESSION['admin_email'])){
     header('Location: ./login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
  </head>
  <body>
  <?php include('navbar.php') ?>
  <h1 class="text-center text-color mt-4">Building Requests</h1>
  <?php
  include('../dbconfig.php');
  $query="select company.company_name,building.building_number,building.building_name
  from company inner join building
  on company.company_email=building.company_email
  where building.building_status !='active'
  order by company.company_name";
  $result=mysqli_query($conn,$query);
  if(mysqli_num_rows($result) > 0 ){
    ?>
      
    <div class="container">
        <div class="row">
            <div class="col-11 m-auto custom">
                <table style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Count</th>
                        <th>Company</th>
                        <th>Building Number</th>
                        <th>Building Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
      while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
        $i++;
            ?>
                      <tr>
                        <td><?php echo $i ?></td>
                      <td><?php echo $row[0] ?></td>
                  <td><?php echo $row[1] ?></td>
                  <td><?php echo $row[2] ?></td>
                      
                        <td>
                            <a id="b-accept-btn" data-b_number="<?php echo $row[1] ?>" class="mr-2 mb-lg-0 mb-2 btn btn-outline-success" >Activate</a>
                            <a id="b-remove-btn" data-b_number="<?php echo $row[1] ?>" class="mr-2 mb-lg-0 mb-2 btn btn-outline-danger" >Remove</a>
                           
                        </td>
                      </tr>
                      <?php    
      } ?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <?php
  }else{
    echo "<p class='text-center alert alert-danger mt-5'>No Records</p>";
  }
  ?>
<h1 class="text-center text-color mt-4 mb-4">Tags Requests</h1>
<?php
  $query="select company.company_name,building.building_name,qr_codes.qr_type,building.building_number
  from company inner join building
  on company.company_email=building.company_email
  inner join qr_codes
   on qr_codes.building_number=building.building_number
   where qr_codes.qr_mode=1 and qr_codes.qr_status != 'active'
  order by company.company_name,building.building_name";
  $result=mysqli_query($conn,$query);
  if(mysqli_num_rows($result) > 0 ){
    ?>
      
    <div class="container">
        <div class="row">
            <div class="col-11 m-auto custom">
                <table style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Count</th>
                        <th>Company</th>
                        <th>Building Number</th>
                        <th>Building Name</th>
                        <th>Unit</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $j=0;
      while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
        $j++;
            ?>
                      <tr>
                        <td><?php echo $j ?></td>
                      <td><?php echo $row[0] ?></td>
                  <td><?php echo $row[3] ?></td>
                  <td><?php echo $row[1] ?></td>
                  <td><?php echo $row[2] ?></td>
                        
                        <td>
                            <a id="t-accept-btn" class="mr-2 mb-lg-0 mb-2 btn btn-outline-success" data-b_number="<?php echo $row[3] ?>" data-type="<?php echo $row[2] ?>">Activate</a>
                            <a id="t-remove-btn" class="mr-2 mb-lg-0 mb-2 btn btn-outline-danger" data-b_number="<?php echo $row[3] ?>" data-type="<?php echo $row[2] ?>">Remove</a>
                          
                        </td>
                      </tr>
                      <?php    
      } ?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <?php
  }else{
    echo "<p class='text-center alert alert-danger mt-5'>No Records</p>";
  }
  ?>

  <script src="../js/jquery.min.js"></script>
  <script>

    $(()=>{
      $(document).on("click", "#b-remove-btn", function() {
                var r = confirm("Are You Sure You want to Remove this Building!");
                if (r == true) {
                    let b_number = $(this).data('b_number');
                    let element = this;
                    $.ajax({
                        url: './remove-building.php',
                        type: 'POST',
                        data: {
                            b_number
                        },
                        success: function(data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                                alert('Building Removed');
                            } else {
                                alert("Can't Remove Record.");
                            }
                        }
                    })
                } else {
                    alert("You pressed Cancel!. Building is Not Removed.");
                }
            });
            $(document).on("click", "#b-accept-btn", function() {
                var r = confirm("Are You Sure You want to Activate this Building!");
                if (r == true) {
                    let b_number = $(this).data('b_number');
                    let element = this;
                    $.ajax({
                        url: './accept-building.php',
                        type: 'POST',
                        data: {
                            b_number
                        },
                        success: function(data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                                alert('Building Activated!');
                            } else {
                                alert("Can't Activate Record.");
                            }
                        }
                    })
                } else {
                    alert("You pressed Cancel!. Building is Not Activated.");
                }
            });

            $(document).on("click", "#t-remove-btn", function() {
                var r = confirm("Are You Sure You want to Remove this Tag!");
                if (r == true) {
                    let b_number = $(this).data('b_number');
                    let type = $(this).data('type');
                    let element = this;
                    $.ajax({
                        url: './remove-tag.php',
                        type: 'POST',
                        data: {
                            b_number,
                            type
                        },
                        success: function(data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                                alert('Tag Removed');
                            } else {
                                alert("Can't Remove Record.");
                            }
                        }
                    })
                } else {
                    alert("You pressed Cancel!. Tag is Not Removed.");
                }
            });
            $(document).on("click", "#t-accept-btn", function() {
                var r = confirm("Are You Sure You want to Activate this Tag!");
                if (r == true) {
                    let b_number = $(this).data('b_number');
                    let type = $(this).data('type');
                    let element = this;
                    $.ajax({
                        url: './accept-tag.php',
                        type: 'POST',
                        data: {
                            b_number,
                            type
                        },
                        success: function(data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                                alert('Tag Activated!');
                            } else {
                                alert("Can't Activate Record.");
                            }
                        }
                    })
                } else {
                    alert("You pressed Cancel!. Tag is Not Activated.");
                }
            });
    })
  </script>

  </body>
</html>