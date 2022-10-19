<?php
require '../controllers/productController.php';
session_start();
if (!isset($_SESSION['name']) || $_SESSION['role'] == 1) {
    header('Location: ../userIndex.php');
}
// return array of all rows, or false (if it failed)
$brands = select_all_brands_controller();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Brands</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/validation.js"></script> 
</head>
<body>  
    <a href="../index.php" class="btn btn-danger" style="margin: 30px 0 0 30px;">Home</a>
	<h1 style='text-align:center;'>Add Brands</h1>
	<div class="container">
		<form name="myForm" onsubmit="return validate()" method="post" action="../actions/brandAction.php">
			<div class="form-group">
				<input class="form-control" type="text" placeholder="Brand Name" name="name" >
			</div>
            <button type="submit" class="btn btn-primary" name="addBrandButton"> Add Brand </button>
		</form>
	
        <br>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Brand Name</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($brands as $x) {
                    echo "<tr>
                        <td>{$x['brand_name']}</td>
                        <td><a href='updateBrand.php?id={$x['brand_id']}'>Edit</a></td>
                        <td><a href='../actions/brandAction.php?deleteBrandID={$x['brand_id']}'>Delete</a></td>
                    </tr>";
                } ?>

            </tbody>
        </table>
	</div>
	
</body>
<?php
if (isset($_SESSION['error_message'])) {
    $message = $_SESSION['error_message'];
    echo "<script>
            swal('Error!', '" .
        $message .
        "', 'error');
            </script>";
    unset($_SESSION['error_message']);
}

if (isset($_SESSION['success_message'])) {
    $message = $_SESSION['success_message'];
    echo "<script>
            swal('Done!', '" .
        $message .
        "', 'success');
            </script>";
    unset($_SESSION['success_message']);
}
?>
</html>