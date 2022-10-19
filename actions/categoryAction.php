<?php
session_start();
require('../controllers/productController.php');

//Success messages to be displayed is add is successful
$successAdd = "New Category Added Successfully!";
//Error messages to be displayed is add is successful
$errorAdd = "Unable to Add New Category!";

// check if theres a POST variable with the name 'addCategoryButton'
if(isset($_POST['addCategoryButton'])){
    // retrieve the name from the form submission
    $name = $_POST['name'];

    // call the add_category_controller function: return true or false
    $result = add_category_controller($name);

    if($result === true){
        header("Location: ../views/category.php");
        $_SESSION["success_message"] = $successAdd;
    }
    else $_SESSION["error_message"] = $errorAdd;

}



if(isset($_GET['deleteCategoryID'])){
    // retrieve the ID from the form submission
    $id = $_GET['deleteCategoryID'];

    // call the function
    $result = delete_category_controller($id);

    if($result === true) header("Location: ../views/category.php");
    else echo "deletion failed";


}



//Success messages to be displayed is edit is successful
$successEdit = "Category Edited Successfully!";
//Error messages to be displayed is edit is unsuccessful
$errorEdit = "Unable to Edit Category!";

if(isset($_POST['editCategoryButton'])){
    
    // retrieve the name, description and quantity from the form submission
    $name = $_POST['name'];
    $id = $_POST['id'];

    // call the update_category_controller function: return true or false
    $result = update_category_controller($id, $name);

    if($result === true){
        header("Location: ../views/category.php");
        $_SESSION["success_message"] = $successEdit;
    }
    else $_SESSION["error_message"] = $errorEdit;

}

?>