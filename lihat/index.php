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
    $data = mysqli_query($koneksi, "SELECT * FROM client");
    ?>

    <div class="container">
        <div class="jumbotron mt-4">
            <h2>Data Invoice</h2>
            <hr>
            <h4>Data Client</h4>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Invoice</th>
                        <th scope="col">Invoice To</th>
                        <th scope="col">Tanggal</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($data as $d) { ?>
                        <tr>
                            <th scope="row"><?php echo $id++ ?></th>
                            <td><?php echo $d['kode_invoice'] ?></td>
                            <td><?php echo $d['invoice_to'] ?></td>
                            <td><?php echo $d['tanggal'] ?></td>
                            <td><a href="details.php?id=<?php echo $d['id'] ?>&code=<?php echo $d['code_client'] ?>">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <a href="../index.php" class="btn btn-primary">Kembali</a>
        </div>
    </div>


</body>

</html>