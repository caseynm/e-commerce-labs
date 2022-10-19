<?php
session_start();
require('../controllers/productController.php');

echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';

//Success messages to be displayed is add is successful
$successAdd = 'New Product Added Successfully!';
//Error messages to be displayed is add is successful
$errorAdd = 'Unable to Add New product';

// check if theres a POST variable with the name 'addProductButton'
if (isset($_POST['addProductButton'])) {
    // retrieve the name, description and quantity from the form submission
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $keywords = $_POST['keyword'];

    $imgName = $_FILES['image']['name'];
    $targetDir = "../images/products/";
    $image = $targetDir . $imgName;
    move_uploaded_file($_FILES["image"]["tmp_name"],"../images/products/".$_FILES["image"]["name"]);

    // call the update_product_controller function: return true or false
    $result = add_product_controller($category,$brand, $title, $price, $desc, $image, $keywords);

    if ($result === true) {
        header('Location: ../views/addProduct.php');
        $_SESSION['success_message'] = $successAdd;
    } else {
        $_SESSION['error_message'] = $errorAdd;
    }
}

//Success messages to be displayed if edit is successful
$successEdit = 'Product updated Successfully!';
//Error messages to be displayed if edit is unsuccessful
$errorEdit = 'Unable to update Product!';

if (isset($_POST['updateProductButton'])) {
    // retrieve the name, description and quantity from the form submission
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $title = $_POST['title'];
    $price = $_POST['price'];
                 $desc = $_POST['description'];
    $keywords = $_POST['keyword'];
    $id = $_POST['product_id'];

    /*$imgName = $_FILES['image']['name'];
    $targetDir = "../images/products/";
    $image = $targetDir . $imgName;
    move_uploaded_file($_FILES["image"]["tmp_name"],"../images/products/".$_FILES["image"]["name"]);*/

    // call the update_product_controller function: return true or false
    $result = update_product_controller(
        $id,
        $category,
        $brand,
        $title,
        $price,
        $desc,
        $keywords
    );

    if ($result === true) {
        header('Location: ../views/updateProduct.php');
        $_SESSION['success_message'] = $successEdit;
    } else {
        $_SESSION['error_message'] = $errorEdit;
    }
}

////////////////////////////

if (isset($_GET['deleteProductID'])) {
    $id = $_GET['deleteProductID'];

    // call the function
    $result = delete_product_controller($id);

    if ($result === true) {
        header('Location: ../views/products.php');
    } else {
        echo 'deletion failed';
    }
}
?>
