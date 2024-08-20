<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("./function/cart.php");
$items = getCartItems();
$grand_total = 0;
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
                                <?php foreach ($items as $index => $item): ?>
                                    <?php $grand_total += $item["price"] * $item["buy_qty"]; ?>
                                    <tr>
                                        <td><img src="<?php echo $item["thumbnail"]; ?>" width="80" /></td>
                                        <td><?php echo $item["name"]; ?></td>
                                        <td><?php echo $item["buy_qty"]; ?></td>
                                        <td><?php echo $item["price"]; ?></td>
                                        <td><?php echo $item["price"] * $item["buy_qty"]; ?></td>
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
                                <h3>Total: <?php echo $grand_total; ?></h3>
                                </p>
                                <a href="/checkout.php" class="btn btn-primary">Checkout</a>
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