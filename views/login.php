<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="container">
        <h3>Login Form</h3>
        <form method="POST" action="../actions/customerAction.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="label">Email</label>
                    <input type="text" name= "email" id="mail" class="form-control" placeholder="Enter Email" required> 
                </div>
                <div class="form-group col-md-6">
                    <label class="label">Password</label>
                    <input type="password" name="password" id="pass" class="form-control" placeholder="Enter Password" required>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="loginButton"> Login </button>
            </div>
        </form>
    </div>
</body>
<?php
    session_start();
    if(isset($_SESSION["error_message"])){
      $message = $_SESSION["error_message"];
      echo "<script>
          swal('Try Again!', '".$message."', 'error');
          </script>";
    }  
            
?>
</html>
