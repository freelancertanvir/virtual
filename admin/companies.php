<!doctype html>
<html lang="en">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buildings </title>
    <!-- Styles -->
    <link rel='stylesheet' href="css/bootstrap.min.css">
    <link rel='stylesheet' href="css/animate.min.css">
    <link rel='stylesheet' href="css/com_style.css" />
    <link rel='stylesheet' href="css/table.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
</head>

<body>
    <section id="faq" class="section">
        <div class="wrapsection">
            <div id="data" class="container">
                <div class="row">
                    <div class="col-md-12 sol-sm-12">
                        <div class="maintitle">
                            <h3 class="section-title">All Companies and their Buildings</h3>
                        </div>
                        <div>
                            <a href="index.php" class="btn btn-primary">Back to Home</a>
                        </div>
                    </div>
                </div>
                <?php
                include('../dbconfig.php');
                $query = 'SELECT * from company where isConfirmed=1 LIMIT 0,3';
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) == 0) {
                    echo "<p class='text-center alert alert-danger mt-5'>No Companies registered!</p>";
                } else {
                    while ($row = mysqli_fetch_row($result)) {
                ?>
                        <!--Company Table-->
                        <table style="margin-left:auto; margin-right:auto" class="content-table">
                            <!--Company Table header-->
                            <thead>
                                <tr>
                                    <th>Company Name &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                        Company Manager &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                        Remove&emsp;&emsp;&emsp;&emsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--Company Table Rows-->
                                <tr>
                                    <td>
                                        <div class="faq-block wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0s">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" style="border: 1px solid black;">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="<?php $str = str_replace('@', '', $row[3]);
                                                                                                                        $str = str_replace('.', '', $str);
                                                                                                                        echo '#' . $str ?>">
                                                                <div class="company" style="padding-bottom: 10px;">
                                                                    <p id="company_name" style="float: left; width: 40%;"><?php echo $row[0]  ?></p>
                                                                    <p id="company_manager" style="float: left; width: 52%;"><?php echo $row[1]  ?></p>

                                                                </div>

                                                            </a>
                                                            <a style="color:red;" id="company-btn" data-email="<?php echo $row[3] ?>">Remove</a>
                                                        </h4>
                                                    </div>
                                                    <div id="<?php echo $str ?>" class="panel-collapse collapse">
                                                        <?php
                                                        $query1 = "SELECT * from building where company_email='{$row[3]}'";
                                                        $result1 = mysqli_query($conn, $query1) or die('Error');
                                                        if (mysqli_num_rows($result1) > 0) {
                                                            $i = 0;
                                                            while ($row1 = mysqli_fetch_row($result1)) {

                                                                $i++;
                                                        ?>
                                                                <!--Bulding Table-->
                                                                <table class="content-table">
                                                                    <!--Bulding Table header-->
                                                                    <thead>
                                                                        <tr style="background-color: #6575e0;">
                                                                            <th>Sr No.</th>
                                                                            <th>Building Number &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                                Building Name &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                            </th>
                                                                            <th>
                                                                                <a style="cursor: pointer; font-size:17px; color:red;" id="building-btn" data-number="<?php echo $row1[2] ?>">Remove</a>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!--Building Table Rows-->
                                                                        <tr>
                                                                            <td><?php echo $i ?></td>
                                                                            <td>
                                                                                <div class="faq-block wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0s">
                                                                                    <div class="panel-group">
                                                                                        <div class="panel panel-default">
                                                                                            <div class="panel-heading" style="border: 1px solid black;">
                                                                                                <h4 class="panel-title">
                                                                                                    <a data-toggle="collapse" data-parent="#accordion" href="<?php echo '#' . $row1[2] ?>">
                                                                                                        <div class="bulding" style="padding-bottom: 20px;">
                                                                                                            <p id="building_number" style="float: left; width: 43%;"><?php echo $row1[2] ?></p>
                                                                                                            <p id="building_name" style="float: left; width: 32%;"><?php echo $row1[1] ?></p>

                                                                                                        </div>
                                                                                                    </a>



                                                                                                </h4>
                                                                                            </div>
                                                                                            <div id="<?php echo $row1[2] ?>" class="panel-collapse collapse" style="color: black;">

                                                                                                <div class="col-md-6" style="width: 50%; height: 250px; border-right: 2.5px solid black;">
                                                                                                    <div class="row">
                                                                                                        <div class="col" style="width: 100%; height: 250px;">
                                                                                                            <h4 style="text-align: center; padding-top: 15px;">Building</h4>
                                                                                                            <div style="width: 100%; border-top: 1px solid grey; padding-bottom: 10px;"></div>
                                                                                                            <h5 class="lighter"><strong>Address:</strong> <?php echo $row1[3] ?></h5>
                                                                                                            <div style="width: 100%; border-top: 1px solid grey; padding-bottom: 10px;"></div>
                                                                                                            <h5 style="float: left; padding: 7px 0px;">Status:</h5>
                                                                                                            <h5 class="lighter" style="float: left; background-color: palegreen; padding: 7px; border-radius: 5px; margin-left: 5px;"><?php echo $row1[7] ?></h5>
                                                                                                            <br><br>
                                                                                                            <div style="width: 100%; border-top: 1px solid grey; padding-bottom: 10px;"></div>
                                                                                                            <h5 class="lighter"><strong>Invoice:</strong><a href="<?php echo $row1[8] ?>" download="<?php echo basename($row1[8]) ?>" class="btn-default" style="margin-left: 1%; padding: 7px; background-color: #6575e0; border-radius: 5px;">Download</a></h5>
                                                                                                            <div style="width: 100%; border-top: 1px solid grey; padding-bottom: 10px;"></div>
                                                                                                            <h5 class="lighter"><strong>View Data:</strong><?php if($row1[7]=='active'){
                                                                                                                ?> <a class="btn-default" style="margin-left: 1%; padding: 7px; background-color: #6575e0; border-radius: 5px;" target="_blank" href="<?php echo './building-data.php?b_number=' . $row1[2] ?>">View</a>
                                                                                                        <?php    } ?></h5>

                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="col-md-6" style="width: 50%; height: 400px; border-left: 2.5px solid black;">
                                                                                                    <div class="row">
                                                                                                        <div class="col" style="width: 100%; height: 100%; margin-left: 5px;">
                                                                                                            <h4 style="text-align: center; padding-top: 15px;">Tag</h4>
                                                                                                            <div style="width: 100%; border-top: 1px solid grey; padding-bottom: 10px;"></div>
                                                                                                            <div style="height: 350px; overflow: auto;">
                                                                                                                <?php
                                                                                                                $query2 = "SELECT * from qr_codes where building_number='{$row1[2]}'";
                                                                                                                $result2 = mysqli_query($conn, $query2);
                                                                                                                if (mysqli_num_rows($result2) > 0) {

                                                                                                                ?>
                                                                                                                    <table class="content-table">
                                                                                                                        <!--Company Table header-->
                                                                                                                        <thead>
                                                                                                                            <tr style="background-color: #9f6bca;">

                                                                                                                                <th>Unit</th>
                                                                                                                                <th>Status</th>
                                                                                                                                <th>Invoice</th>
                                                                                                                                <th>Label</th>
                                                                                                                            </tr>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                                                                                                                            <?php
                                                                                                                            while ($row2 = mysqli_fetch_row($result2)) {
                                                                                                                                if (strpos($row2[1], ",")) {
                                                                                                                                    $array = explode(",", $row2[1]);
                                                                                                                                    for ($k = 0; $k < sizeof($array); $k++) {


                                                                                                                            ?>
                                                                                                                                        <tr>
                                                                                                                                            <td><?php echo $array[$k] ?></td>
                                                                                                                                            <td>
                                                                                                                                                <h5 class="lighter" style="background-color: palegreen; padding: 7px; border-radius: 5px; margin-top: 12px;"><?php echo $row2[2] ?></h5>
                                                                                                                                            </td>
                                                                                                                                            <td><?php if ($row2[3]) {
                                                                                                                                                ?> <a class="btn btn-outline-success" href="<?php echo $row2[3] ?>" download="<?php echo basename($row2[3]) ?>">Download</a>
                                                                                                                                                <?php
                                                                                                                                                } else echo 'In Building Invoice' ?></td>
                                                                                                                                            <td><?php if ($row2[2] == 'active') {
                                                                                                                                                ?>
                                                                                                                                                    <h5 class="lighter"><a target="_blank" href="./generate-qr-code.php?b_number=<?php echo $row1[2]  ?>&unit=<?php echo $array[$k] ?>" class="btn-default" style="margin-top: 10px; padding: 5px; background-color: #6575e0; border-radius: 5px;">Generate</a></h5>
                                                                                                                                                <?php } ?>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    <?php }
                                                                                                                                } else {
                                                                                                                                    ?>
                                                                                                                                    <tr>
                                                                                                                                        <td><?php echo $row2[1] ?></td>
                                                                                                                                        <td>
                                                                                                                                            <h5 class="lighter" style="background-color: palegreen; padding: 7px; border-radius: 5px; margin-top: 12px;"><?php echo $row2[2] ?></h5>
                                                                                                                                        </td>
                                                                                                                                        <td><?php if ($row2[3]) {
                                                                                                                                            ?> <a href="<?php echo $row2[3] ?>" download="<?php echo basename($row2[3]) ?>">Download</a>
                                                                                                                                            <?php
                                                                                                                                            } else echo 'In Building Invoice' ?></td>
                                                                                                                                        <td><?php if ($row2[2] == 'active') {
                                                                                                                                            ?>
                                                                                                                                                <h5 class="lighter"><a target="_blank" href="./generate-qr-code.php?b_number=<?php echo $row1[2]  ?>&unit=<?php echo $row2[1] ?>" class="btn-default" style="margin-top: 10px; padding: 5px; background-color: #6575e0; border-radius: 5px;">Generate</a></h5>
                                                                                                                                            <?php } ?>
                                                                                                                                        </td>
                                                                                                                                    </tr>
                                                                                                                                <?php }
                                                                                                                                ?>
                                                                                                                        <?php }
                                                                                                                        } ?>
                                                                                                                        </tbody>
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
                                                                </table>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "<p class='text-center alert alert-danger mt-5'>No Buildings registered!</p>";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>






                            </tbody>
                        </table>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <button style="display:block; margin-left:auto; margin-right:auto; margin-bottom:100px" id="load-btn" data-id="3" class="btn btn-primary text-center">Load More</button>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script>
        $(() => {
            $(document).on("click", "#company-btn", function() {
                var r = confirm("Are You Sure You want to delete this Company!");
                if (r == true) {
                    let email = $(this).data('email');
                    let element = this;
                    $.ajax({
                        url: 'remove-company.php',
                        type: 'POST',
                        data: {
                            email
                        },
                        success: function(data) {
                            if (data == 1) {
                                $(element).closest("table").fadeOut();
                            } else {
                                alert("Can't Delete Record.");
                            }
                        }
                    })
                } else {
                    alert("You pressed Cancel!. Company is Not deleted.");
                }
            });


            $(document).on("click", "#building-btn", function() {
                var r = confirm("Are You Sure You want to delete this Building!");
                if (r == true) {
                    let b_number = $(this).data('number');
                    let element = this;
                    $.ajax({
                        url: './remove-building.php',
                        type: 'POST',
                        data: {
                            b_number
                        },
                        success: function(data) {
                            if (data == 1) {
                                $(element).closest("table").fadeOut();
                            } else {
                                alert("Can't Delete Record.");
                            }
                        }
                    })
                } else {
                    alert("You pressed Cancel!. Building is Not deleted.");
                }
            })
            $('#load-btn').click(function() {
                $('#load-btn').append("<span id='span' class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>")
                $('#load-btn').attr('disabled', 'disabled');
                id = $(this).data('id');
                let element = this
                $.ajax({
                    url: 'load-more.php',
                    type: 'POST',
                    data: {
                        id
                    },
                    success: function(data) {
                        if (data == 0) {
                            $('#load-btn').removeAttr('disabled');
                            $('#span').remove();
                            $('#load-btn').prop('disabled', true);
                            $('#load-btn').text('No More Companies');
                        } else {
                            $('#load-btn').removeAttr('disabled');
                            $('#span').remove();
                            $('#data').append(data);
                            id = id + 3;
                            $('#load-btn').data('id', id);
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>