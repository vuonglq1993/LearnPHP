<?php
require_once ("./function/db.php");
$id = $_GET["id"];
$sql = "select * from products where id = $id";
$products = findById($sql);
if ($products == null) {
    header("Location: 404notfound.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once ("html/head.php"); ?>

<body>
    <?php include_once ("html/nav.php"); ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img src="<?php echo $products["thumbnail"]; ?>" style="width:50%"; />
                </div>
                <div class="col-8">
                    <h1><?php echo $products["name"]; ?></h1>
                    <p>$<?php echo $products["price"]; ?></p>
                    <div class="row">
                        <div class="col-3">
                            <form method="post" action="/add_to_cart.php">
                                <div class="input-group">
                                    <input type="hidden" name="id" value="<?php echo $products["id"]; ?>" />
                                    <input name="buy_qty" type="number" value="1" min="1" class="form-control">
                                    <button class="btn btn-outline-danger" type="submit">Add to cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>