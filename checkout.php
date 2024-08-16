<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
require_once("./function/db.php");
$sql = "SELECT * FROM products";
$products = select($sql);
$cartItems = [];
foreach ($cart as $key => $item) {
    if (isset($products[$key])) {
        $product = $products[$key];
        $cartItems[] = [
            'thumbnail' => $product['thumbnail'],
            'product_id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $item,
            'total' => $item * $product['price'],
        ];
    }
}
$grandtotal = array_sum(array_column($cartItems, 'total'));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("html/head.php"); ?>
</head>

<body>
    <div class="overall">
        <div class="left-part">
            <h1>Billing Details</h1>
            <form>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">First & Last name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Full name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="name@example.com">
                </div>
                <label for="exampleFormControlInput1" class="form-label">Country</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">Vietnam</option>
                    <option value="2">Namviet</option>
                    <option value="3">Vietnam</option>
                </select>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">First & Last name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Full name">
                </div>
            </form>
            <h1>Payment Method</h1>
            <form>
                <div class="form-check box">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        CreditCards
                    </label>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">CardNumber</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="1234 **** **** ****">
                    </div>
                </div>
                <div class="form-check box">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        PayPal
                    </label>
                </div>

                <p> By clicking this button you agree to the <u>terms and conditions</u></p>
                <button type="button" class="btn btn-success">Place Order</button>

        </div>
        <div class="right-part">
            <div class="borderbbbb">
                Cart Sumary(<a href="#">edit</a>)
            <?php foreach ($cartItems as $item): ?>
                <?php echo htmlspecialchars($item['quantity']) ?> <?php echo htmlspecialchars($item['name']) ?><?php echo htmlspecialchars('$' . $item['total']) ?><br>
            <?php endforeach ?>
            <strong>Total: <?php echo htmlspecialchars('$' . $grandtotal); ?></strong>
        </div>
            </div>
        
        </div>
    </div>
    </div>
</body>

</html>