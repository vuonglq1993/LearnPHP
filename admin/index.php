<?php 
    require_once("./../function/order.php");
    $orders = order_list();
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("./../html/head.php");?>
<body>
    <main>
        <div class="row">
            <aside class="col-3">
                <ul class="list-group">
                    <li class="list-group-item">Orders</li>
                    <li class="list-group-item">Customers</li>
                    <li class="list-group-item">Products</li>
                    <li class="list-group-item">Categories</li>
                    <li class="list-group-item">Reviews</li>
                </ul>
            </aside>
            <article class="col">
                <h1>Orders Listing</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Telephone</th>
                        <th>Grand total</th>
                        <th>Created At</th>
                        <th>Payment</th>
                        <th>Paid</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $item):?>
                            <tr>
                                <td><?php echo $item["id"];?></td>
                                <td><?php echo $item["customer_name"];?></td>
                                <td><?php echo $item["telephone"];?></td>
                                <td><?php echo $item["grand_total"];?></td>
                                <td><?php echo $item["created_date"];?></td>
                                <td><?php echo $item["payment_method"];?></td>
                                <td>
                                    <?php if($item["paid"]):?>
                                        <span class="text-success">Paid</span>
                                    <?php else:?>
                                        <span class="text-danger">Unpaid</span>
                                    <?php endif;?>
                            </td>
                                <td><?php if($item["status"] == 1):?>
                                    <span class="text-success">Pending</span>
                                    <?php elseif($item["status"] == 2):?>
                                        <span class="text-secondary">Confirm</span>
                                    <?php elseif($item["status"] == 3):?>
                                        <span class="text-warning">Shipping</span>
                                    <?php elseif($item["status"] == 4):?>
                                        <span class="text-info">Delivered</span>
                                        <?php elseif($item["status"] == 5):?>
                                            <span class="text-danger">Canceled</span>
                                    <?php endif;?>
                            </td>
                            </tr>
                        <?php endforeach;?>    
                    </tbody>
                </table>
            </article>
        </div>
    </main>
</body>
</html>