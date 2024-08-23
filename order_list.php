<?php
require_once("./function/db.php");
$sql = "select * from orders";
$order = select($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("html/head.php"); ?>
</head>

<body>
    <div class="container">
        <h1 class="text-center">DS Đơn hàng</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Shipping Address</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order as $item): ?>
                    <tr>
                        <th scope="row"><?php echo $item["id"] ?></th>
                        <td><?php echo $item["created_date"] ?></td>
                        <td><?php echo $item["customer_name"] ?></td>
                        <td><?php echo $item["telephone"] ?></td>
                        <td><?php echo $item["email"] ?></td>
                        <td><?php echo $item["shipping_address"] ?></td>
                        <td><?php echo $item["payment_method"] ?></td>
                        <td><?php echo $item["grand_total"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>