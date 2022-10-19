<?php
require('../controllers/customerController.php');
//require('../settings/core.php');
session_start();

echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';

// check if theres a POST variable with the name 'signupButton'
if(isset($_POST['signupButton'])){

    // retrieve the name, description and quantity from the form submission
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $conPassword = base64_encode($_POST['conPassword']);
    $country = $_POST['country'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $image = NULL;
    $role = 1;

    //Success messages to be displayed is login credentials are correct
    $successlogin = "User Registration Successful!";

    // call the add_customer_controller function: return true or false
    $result = add_customer_controller($name, $email, $password, $country, $city, $contact, $image, $role);

    if($result === true){
        header("Location: ../index.php");
        $_SESSION["success_message"] = $successlogin;  
    }

    else echo "insertion failed";

}

if(isset($_POST['loginButton'])){
    // retrieve the name and email from the form submission

    $email=$_POST['email'];
    $password=$_POST['password'];

    $result = login_controller($email);
    $password_hash = $result["customer_pass"];

    //Error messages to be displayed is login credentials are not corrects
    $errorlogin = "Incorrect Login credentials";

    if (password_verify($password, $password_hash) == true){
        $_SESSION['name'] = $result['customer_name'];
        $_SESSION['customer_id'] = $result['customer_id'];
        $_SESSION['customer_email'] = $result['customer_email'];
        $_SESSION['role'] = $result['user_role'];

        if ($_SESSION['role'] == 0) header("Location: ../index.php");
        else header("Location: ../index.php");
    }
    
    else{
        header("Location: ../views/login.php");  
        $_SESSION["error_message"] = $errorlogin;
        
    }

} 

?>