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
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>

    <body bgcolor="">

        <?php

        require 'functions.php';
        $code = $_GET['code'];
        $client = mysqli_query($koneksi, "SELECT * FROM client WHERE code_client='$code'");
        $c = mysqli_fetch_array($client);
        $item = mysqli_query($koneksi, "SELECT * FROM item WHERE code_client='$code'");

        $total = mysqli_query($koneksi, "SELECT * FROM total WHERE code_client='$code'");
        $to = mysqli_fetch_array($total);

        ?>

        <div class="black">
            <div class="img">
                <img class="imglogo" src="img/PlaceYourLogoHereDou.png" alt="">
                <h1 class="h1in" style="float: right;">INVOICE</h1>
            </div>
        </div>

        <div class="hehhe">
            <div class="iimg">
                <img src="img/dsa.png" class="img-fluid " alt="">
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="cont">
                        <div class="row mt-4">
                            <div class="col ss ">
                                <p>Invoice: <?php echo $c['kode_invoice']  ?></p>
                                <p>Date: <?php echo $c['tanggal'] ?></p>

                            </div>

                            <div class="col ss text-right">
                                <div class="float-right">
                                    <p>Invoice To :</p>
                                    <p><?php echo $c['invoice_to'] ?></p>
                                </div>
                            </div>
                        </div>

                        <hr class="hrs">
                        <div class="ss">
                            <p>Email: lesmanadesign21@gmail.com</p>
                            <p>Whatsapp: 089 6372 79115</p>
                        </div>

                        <div class="ttb">
                            <div class="row">
                                <div class="col-2 tts">
                                    <p>SL.</p>

                                    <ol class="ols">
                                        <?php
                                        $id = 1;
                                        foreach ($item as $is) { ?>

                                            <li><?php echo $id++ ?></li>

                                        <?php } ?>
                                    </ol>
                                </div>
                                <div class="col tts">
                                    <p>ITEM DESCRIPTION</p>
                                    <ol class="ols">
                                        <?php
                                        $id = 1;
                                        foreach ($item as $is) { ?>

                                            <li><?php echo $is['item_desk'] ?></li>

                                        <?php } ?>
                                    </ol>
                                </div>
                                <div class="col tts">
                                    <p>PRICE</p>
                                    <ol class="ols">
                                        <?php
                                        $id = 1;
                                        foreach ($item as $is) { ?>

                                            <li>IDR <?php echo $is['price'] ?></li>

                                        <?php } ?>
                                    </ol>
                                </div>
                                <div class="col-1 tts">
                                    <p>REV.</p>
                                    <ol class="ols">
                                        <?php
                                        $id = 1;
                                        foreach ($item as $is) { ?>

                                            <li><?php echo $is['rev'] ?></li>

                                        <?php } ?>
                                    </ol>
                                </div>
                                <div class="col tts2">
                                    <p>TOTAL</p>
                                    <ol class="ols">
                                        <?php
                                        $id = 1;
                                        foreach ($item as $is) { ?>

                                            <li>IDR <?php echo $is['total'] ?></li>

                                        <?php } ?>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="pyt">
                            <div class="row">
                                <div class="col">
                                    <div class="payment">
                                        <p>Payment Info:</p>
                                        <p>Account 4460482114</p>
                                        <p>A/C Name REKA SETIA LESMANA</p>
                                        <p>Bank Details: BCA (Bank Central Asia)</p>
                                        <div class="mt-4">
                                            <p>*Minimal Revisi 1 Kali</p>
                                            <p>*Lebih dari 1 kali Revisi</p>
                                            <p>Dikenai biaya tambahan sebesar Rp 150.000</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 gg">
                                    <div class="total">
                                        <span>SUBTOTAL: </span><span>IDR <?php echo $to['total_all'] ?></span>
                                        <br>

                                        <span>DISCOUNT: </span><span>IDR <?php echo $to['discount'] ?></span>

                                        <hr class="hrs">
                                        <?php if (empty($to['discount'])) { ?>
                                            <span>TOTAL </span><span>IDR <?php echo $to['total_all'] ?></span>
                                        <?php } else { ?>
                                            <span>TOTAL </span><span>IDR <?php echo $to['total_discount'] ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <img src="img/dd.png" width="250" alt="">
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <script>
            window.print()
            window.onafterprint = function() {
                document.location.href = 'sessiondes.php';
            }
        </script>
    </body>

    </html>
<?php } ?>