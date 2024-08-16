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
            'details' => $product['description'],
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
<?php include_once("html/nav.php"); ?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6">
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
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                    </div>
                </form>
                <h1>Payment Method</h1>
                <div class="formborder">
                    <div class="form-check box">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            COD
                        </label>
                    </div>
                </div>
                <div class="formborder  mt-3">

                    <div class="form-check box">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            PayPal
                        </label>
                    </div>
                </div>
                <p class="text-center mt-3"> By clicking this button you agree to the <u>terms and conditions</u></p>
                <div class="d-grid gap-2 marginbot">
                    <button type="button" class="btn btn-success ">Place Order</button>
                </div>
            </div>
            <div class="col-4 ">
                <div class="row borderbbbb">
                    <h4><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-cart4" viewBox="0 0 16 16">
                            <path
                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                        </svg> Cart Sumary(<a href="#">edit</a>)</h4>

                    <div class="col">
                        <?php foreach ($cartItems as $item): ?>
                            <div class="row border-bottom mt-3 mb-3">
                                <div class="col-8 pb-3">
                                    <strong><?php echo htmlspecialchars($item['quantity']) ?>
                                        <?php echo htmlspecialchars($item['name']) ?></strong><br>
                                    <?php echo htmlspecialchars($item['details']) ?>

                                </div>
                                <div class="col-1"></div>
                                <div class="col-3 text-end pt-4">
                                    <span
                                        class="mt-3"><strong><?php echo htmlspecialchars('$' . $item['total']) ?></strong></span>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <div class="col text-end">
                            <strong>Total: <?php echo htmlspecialchars('$' . $grandtotal); ?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>