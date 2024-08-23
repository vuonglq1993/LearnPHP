<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("./function/cart.php");
$items = getCartItems();
$grand_total = 0;
?>