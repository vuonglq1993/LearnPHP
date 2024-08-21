
<?php 
session_start();
require_once("./function/db.php");
require_once("./function/cart.php");

$cart = isset($_SESSION["cart"])?$_SESSION["cart"]:[];
$cart = $_SESSION['cart'];

$order_id = $cart['id'];;



$sql = "UPDATE orders SET paid = 1 WHERE id = $order_id";

  header( "Location: /thankyou.php");
  die();
?>