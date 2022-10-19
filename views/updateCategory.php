<?php
session_start();
if(!isset($_SESSION['name']) || $_SESSION['role'] == 1) header("Location: ../userIndex.php"); 
require('../controllers/productController.php');
// return array of all rows, or false (if it failed)
$category = select_one_category_controller($_GET['id']);
$categories = select_all_categories_controller();

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>categories</title>
    <script src="../js/validation.js"></script> 
</head>
<body>
    <a href="../index.php" class="btn btn-danger" style="margin: 30px 0 0 30px;">Home</a>
	<h1 style='text-align:center;'>Edit Category</h1>
	<div class="container">
		<form name="myForm" onsubmit="return validateEdit()" method="post" action="../actions/categoryAction.php">
			<div class="form-group">
				<input class="form-control" type="text" placeholder="Categrory Name" name="name" value="<?php echo $category['cat_name']; ?>">
			</div>
			<input class="form-control" type="hidden" name="id" value="<?php echo $category['cat_id']; ?>">
            <button type="submit" class="btn btn-primary" name="editCategoryButton"> Edit Category</button>
		</form>

        <br>
        <br>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Category Name</th>
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
                    </tr>";
                }

                ?>

            </tbody>
        </table>
	</div>


	
</body>
</html>