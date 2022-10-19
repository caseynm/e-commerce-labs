<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Lab Asssignment</title>

</head>
<body>
    <div class="container"> 
    <?php
    session_start();
    if (!isset($_SESSION['name'])) {
        echo '<h3 style="text-align: center;margin-top:20px;">E-commerce Task List</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card shadow-sm bg-white rounded">
                            <div class="card-body">
                                <h5 class="card-title">Task 3: - Register Customer</h5>
                                <p class="card-text">Signup/Registration Function Demo.</p>
                                <a href="views/signup.php" class="btn btn-primary">Register</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card shadow-sm bg-white rounded">
                            <div class="card-body">
                                <h5 class="card-title">Task 4: - Login</h5>
                                <p class="card-text">Login Function Demonstration <hr> (Administrator Login Details. Email: "administrator@gmail.com" Password: "admin").</p>
                                <a href="views/login.php" class="btn btn-primary">Login</a>
                            </div>
                        </div>
                    </div>
                </div>';
    }
    if (isset($_SESSION['name']) && $_SESSION['role'] == 0) {
        echo '<div><a href="actions/logout.php" class="btn btn-danger" style="margin-top: 5px; float:right;">Logout</a>
                <h3 style="text-align: center; margin-top: 20px;"> Admin Functions</h3></div>
                <div class="row" style="margin-top:30px;">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Task 5: - Add Brand</h5>
                                <p class="card-text">Add a new Product Brand Demo.</p>
                                <a href="views/brand.php" class="btn btn-primary">Add New Brand</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Task 6: - Edit Brand</h5>
                                <p class="card-text">Edit brand entries in table.</p>
                                <a href="views/updateBrand.php" class="btn btn-primary">Edit Brand</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px;">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Task 7: - Add Category</h5>
                                <p class="card-text">Add New Category</p>
                                <a href="views/category.php" class="btn btn-primary">Add Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Task 8: - Edit Category</h5>
                                <p class="card-text">Edit or Update a Category</p>
                                <a href="views/updateCategory.php" class="btn btn-primary">Edit Category</a>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="row" style="margin-top:30px;">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Task 9: - Product Management (Add/Edit)</h5>
                                <p class="card-text">Add and Edit products</p>
                                <a href="views/addProduct.php" class="btn btn-primary">Add Product</a>
                                <a href="views/updateProduct.php" class="btn btn-success">Edit Product</a>
                            </div>
                        </div>
                    </div>';
    }

    if (isset($_SESSION['name']) && $_SESSION['role'] == 1) {
        echo "
            <a href='actions/logout.php' class='btn btn-danger' style='margin-top: 5px; float:right;'>Logout</a>
            <h4 style='text-align: center; float: left' >Hello, ";
        echo $_SESSION['name'];
        echo "</h4>
            <h2 style='text-align: center; margin-top:20px;'> User Functions</h2>";
    }
    ?>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Task 10: - Product Display (Display & Search)</h5>
                        <p class="card-text">See our Calalog</p>
                        <a href="views/products.php" class="btn btn-primary">View Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container"> 
        <div class="row" style="margin-top:30px;">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Task 11: - Add to Cart</h5>
                        <p class="card-text">View your cart.</p>
                        <a href="views/cart.php" class="btn btn-primary">View Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Task 12: - Cart Management</h5>
                        <p class="card-text">Update Cart Items.</p>
                        <a href="views/cart.php" class="btn btn-primary">View Cart</a>                    
                    </div>
                </div>
            </div>
        </div> 
        <div class="row" style="margin-top:30px;">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Task 13: - Payment</h5>
                        <p class="card-text">View your cart</p>
                        <a href="views/cart.php" class="btn btn-primary">View Cart</a>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</body>
</html>