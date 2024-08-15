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
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("html/head.php"); ?>
<body>
    <div class="all">
    <?php include_once("html/nav.php") ?>
    <div class="container">
        <div class="row-8 mt-5 mb">
            <h3>Shopping cart</h3>
            <hr>
            <div class="row">
                <div class="col-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td class = 'align-middle'><img src="<?php echo htmlspecialchars($item['thumbnail'])?>" alt="<?php echo htmlspecialchars($item['name'])?>" style="width: 103px; height: 140px;"></td> 
                                    <td class = 'align-middle'><?php echo htmlspecialchars($item['name']) ?></td>
                                    <td class = 'align-middle'><?php echo htmlspecialchars('$' . $item['price']) ?></td>
                                    <td class = 'align-middle'><?php echo htmlspecialchars($item['quantity']) ?></td>
                                    <td class = 'align-middle'><?php echo htmlspecialchars('$' . $item['total']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total</h5>
                            <p class="card-text">
                                <?php
                                $grandtotal = array_sum(array_column($cartItems, 'total'));
                                echo htmlspecialchars('$' . $grandtotal);
                                ?>
                            </p>
                            <a href="#" class="btn btn-primary">Checkout</a>
                            <a href="clearcart.php" class="btn btn-danger">Clear Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>