<?php
session_start();

require 'functions.php';
$code = $_SESSION['code_client'];
$items = mysqli_query($koneksi, "SELECT * FROM item WHERE code_client='$code'");
?>
<?php
$id = 1;
foreach ($items as $i) { ?>
    <div class="card">
        <div class="card-body">
            ITEM <?php echo $id++; ?>
            <hr>
            <ul class="pl-3">
                <li>Item Deskripsi : <?php echo $i['item_desk'] ?></li>
                <li>Revisi : <?php echo $i['rev'] ?></li>
                <li>Harga : <?php echo $i['price'] ?></li>
                <li>Total : <?php echo $i['total'] ?></li>
            </ul>
            <a href="hapus.php?id=<?php echo $i['id'] ?>">Hapus Item</a>
            <a href="edit.php?id=<?php echo $i['id'] ?>">Edit Item</a>
        </div>
    </div>

<?php } ?>