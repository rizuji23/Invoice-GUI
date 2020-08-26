<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA INVOICE</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body style="background-color: white !important;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">INVOICE LESMANA DESIGN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="../index.php">Tambah Invoice <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Lihat Data Invoice</a>
                </li>

            </ul>
        </div>
    </nav>

    <?php
    require '../functions.php';
    $code = $_GET['code'];
    $id = $_GET['id'];
    $client = mysqli_query($koneksi, "SELECT * FROM client WHERE id=id");
    $c = mysqli_fetch_array($client);
    $data = mysqli_query($koneksi, "SELECT * FROM item WHERE code_client='$code'");
    $totals = mysqli_query($koneksi, "SELECT * FROM total WHERE code_client='$code'");
    $t = mysqli_fetch_array($totals);
    ?>

    <div class="container">
        <div class="jumbotron mt-4">
            <h2>Data Invoice</h2>
            <hr>
            <h4>Data Detail Client</h4>

            <hr>
            <div class="bold">
                <p>Kode Invoice : <?php echo $c['kode_invoice'] ?></p>
                <p>Invoice To : <?php echo $c['invoice_to'] ?></p>
                <p>Tanggal : <?php echo $c['tanggal'] ?></p>
            </div>

            <p>Detail Pesanan</p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Item Deskripsi</th>
                        <th scope="col">Price</th>
                        <th scope="col">Revisi</th>
                        <th>Total</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($data as $d) { ?>
                        <tr>
                            <th scope="row"><?php echo $id++ ?></th>
                            <td><?php echo $d['item_desk'] ?></td>
                            <td><?php echo $d['price'] ?></td>
                            <td><?php echo $d['rev'] ?></td>
                            <td><?php echo $d['total'] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="bold text-right">
                <p>Total Semua : <?php echo $t['total_all'] ?></p>
                <p>Discount : <?php echo $t['discount'] ?></p>
                <?php if (empty($t['discount'])) { ?>
                    <p>Result Total : <?php echo $t['total_all'] ?></p>
                <?php } else { ?>
                    <p>Result Total : <?php echo $t['total_discount'] ?></p>
                <?php } ?>
            </div>

            <a href="index.php" class="btn btn-primary">Kembali</a>

        </div>
    </div>


</body>

</html>