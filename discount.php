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
        <title>INPUT DISCOUNT INVOICE</title>
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
                        <a class="nav-link" href="lihat/index.php">Lihat Data Invoice</a>
                    </li>

                </ul>
            </div>
        </nav>

        <?php
        require 'functions.php';
        if (isset($_POST['print'])) {
            $ss = $_SESSION['code_client'];
            $discount = $_POST['discount'];
            $disnew = str_replace(array('.', ','), '', $discount);
            $totl = mysqli_query($koneksi, "SELECT * FROM total WHERE code_client='$ss'");
            $tt = mysqli_fetch_array($totl);

            $totalall = $tt['total_all'] - $disnew;

            if ($totalall) {
                $sql = mysqli_query($koneksi, "UPDATE total SET discount='$disnew', total_discount='$totalall' WHERE code_client='$ss'");

                if ($sql) {
                    $jj = mysqli_query($koneksi, "SELECT * FROM total WHERE code_client='$ss'");
                    $ts = mysqli_fetch_array($jj);
                    $result = '<div class="alert alert-success">Hasil Total Menjadi : ' . $ts['total_discount'] . '</div>';
                }
            }
        }

        ?>

        <div class="container">
            <div class="jumbotron mt-4">
                <h2>Input Invoice</h2>
                <hr>
                <h4>Discount</h4>
                <?php
                echo $result;
                ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="">Discount</label>
                        <input type="text" name="discount" class="form-control discount">
                    </div>
                    <input type="submit" class="btn btn-success" name="print" value="Discount">
                    <a href="report.php?code=<?php echo $_SESSION['code_client']  ?>">Langsung Print</a>
                </form>

            </div>
        </div>


    </body>
    <script src="css/jquery-3.5.1.min.js"></script>
    <script>
        $('.discount').keyup(function() {
            $(this).val(formatRupiah(this.value));
            var harga = $(this).val();

            harganew = harga.split('.').join("");

        })

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>

    </html>
<?php } ?>