<?php

require 'functions.php';

$code = $_GET['id'];

$ss = mysqli_query($koneksi, "DELETE FROM item WHERE id=$code");

if ($ss) {
    header("location: item.php");
} else {
    echo "gagal";
}
