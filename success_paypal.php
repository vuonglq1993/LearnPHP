
<?php 
session_start();
require_once("./function/db.php");
require_once("./function/paypal.php");

$order_id = $_GET['order_id'];
$payment_id = $_GET['paymentId'];
$payer_id = $_GET['PayerID'];

// Generate an access token using PayPal credentials
$client_id = "AZFEOYBfFE-wy0qQI2cwemlCTeSwUM0PoadhQ23nJbHoFSxQQzW7w3OsHROlaS9nnYOg87jDxBVilTht";
$client_secret = "EKR8pJZBBJDAC_oTl7zUQYPSpyh4XvhmHSQm8uKDPOBBbjDFtnjCKyJxzb20ciT9zBp8_tPT_S62uNJi";
$access_token = get_access_token($client_id, $client_secret);

// Execute the payment
$result = execute_payment($access_token, $payment_id, $payer_id);

if ($result['state'] === 'approved') {
    // Payment successful, update the orders table
    $sql = "UPDATE `orders` SET `paid` = '1' WHERE `id` = $order_id";
    insert($sql); 
    header("Location: thankyou.php");
} else {
    // Log the response for debugging
    error_log(print_r($result, true));
    header("Location: fail_paypal.php?order_id=$order_id");
}

?>