<?php
require_once("./function/db.php");
$orderId = $_GET["order_id"];
$sql = "SELECT 
o.*, 
p.name, 
p.description,
oi.*
FROM 
orders o
INNER JOIN 
order_items oi
ON 
o.id = oi.order_id
INNER JOIN 
products p
ON 
p.product_id = oi.product_id
    WHERE o.id = $orderId";
$order_details = select($sql);
foreach ($order_details as $item) {
    $items[] = [
        "order_id" => $orderId,  // đưa order_id vào mảng để dùng để lưu vào file PDF khi xuất ra file PDF đơn hàng
        "product_id" => $item["product_id"],
        "product_name" => $item["name"],
        "price" => $item["price"],
        "description" => $item["description"],
        // "in_stock" => $item["qty"] > $cart[$item["id"]] ? true : false,
        "buy_qty" => $item["buy_qty"],
        "details" => $item["description"],
        "total_price" => $item["price"] * $item["buy_qty"],  // tính t��ng tiền của sản phẩm đó trong đơn hàng
        "shipping_address" => $item["shipping_address"],
        "created_date" => $item["created_date"],
    ];
}
$grand_total = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("html/head.php"); ?>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <h1 class="text-center">Order Detail</h1>
                <div class="row">
                    <div class="col-3">
                        <p>Customer information</p>
                        <p><strong><?php echo $item["customer_name"] ?></strong></p>
                        <p><?php echo $item["shipping_address"] ?></p>
                    </div>
                    <div class="col-3">
                        <p>Invoice Number</p>
                        <p><strong>#<?php echo $item["id"] ?></strong></p>
                        <br>
                        <p><strong>Date of Issue</strong></p>
                        <p><?php echo $item["created_date"] ?></p>
                    </div>
                    <div class="col-6">
                        <?php foreach ($order_details as $item): ?>
                            <?php $grand_total += $item["buy_qty"] * $item["price"]; ?>
                        <?php endforeach; ?>
                        <p class="text-end">Invoice total</p>
                        <p class="fs-2 text-end">$<?php echo $grand_total ?></p>
                    </div>
                </div>
                <div class="row borderbbbb">
                    <table class="table">
                        <thead>
                            <tr>
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
                                    <td class="pt-4 pb-4">
                                        <p><strong><?php echo $item["product_name"]; ?></strong></p>
                                        <p><?php echo $item["description"]; ?></p>
                                    </td>
                                    <td class="pt-5"><?php echo $item["price"]; ?></td>
                                    <td class="pt-5"><?php echo $item["buy_qty"]; ?></td>
                                    <td class="pt-5"><?php echo $item["price"] * $item["buy_qty"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>