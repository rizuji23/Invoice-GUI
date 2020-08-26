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
        <title>EDIT INVOICE ITEM</title>
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
                        <a class="nav-link" href="#">Lihat Data Invoice</a>
                    </li>

                </ul>
            </div>
        </nav>

        <?php

        require 'functions.php';
        $id = $_GET['id'];
        $k = mysqli_query($koneksi, "SELECT * FROM item WHERE id=$id");
        $kl = mysqli_fetch_array($k);

        if (isset($_POST['edits'])) {
            edititem($_POST);
        }

        ?>


        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-sm">
                    <div class="jumbotron">
                        <h2>Edit Invoice Item</h2>
                        <hr>
                        <h4>Item</h4>
                        <form action="" method="POST" class="formitem">
                            <input type="hidden" name="codes" value="<?php echo $_SESSION['code_client'] ?>">
                            <div class="field_wrapper">
                                <div class="card mt-5 hitungs">
                                    <div class="card-body">
                                        <div>

                                            <div class="form-group">
                                                <label for="">Item Deskripsi</label>
                                                <input type="text" name="item_desk" class="form-control item_desk" value="<?php echo $kl['item_desk'] ?>" /><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Revisi</label>
                                                <input type="text" name="rev" class="form-control rev" value="<?php echo $kl['rev'] ?>" /><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Harga</label>
                                                <input type="text" name="harga" class="form-control harga" value="<?php echo $kl['price'] ?>" /><br>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Total</label>
                                                <input type="text" name="total" class="form-control total" readonly value="" /><br>
                                            </div>
                                            <input type="submit" class="float-right add_button btn btn-success" name="edits" value="Edit Item">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>




                </div>




            </div>

            <script src="css/jquery-3.5.1.min.js"></script>


            <script>
                // $('.itemlist').load('loaditem.php');
                // $('.add_button').click(function() {

                //     var data = $('.formitem').serialize();
                //     $.ajax({
                //         type: 'POST',
                //         url: 'uploaditem.php',
                //         data: data,
                //         success: function() {
                //             $('.itemlist').load('loaditem.php');
                //             $('.rev').val("");
                //             $('.harga').val("");
                //             $('.item_desk').val("");
                //             $('.total').val("");
                //         }
                //     })
                // });

                $('.harga').keyup(function() {
                    var harga = $(this).val();
                    var rev = $('.rev').val();
                    var revtotal = parseInt(rev) * 150000;
                    var total = revtotal + parseInt(harga);
                    $('.total').val(total);
                })
            </script>




            <!-- <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="card mt-5 hitungs"><div class="card-body"><div><div class="form-group"><label for="">Item Deskripsi</label><input type="text" name="item_desk" class="form-control" value=""/><br></div><div class="form-group"><label for="">Harga</label><input type="text" name="harga" class="form-control harga" value=""/><br></div><div class="form-group"><label for="">Revisi</label><input type="text" name="rev" class="form-control rev" value=""/><br></div><div class="form-group"><label for="">Total</label><input type="text" id="total" name="total" class="form-control total" value=""/><br></div><a href="javascript:void(0);" class="float-right remove_button btn btn-danger" title="Add field">-</a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                var s = x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
                
               
                
            }

            
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
            console.log(x);
        });
    });
</script> -->
            <!-- 
<script>
   $(document).ready(function(){
        $(document).on("keyup", ".harga", function() {
            var harga;
            $('.harga').each(function(){
                harga = $(this).val()
            })

            var rev;

            $('.rev').each(function(){
                if ($(this).val() == null){
                    rev = 0;
                } else {
                rev = $(this).val()
            }
            })
            var revharga; 
            var revtotal;
            var total1;
            
            $('.total').each(function(){
                revharga = 150000;
                revtotal = parseInt(rev) * revharga;
                total1 = revtotal + parseInt(harga);
                $(this).val(total1)
            })

            console.log(total1)
        })

    })

        
   


</script> -->
    </body>

    </html>
<?php } ?>