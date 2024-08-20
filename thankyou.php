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
clearCart();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("html/head.php"); ?>
</head>

<body>
    <?php include_once("html/nav.php"); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <h1 class="text-center">Cảm ơn Quý khách!</h1>
                <p>Cảm ơn Quý khách đã tin tưởng và lựa chọn mua hàng tại công ty chúng tôi. Đơn hàng của Quý khách
                    đã được xác nhận và chúng tôi sẽ xử lý trong thời gian sớm nhất.<br><br>

                    Chúng tôi rất vui mừng được phục vụ Quý khách và hy vọng rằng Quý khách sẽ hài lòng với sản phẩm của
                    chúng tôi. Nếu Quý khách cần hỗ trợ hoặc có bất kỳ câu hỏi nào, xin vui lòng liên hệ với chúng tôi
                    qua [Số điện thoại] hoặc [Email].<br><br>

                    Một lần nữa, xin chân thành cảm ơn Quý khách!<br><br></p>

                <p class="text-center">Trân trọng,</p>

                <div class="row borderbbbb">
                    <h4 class="text-center">Thông tin đơn hàng</h4>

                    <div class="col">
                        <?php foreach ($cartItems as $item): ?>
                            <div class="row border-bottom mt-3 mb-3">
                                <div class="col-8 pb-3">
                                    <strong><?php echo htmlspecialchars($item['quantity']) ?> x
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
</body>

</html>