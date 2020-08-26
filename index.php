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
                    <a class="nav-link" href="lihat/index.php">Lihat Data Invoice</a>
                </li>

            </ul>
        </div>
    </nav>

    <?php
    require 'functions.php';
    if (isset($_POST['tambah_client'])) {
        client($_POST);
    }

    ?>

    <div class="container">
        <div class="jumbotron mt-4">
            <h2>Input Invoice</h2>
            <hr>
            <h4>Client</h4>
            <form method="POST">
                <div class="form-group">
                    <label for="">Invoice To</label>
                    <input type="text" name="invoice_to" class="form-control">
                </div>
                <input type="submit" class="btn btn-success" name="tambah_client" value="Tambah Client">
            </form>

        </div>
    </div>


</body>

</html>