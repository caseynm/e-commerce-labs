<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('Location: ../views/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Payment</title>
</head>
<body>
<div class="container">	
	<a href="../index.php" class="btn btn-danger" style="margin: 30px 0 0 30px;">Home</a>
	<a href="../views/cart.php" class="btn btn-primary" style="margin: 20px 0 0 0; float:right;"> << Back to Cart</a>
    <form method="post" id="paymentForm" style="width: 50%; margin-left: 25%; margin-top:5%">
    <h1 style="text-align:center;">Checkout Items</h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Enter Your Email address</label>
            <input type="email" id="email-address" required class="form-control"  aria-describedby="emailHelp" value="<?php echo $_SESSION['customer_email']; ?>">
            <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Payment Amount</label>
            <input type="number" name="amount" required id="amount" class="form-control" value="<?php echo $_SESSION['total'] ?>" disabled> 
            <small class="form-text text-muted">This amount includes a 0.5% Platform Fee. </small>
        </div>
        <button type="submit" onclick="payWithPaystack()" class="btn btn-primary"> Make Payment </button>
    </form>
	</div>
	<!-- END FORM -->


	<!-- PAYSTACK INLINE SCRIPT -->
<script src="https://js.paystack.co/v1/inline.js"></script> 

<script>
	const paymentForm = document.getElementById('paymentForm');
	paymentForm.addEventListener("submit", payWithPaystack, false);

	// PAYMENT FUNCTION
	function payWithPaystack(e) {
		e.preventDefault();
		let handler = PaystackPop.setup({
			key: 'pk_test_3465938a39c4933acbc7a282a169336b018a4c6e', // Replace with your public key
			email: document.getElementById("email-address").value,
			amount: document.getElementById("amount").value * 100,
			currency:'GHS',
			callback: function(response){
				window.location = `../actions/paymentAction.php?email=${document.getElementById("email-address").value}&amount=${document.getElementById("amount").value}&reference=${response.reference}`
			}
		});
		handler.openIframe();
	}

</script>
	
</body>
</html>