<?php
error_reporting(0);
session_start();
$koneksi = mysqli_connect("localhost", "uji", "uji123", "invoice_lesmana");


function client($data)
{
    global $koneksi;
    $invoice_to = htmlspecialchars($data['invoice_to']);
    $tanggal = date("j F Y");
    $code_client = uniqid();

    $query = mysqli_query($koneksi, "SELECT max(kode_invoice) as kodebig FROM client");
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodebig'];

    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeBarang, 3, 3);

    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;

    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "#";
    $kodeBarang = $huruf . sprintf("%04s", $urutan);

    $mm = mysqli_query($koneksi, "INSERT INTO client VALUES(NULL, '$kodeBarang', '$invoice_to', '$code_client', '$tanggal')");

    if ($mm) {
        $_SESSION['code_client'] = $code_client;
        header("location: item.php");
    } else {
        echo "GAGAL";
    }
}

function edititem($data)
{
    global $koneksi;
    $item_desk2 = $data['item_desk'];
    $harga = $data['harga'];
    $rev = $data['rev'];
    $total = $data['total'];
    $codes = $data['codes'];

    $sql = mysqli_query($koneksi, "UPDATE item SET item_desk='$item_desk2', price='$harga', rev='$rev', total='$total'");

    if ($sql) {
        header("location: item.php");
    } else {
        echo "GAGAL";
    }
}

function item($data)
{
    global $koneksi;
    $item_desk = $data['item_desk'];
    $juml = count($item_desk);
    $codes = $data['codes'];
    echo $juml;
    for ($i = 0; $i < $juml; $i++) {
        $item_desk2 = $data['item_desk'][$i];
        $harga = $data['harga'][$i];
        $rev = $data['rev'][$i];
        $total = $data['total'][$i];


        $sql = mysqli_query($koneksi, "INSERT INTO item VALUES(NULL, '$item_desk2', '$harga', '$rev', '$total', '$codes')") or die(mysqli_error($koneksi));
    }

    if ($sql) {
        $kk = mysqli_query($koneksi, "SELECT sum(price) FROM item WHERE code_client='$codes'");
        $ss = mysqli_fetch_array($kk);




        $total = mysqli_query($koneksi, "INSERT INTO total VALUES(NULL, '$codes', '', '$ss[0]')") or die(mysqli_error($koneksi));

        if ($total) {
            header("location: discount.php");
        } else {
            echo "GAGALs";
        }
    } else {
        echo "GAGAL";
    }
}
