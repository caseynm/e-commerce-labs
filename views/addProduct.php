<?php
require('../controllers/productController.php');
session_start();
// return array of all rows, or false (if it failed)
$brands = select_all_brands_controller();
$categories = select_all_categories_controller();
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
	<h1 style='text-align:center;'>Add Products</h1>

	<div class="container">
		<form method="post" enctype="multipart/form-data" action="../actions/productAction.php" >

            <div class="form-group">
				<input class="form-control" type="text" placeholder="Product Title" name="title" >
			</div>
		
            <div class="form-row" style="padding-left:5px;">
                <!-- Getting all available product categories-->
                <div class="form-group" style="margin: 0 20px 0 0;">
                    <select class="form-control" aria-label="default select example" name = "category" required="required" >
						<option value = "" default> -- Select Product Category --</option>
						<?php
							foreach($categories as $x){
						?>
						<option value = "<?php echo $x['cat_id'];?>"> <?php echo $x['cat_name']; }?></option>
                    </select>
                </div>

                <!-- Getting all available product brands-->
                <div class="form-group">
                    <select class="form-control" name="brand" required = "required" >
						<option value = "" default> -- Select Product Brand --</option>
						<?php
							foreach($brands as $y){
						?>
						<option value = "<?php echo $y['brand_id'];?>"> <?php echo $y['brand_name']; }?></option>
                    </select>
                </div>
            </div>

			<div class="form-group">
				<input class="form-control" type="decimal" placeholder="Add Product Price" name="price">
			</div>

			<div class="form-group">
				<textarea class="form-control" placeholder="Add Product Description" name="description"></textarea>
			</div>

            <div class="form-group">
				<textarea class="form-control" placeholder="Enter Product Keywords" name="keyword"></textarea>
			</div>

			<div class="form-group">
				<input type="file" id="image" name="image" accept="image/*">
			</div>

			<button type="submit" class="btn btn-primary" name="addProductButton"> Add Product </button>
		</form>
	</div>
	<br>
	<br>		
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