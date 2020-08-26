<?php 

    session_start();

    if (empty($_SESSION['code_client'])){
        header("location: index.php");
    } else {

?>
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
            <a class="nav-link" href="#">Lihat Data Invoice</a>
        </li>
        
        </ul>
    </div>
    </nav>

    <?php 
        require 'functions.php';
        if(isset($_POST['simpanitem'])){
            item($_POST);
        }
        
    ?>

    <div class="container">
        <div class="jumbotron">
            <h2>Input Invoice</h2>
            <hr>
            <h4>Item</h4>
            <form action="" method="POST">
            <input type="hidden" name="codes" value="<?php echo $_SESSION['code_client'] ?>">
            <div class="field_wrapper">
                <div class="card mt-5">
                    <div class="card-body">
                    <div>
                       
                    <div class="form-group">
                    <label for="">Item Deskripsi</label>
                    <input type="text" name="item_desk[]" class="form-control" value=""/><br>
                    </div>
                    <div class="form-group">
                    <label for="">Harga</label>
                    <input type="text" name="harga[]" class="form-control harga" value=""/><br>
                    </div>
                    <div class="form-group">
                    <label for="">Revisi</label>
                    <input type="text" name="rev[]" class="form-control rev" value=""/><br>
                    </div>
                    <div class="form-group">
                    <label for="">Total</label>
                    <input type="text" name="total[]" class="form-control total" value=""/><br>
                    </div>
                    <a href="javascript:void(0);" class="float-right add_button btn btn-success" title="Add field">+</a>
                    
                </div>
                </div>
                </div>
                
            </div>
                
            <div class="form-group mt-4">
                <input type="submit" name="simpanitem" class="btn btn-block btn-primary" value="Simpan">
            </div>

            </form>
                
        </div>
    </div>

    <script src="css/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="card mt-5"><div class="card-body"><div><div class="form-group"><label for="">Item Deskripsi</label><input type="text" name="item_desk[]" class="form-control" value=""/><br></div><div class="form-group"><label for="">Harga</label><input type="text" name="harga[]" class="form-control harga" value=""/><br></div><div class="form-group"><label for="">Revisi</label><input type="text" name="rev[]" class="form-control rev" value=""/><br></div><div class="form-group"><label for="">Total</label><input type="text" id="total" name="total[]" class="form-control total" value=""/><br></div><a href="javascript:void(0);" class="float-right remove_button btn btn-danger" title="Add field">-</a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
                console.log(x-1);
            }

            $('.total').addClass("dawdaw" + x);
            $('.total').removeClass("dawdawd" + x-1)
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
            console.log(x);
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(document).on("keyup", function() {
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
            var revharga = 150000;
            var revtotal = parseInt(rev) * revharga;
            var total1;

            $('.total').each(function(){
                total1 = revtotal + parseInt(harga);
                $(this).val(total1)
            })
        })
    })
</script>
</body>
</html>
<?php } ?>