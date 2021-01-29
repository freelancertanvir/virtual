<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    include('../dbconfig.php');
    require('../FPDF/fpdf.php');
    if (isset($_GET['b_number']) && isset($_GET['unit'])) {
        $b_number = mysqli_real_escape_string($conn, $_GET['b_number']);
        $unit = mysqli_real_escape_string($conn, $_GET['unit']);
        
                    $pdf = new FPDF('P', 'mm', 'A4');

                    $pdf->AddPage();

                    //set font to arial, bold, 14pt
                    $pdf->SetFont('Arial', 'B', 14);

                    //Cell(width , height , text , border , end line , [align] )

                    $pdf->Cell(80, 5, 'Building Number: ' . $b_number, 0, 0);
                    $pdf->Cell(59, 5, 'Unit: ' . $unit, 0, 0); //end of line
                    $file_pic = "../Qr-Codes-Pics/" . $b_number . "-" . $unit . ".png";
                    $file_pdf = "../Qr-Codes-Pdfs/" . $b_number . "-" . $unit . ".pdf";
                    if (!file_exists($file_pdf)) {
                        require_once('../phpqrcode/qrlib.php');
                        $id = uniqid();
                        $id = sha1($id);
                        $query = "insert into routes values('{$id}','{$b_number}')";
                        $result = mysqli_query($conn, $query);
                        if ($result) {
                            QRcode::png("http://virtualbuildingmanager.com/contractor/contractor-index.php?b_number=" . $b_number . "&unit=" . $unit . "&id=" . $id, $file_pic);
                            $pdf->Image($file_pic, 70, 30, 50);
                            $pdf->Output($file_pdf, 'F');
                            echo "<h4 class='text-center mt-5 ml-auto mr-auto '>Congratulations! Qr Code Generated</h4>
    <h5 class='text-center mt-3 mb-5 ml-auto mr-auto '>You can download the invoice by clicking the link down below.</h5>
    <div class='row'>
        <div class='col-sm-2 col-3 ml-auto mr-auto mb-5 mt-2'>
            <a class='text-center custom-btns' href='" . $file_pdf . "' download='" . basename($file_pdf) . "'>Download</a>
        </div>
    </div>";
                        } else {
                            echo "<p class='text-center alert alert-danger mt-5'>Error!</p>";
                        }
                    } else {
                        echo "<h4 class='text-center mt-5 ml-auto mr-auto '>Congratulations! Qr Code Generated</h4>
    <h5 class='text-center mt-3 mb-5 ml-auto mr-auto '>You can download the invoice by clicking the link down below.</h5>
    <div class='row'>
        <div class='col-sm-2 col-3 ml-auto mr-auto mb-5 mt-2'>
            <a class='text-center custom-btns' href='" . $file_pdf . "' download='" . basename($file_pdf) . "'>Download</a>
        </div>
    </div>";
                    }
                }else{
                    echo 'Error';
                }
            
    ?>

</body>

</html>