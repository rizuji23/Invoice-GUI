<?php
require 'functions.php';
$codes = $_GET['data'];

$kks = mysqli_query($koneksi, "SELECT sum(total) as total FROM item WHERE code_client='$codes'");
$sss = mysqli_fetch_array($kks);
$h =  $sss['total'];
$total = mysqli_query($koneksi, "INSERT INTO total VALUES(NULL, '$codes', '', '', '$h')");

if ($total) {
    echo "Berhasil";
} else {
    echo "GAGALs";
}
