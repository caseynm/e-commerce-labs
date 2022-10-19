<?php
require('../controllers/productController.php');
session_start();
// return array of all rows, or false (if it failed)
$products = select_all_products_controller();
$product = select_one_product_controller($_GET['id']);
$categories = select_all_categories_controller();
$category = select_one_category_controller($product['product_cat']);
$brands = select_all_brands_controller();
$brand = select_one_brand_controller($product['product_brand']);

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Products</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <a href="../index.php" class="btn btn-danger" style="margin: 30px 0 0 30px;">Home</a>
    <h1 style='text-align:center;'>Product List</h1>
	<div class="container">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image Name</th>
                    <th>Keywords</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach($products as $x){
                    echo 
                    "<tr>
                        <td>{$x['product_cat']}</td>
                        <td>{$x['product_brand']}</td>
                        <td>{$x['product_title']}</td>
                        <td>{$x['product_price']}</td>
                        <td>{$x['product_desc']}</td>
                        <td>{$x['product_image']}</td>
                        <td>{$x['product_keywords']}</td>
                        <td><a href='updateProduct.php?id={$x['product_id']}'>Edit</a></td>
                    </tr>";
                }

                ?>

            </tbody>
        </table>

        <br>
        <h3>Product Update Form</h3>

		<form method="post" enctype="multipart/form-data" action="../actions/productAction.php">
            <div class="form-group">
                <label for="Title">Product Title</label>
				<input class="form-control" type="text" placeholder="Product Title" name="title" value= "<?php echo $product['product_title']?>">
            </div>

            <div class="form-row">
                <!-- Getting all available product categories-->
                <div class="form-group" style="margin: 0 20px 0 0;">
                    <label for="category"> Category </label>
                    <select class="form-control" aria-label="default select example" name = "category" required="required" >
						<option value= "<?php echo $category['cat_id']?>"> <?php echo $category['cat_name']?> </option>
						<?php
							foreach($categories as $x){
                                if($category['cat_id'] != $x['cat_id']){
						?>
						<option value = "<?php echo $x['cat_id'];?>"> <?php echo $x['cat_name']; }}?></option>
                    </select>
                </div>

                <!-- Getting all available product brands-->
                <div class="form-group">
                    <label for="brand"> Brand</label>
                    <select class="form-control" name="brand" required = "required" >
						<option value= "<?php echo $brand['brand_id']?>"> <?php echo $brand['brand_name']?> </option>
						<?php
							foreach($brands as $y){
                                if($brand['brand_id'] != $y['brand_id']){
						?>
						<option value = "<?php echo $y['brand_id'];?>"> <?php echo $y['brand_name']; }}?></option>
                    </select>
                </div>
            </div>

			<div class="form-group">
                <label for="price">Price</label>
				<input class="form-control" type="decimal" placeholder="Product Price" name="price" value= "<?php echo $product['product_price']?>">
			</div>

			<div class="form-group">
                <label for="description"> Description</label>
				<textarea class="form-control" placeholder="description" name="description"><?php echo $product['product_desc']?></textarea>
			</div>

            <div class="form-group">
                <label for="keyword"> Keywords </label>
				<input class="form-control" placeholder="Enter product Keywords" name="keyword" value= "<?php echo $product['product_keywords']?>">
			</div>

            <!--<div class="form-group">
                <label for="image"></label>
				<input type="file" name="image" accept="image/*" value="<?php //echo $product['product_image']?>">

                <p><label for="selection">Current Image</label>
                <img src="<?php //echo $product['product_image']?>" width="150px" height="150px"></p>
			</div>-->

            <input type="hidden" name="product_id" value="<?php echo $product['product_id']?>">
        
			<button type="submit" class="btn btn-primary" name="updateProductButton"> Submit </button>
		</form>
	</div>
	
</body>

<?php
    if(isset($_SESSION["error_message"])){
        $message = $_SESSION["error_message"];
        echo "<script>
            swal('Error!', '".$message."', 'error');
            </script>";
        unset($_SESSION["error_message"]);  
    } 
    
    if(isset($_SESSION["success_message"])){
        $message = $_SESSION["success_message"];
        echo "<script>
            swal('Done!', '".$message."', 'success');
            </script>";
        unset($_SESSION["success_message"]);
      }  
  
?>
</html>