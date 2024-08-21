<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("./function/cart.php");
$items = getCartItems();
$grand_total = 0;
clearcart();
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
                        <h4>Thông tin đơn hàng</h4>

                        <div class="col">
                            <?php foreach ($items as $item): ?>
                                <?php $grand_total += $item["buy_qty"] * $item["price"]; ?>
                                <div class="row border-bottom mt-3 mb-3">
                                    <div class="col-8 pb-3">
                                        <strong> <?php echo $item["buy_qty"]; ?> x <?php echo $item["name"]; ?> 
                                            (<?php echo $item["price"]; ?>)</strong><br>
                                        <?php echo $item['details'] ?>

                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-3 text-end pt-4">
                                        <span
                                            class="mt-3"><strong><?php echo $item["buy_qty"] * $item["price"]; ?></strong></span>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <div class="col text-end">
                                <strong>Total: <?php echo htmlspecialchars('$' . $grand_total); ?></strong>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</body>

</html>