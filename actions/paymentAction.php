<?php
require '../controllers/cartController.php';
session_start();
// initialize a client url which we will use to send the reference to the paystack server for verification
$curl = curl_init();

// set options for the curl session insluding the url, headers, timeout, etc
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$_GET['reference']}",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer sk_test_eff444b2ff08c895145928ec0d9064609cdbe20c',
        'Cache-Control: no-cache',
    ],
]);

// get the response and store
$response = curl_exec($curl);
// if there are any errors
$err = curl_error($curl);
// close the session
curl_close($curl);

// convert the response to PHP object
$decodedResponse = json_decode($response);

// check if the object has a status property and if its equal to 'success' ie. if verification was successful
if (
    isset($decodedResponse->data->status) &&
    $decodedResponse->data->status === 'success'
) {
    if (isset($_SESSION['customer_id'])) {
        // get form values

        $customer_id = $_SESSION['customer_id'];
        $invoice_number = mt_rand();
        $date = date('Y-m-d');
        $status = $decodedResponse->data->status;

        // call controller function to insert into database
        $result = add_order_controller(
            $customer_id,
            $invoice_number,
            $date,
            $status
        );
    }

    $ip_add = getenv('REMOTE_ADDR');
    $c_id = $_SESSION['customer_id'];

    //getting product_id and quantity from cart
    $cartItems = select_from_cart_controller($ip_add, $c_id);

    foreach ($cartItems as $cartItems) {
        $p_id = $cartItems['p_id'];
        $qty = $cartItems['qty'];
        // inserting the information into the order details  table
        $orderDetails = add_order_details_controller($result, $p_id, $qty);
    }

    $order_id = $orders['order_id'];
    $amt = $_GET['amount'];
    $payment_date = date('Y-m-d');
    $currency = 'GHC';

    // inserting into the payment table
    $final = add_payment_controller(
        $amt,
        $customer_id,
        $result,
        $currency,
        $payment_date
    );

    if ($final) {
        // if payment is successful remove the customers products from the cart
        $delete = delete_all_from_cart_controller($ip_add, $c_id);
    }

    // check if insertion was successful
    if ($delete) {
        header('Location: ../views/success.html');
    } else {
        header('Location: ../views/failure.html');
    }
} else {
    // if verification failed
    echo $response;
}

?>
