<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
    <style>
    .main-div{
  border: 2px solid #5c34c2;
  width: 100%;
  border-radius: 4px;
  padding: 20px;
  box-sizing: border-box;
}

.main-div h4{
  width: fit-content;
  border-bottom: 0.5px solid #5c34c2 ;
  margin-bottom: 10px;
  letter-spacing: 2px;
}
    </style>
  </head>
  <body>
  <?php include('navbar.php');
  include('../dbconfig.php'); ?>
  <h1 style="color: #5c34c2;" class="text-center mb-2 mt-4">Building</h1>
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="main-div">
                      <?php
                            if(isset($_GET['b_number'])){
                              $b_number=$_GET['b_number'];
                              $query="SELECT * from building where building_number='{$b_number}'";
                              $result=mysqli_query($conn,$query);
                              if(mysqli_num_rows($result) > 0){
                                $row=mysqli_fetch_row($result);
                              
                      ?>
                      <div class="row">
                        
                        <div class="col">
                        <h4><b style="color: #5c34c2;">Building Number:</b><?php echo $row[2] ?></h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                        <h4><b style="color: #5c34c2;">Building Name:</b> <?php echo $row[1] ?></h4>
                        </div>
                        <div class="col">
                        <h4><b style="color: #5c34c2;">Status:</b> <?php echo $row[7] ?></h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                        <h4><b style="color: #5c34c2;">Address:</b> <?php echo $row[3] ?></h4>
                        </div>
                        <div class="col">
                        <h4><b style="color: #5c34c2;">City:</b> <?php echo $row[4] ?></h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                        <h4><b style="color: #5c34c2;">State:</b> <?php echo $row[5] ?></h4>
                        </div>
                        <div class="col">
                        <h4><b style="color: #5c34c2;">Zip Code:</b> <?php echo $row[6] ?></h4>
                        </div>
                      </div>
                        
                      <?php
                      }}
                      ?>
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>

        
  <?php
  
  if(isset($_GET['b_number'])){
  $b_number=$_GET['b_number'];
  $query = "SELECT building.building_name,building_data.contractor_name,building_data.contractor_phone,
  building_data.unit,building_data.data_date,building_data.in_time,building_data.out_time,building_data.contractor_comment,
  building_data.pic_link
  from building inner join building_data
  on building.building_number=building_data.building_number
  where building.building_number='{$b_number}'
  order by building_data.unit";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
  ?>
    <h1 style="color: #5c34c2;" class="text-center mb-4 mt-4">Building Data</h1>
    <div class="container">
      <div class="row">
        <div class="col-12 m-auto custom">
          <table style="width: 100%;">
            <thead>
              <tr>
                <th>Building</th>
                <th>Contractor</th>
                <th>Phone</th>
                <th>Unit</th>
                <th>Date</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>Comment</th>
                <th>Photo</th>
              </tr>
            </thead>
            <tbody>
            <?php
      while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
            ?>
              <tr>
                <td><?php echo $row[0]  ?></td>
                <td><?php echo $row[1]  ?></td>
                <td><?php echo $row[2]  ?></td>
                <td><?php echo $row[3]  ?></td>
                <td><?php echo $row[4]  ?></td>
                <td><?php echo $row[5]  ?></td>
                <td><?php echo $row[6]  ?></td>
                <td><?php echo $row[7]  ?></td>
                <td class="d-flex">
                  <a class="mr-2 btn btn-outline-info" target="_blank" href="<?php echo $row[8] ?>">View</a>
                  <a class="btn btn-outline-success" href="<?php echo $row[8] ?>" download="<?php echo basename($row[8]) ?>">Download</a>
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
  }else {
    echo "<p class='text-center alert alert-danger mt-5'>No Records</p>";
  }
}
  ?>

    </body>
    </html>