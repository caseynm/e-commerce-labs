<?php
require('../controllers/productController.php');
session_start();
if(!isset($_SESSION['name']) || $_SESSION['role'] == 1) header("Location: ../index.php"); 
// return array of all rows, or false (if it failed)
$categories = select_all_categories_controller();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Categories</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/validation.js"></script> 
</head>
<body>  
    <a href="../index.php" class="btn btn-danger" style="margin: 30px 0 0 30px;">Home</a>
	<h1 style='text-align:center;'>Add Category</h1>
	<div class="container">
		<form name="myForm" onsubmit="return validate()" method="post" action="../actions/categoryAction.php" >
			<div class="form-group">
				<input class="form-control" type="text" placeholder="Category Name" name="name" >
			</div>
            <button type="submit" class="btn btn-primary" name="addCategoryButton"> Add Category</button>
		</form>
	
        <br>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach($categories as $x){
                    echo 
                    "<tr>
                        <td>{$x['cat_name']}</td>
                        <td><a href='updateCategory.php?id={$x['cat_id']}'>Edit</a></td>
                        <td><a href='../actions/categoryAction.php?deleteCategoryID={$x['cat_id']}'>Delete</a></td>
                    </tr>";
                }

                ?>

            </tbody>
        </table>
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