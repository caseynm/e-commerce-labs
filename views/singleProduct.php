<?php
session_start();
require('../controllers/productController.php');
// return array of all rows, or false (if it failed)
$product = select_one_product_controller($_GET['id']);
$category = select_one_category_controller($product['product_cat']);
$brand = select_one_brand_controller($product['product_brand']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Product Details</title>
</head>
<body>
    <div class="container">
        <a href="../index.php" class="btn btn-danger" style="margin: 30px 0 0 0;">Home</a>
        <a href="../views/cart.php" class="btn btn-dark" style="margin: 20px 0 0 0; float:right;">View Cart</a>
        <h1 style="text-align:center;">Product Details</h1>
        <div class="row mx-auto mb-3" style="margin-top:30px;">
            <div class="col-7">
                <img  src="<?php echo $product['product_image']?>" alt="Generic placeholder image" width="100%"> 
            </div>
            <div class="col-4 bg-light" >
                <?php
                echo
                "<h2 style='color: black; margin-top: 10px;'> {$product['product_title']} </h2>
                <br>
                <h3 style='color: green;'> GH₵{$product['product_price']}</h3>
                <br>
                <p;'><strong> Product Description:</strong> {$product['product_desc']}</p>
                <br>
                <p'><strong> Brand:</strong> {$brand['brand_name']}</p>
                <br>
                <p><strong> Category:</strong> {$category['cat_name']}</p>
                <br>
                <p><strong> Keywords:</strong> {$product['product_keywords']}</p>
                <br>
                <strong><label for='Quantity'> Quantity </label></strong>
                <input class='mb-5' type='number' value='1'>
                <br>
                <a href='../actions/cartAction.php?id={$product['product_id']}' class='btn btn-lg btn-success mr-2' name='addToCartButton'> Add to Cart</a>
                <a href='#' class='btn btn-warning btn-lg' name='addToCart'><strong>Buy Now</strong></a>";
                ?>      
            </div>
        </div>
    </div>
</body>
<?php
    if(isset($_SESSION["error_message"])){
        $message = $_SESSION["error_message"];
        echo "<script type='text/javascript'> alert('".$message."'); </script>";
        unset($_SESSION["error_message"]);  
    } 
    
    if(isset($_SESSION["success_message"])){
        $message = $_SESSION["success_message"];
        echo "<script type='text/javascript'> alert('".$message."'); </script>";
        unset($_SESSION["success_message"]);
    }  
?>
</html>