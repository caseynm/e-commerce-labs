<?php
session_start();
require '../controllers/cartController.php';

//Success messages to be displayed is add is successful
$successAdd = 'Product Added to Cart Successfully!';
//Error messages to be displayed is add is successful
$errorAdd = 'Unable to Add to Cart!';

if (isset($_GET['id'])) {
    $p_id = $_GET['id'];
    $ip_add = $_SERVER['REMOTE_ADDR'];

    if (isset($_SESSION['customer_id'])) {
        $c_id = $_SESSION['customer_id'];
    } else {
        $c_id = null;
    }

    $qty = 1;

    // call the add_category_controller function: return true or false
    $result = add_to_cart_controller($p_id, $ip_add, $c_id, $qty);

    if ($result === true) {
        header('Location: ../views/products.php');
        $_SESSION['success_message'] = $successAdd;
    } else {
        header('Location: ../views/products.php');
        $_SESSION['error_message'] = $errorAdd;
    }
}

if (isset($_GET['deleteID'])) {
    // retrieve the ID from the form submission
    $p_id = $_GET['deleteID'];
    $ip_add = $_SERVER['REMOTE_ADDR'];
    $c_id = $_SESSION['customer_id'];

    // call the function
    $result = delete_from_cart_controller($p_id, $ip_add, $c_id);

    if ($result === true) {
        header('Location: ../views/cart.php');
    } else {
        echo 'deletion failed';
    }
}

if (isset($_POST['updateCartButton'])) {
    $qty = $_POST['qty'];
    $p_id = $_POST['p_id'];
    $ip_add = $_SERVER['REMOTE_ADDR'];
    $c_id = $_SESSION['customer_id'];

    // call the update_category_controller function: return true or false
    $result = update_cart_controller($p_id, $ip_add, $c_id, $qty);

    if ($result === true) {
        header('Location: ../views/cart.php');
    } else {
        echo 'unable to add';
    }
}

?>
