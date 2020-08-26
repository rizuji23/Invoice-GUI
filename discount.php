<?php

session_start();

if (empty($_SESSION['code_client'])) {
    header("location: index.php");
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>INPUT INVOICE</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>

    <body style="background-color: white !important;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">INVOICE LESMANA DESIGN</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Tambah Invoice <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lihat Data Invoice</a>
                    </li>

                </ul>
            </div>
        </nav>

        <?php
        require 'functions.php';
        if (isset($_POST['print'])) {
            $ss = $_SESSION['code_client'];
            $discount = $_POST['discount'];
            $totl = mysqli_query($koneksi, "SELECT * FROM total WHERE code_client='$ss'");
            $tt = mysqli_fetch_array($totl);

            $totalall = $tt['total_all'] - $discount;

            if ($totalall) {
                $sql = mysqli_query($koneksi, "UPDATE total SET discount='$discount', total_discount='$totalall' WHERE code_client='$ss'");

                if ($sql) {
                    $jj = mysqli_query($koneksi, "SELECT * FROM total WHERE code_client='$ss'");
                    $ts = mysqli_fetch_array($jj);
                    $result = '<div class="alert alert-success">Hasil Total Menjadi : ' . $ts['total_discount'] . '</div>';
                }
            }
        }

        ?>

        <div class="container">
            <div class="jumbotron">
                <h2>Input Invoice</h2>
                <hr>
                <h4>Discount</h4>
                <?php
                echo $result;
                ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="">Discount</label>
                        <input type="text" name="discount" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-success" name="print" value="Discount">
                    <a href="report.php?code=<?php echo $_SESSION['code_client']  ?>">Langsung Print</a>
                </form>

            </div>
        </div>


    </body>

    </html>
<?php } ?>