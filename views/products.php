<?php
require '../controllers/productController.php';
session_start();

// return array of all rows, or false (if it failed)
$products = select_all_products_controller();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Display Products</title>
    
</head>
<body> 
    <div class="container">
        <a href="../index.php" class="btn btn-danger" style="margin: 20px 0 0 0;">Home</a>
        <a href="../views/cart.php" class="btn btn-dark" style="margin: 20px 0 0 0; float:right;">View Cart</a>
        <h1 style="text-align:center;">Product List</h1>
        <form method="POST" action="searchProduct.php">
            <input class="form-control" type="text" placeholder="Search" name="keyword">
            <button type="submit" class='btn btn-success' name='searchButton' style='margin-top:10px;'>Go</button>
        </form>
        <div class="row">
        <?php foreach ($products as $x) {
            echo "<div class='col-sm-3'>
                    <a href='singleProduct.php?id={$x['product_id']}' name='id' style='text-decoration:none;'>
                    <div class='card shadow-sm bg-white rounded' style='margin-top:20px; '>
                        <div class='card-body' style='text-align: center;'>
                            <img src=' {$x['product_image']}' width='100%'>
                            <h5 style='padding-top:15px;'> {$x['product_title']}</h5>
                            <h6 style='color: green;'> GH₵{$x['product_price']}</h6>
                            <p style='margin-bottom: 0;'> {$x['product_desc']}</p>
                        </div>
                        <a href='../actions/cartAction.php?id={$x['product_id']}' class='btn btn-success' name='addToCartButton'> Add to Cart</a> 
                    </div>
                    </a>
                </div>";
        } ?>
        </div>
    </div>
</body>
<?php
if (isset($_SESSION['error_message'])) {
    $message = $_SESSION['error_message'];
    echo "<script type='text/javascript'> alert('" . $message . "'); </script>";
    unset($_SESSION['error_message']);
}

if (isset($_SESSION['success_message'])) {
    $message = $_SESSION['success_message'];
    echo "<script type='text/javascript'> alert('" . $message . "'); </script>";
    unset($_SESSION['success_message']);
}
?>
</html>