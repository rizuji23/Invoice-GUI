<?php

require 'functions.php';
$item_desk = $_POST['item_desk'];
$harga = $_POST['harga'];
$revisi = $_POST['rev'];
$total = $_POST['total'];
$codes = $_POST['codes'];
$harganew = str_replace(array('.', ','), '', $harga);

mysqli_query($koneksi, "INSERT INTO item VALUES(NULL, '$item_desk', '$harga', '$revisi', '$total', '$codes')");
