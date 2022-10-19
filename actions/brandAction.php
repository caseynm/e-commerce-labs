<?php
session_start();
require('../controllers/productController.php');

//Success messages to be displayed is add is successful
$successAdd = "New Brand Added Successfully!";
//Error messages to be displayed is add is successful
$errorAdd = "Unable to Add New Brand!";

// check if theres a POST variable with the name 'addbrandButton'
if(isset($_POST['addBrandButton'])){
    // retrieve the name from the form submission
    $name = $_POST['name'];

    // call the add_brand_controller function: return true or false
    $result = add_brand_controller($name);

    if($result === true){
        header("Location: ../views/brand.php");
        $_SESSION["success_message"] = $successAdd;
    }
    else $_SESSION["error_message"] = $errorAdd;

}



if(isset($_GET['deleteBrandID'])){
    // retrieve the ID from the form submission
    $id = $_GET['deleteBrandID'];

    // call the function
    $result = delete_brand_controller($id);

    if($result === true) header("Location: ../views/brand.php");
    else echo "deletion failed";


}



//Success messages to be displayed is edit is successful
$successEdit = "Brand Edited Successfully!";
//Error messages to be displayed is edit is unsuccessful
$errorEdit = "Unable to Edit Brand!";

if(isset($_POST['editBrandButton'])){
    
    // retrieve the name, description and quantity from the form submission
    $name = $_POST['name'];
    $id = $_POST['id'];

    // call the update_brand_controller function: return true or false
    $result = update_brand_controller($id, $name);

    if($result === true){
        header("Location: ../views/brand.php");
        $_SESSION["success_message"] = $successEdit;
    }
    else $_SESSION["error_message"] = $errorEdit;

}


?>