<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>SIGN UP</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/validation.js"></script> 
</head>
<body>
    <div class="container">
        <h3>Signup Form</h3>
        <form method="POST" action="../actions/customerAction.php" onsubmit="return validate()">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Full Name"> 
                </div>
                <div class="form-group col-md-6">
                    <label class="label">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label class="label">Country</label>
                    <input type="text" name="country" class="form-control" placeholder="Enter country">
                </div>
                <div class="form-group">
                    <label class="label">City</label>
                    <input type="text" name="city" class="form-control" placeholder="Enter city">
                </div>
            </div>
            <div class="form-group">
                <label class="label">Contact Details</label>
                <input type="text" name="contact" class="form-control" placeholder="Enter Phone Number">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="label">Enter Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                </div>
                <div class="form-group col-md-6">
                    <label class="label">Confirm Password</label>
                    <input type="password" name="conPassword" class="form-control" placeholder="Re-enter Password">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="signupButton"> Submit </button>
            </div>
        </form>
    </div>
</body>
<?php
    session_start();
    if(isset($_SESSION["success_message"])){
      $message = $_SESSION["success_message"];
      echo "<script>
          swal('Done!', '".$message."', 'success');
          </script>";
    }  
    unset($_SESSION["success_message"]);        
?>
</html>