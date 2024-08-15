<?php
  require_once("./function/db.php");
    // 1 Get Parameter
    if (isset($_GET["btn"])) {
        $name = $_GET["name"];
    } else {
        $name = "Mo";
    }
    // 2. connect db
    $sql = "select * from products where name like '%$name%'";
    $products = select($sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once ("html/head.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once ("html/head.php"); ?>
<!-- <?php
// Get Parameter
if (isset($_GET["btn"])) {
    $name = $_GET["name"];
} else {
    $name = "Mo";
}
// 1 connect to db
$host = "localhost";
$user = "root";
$pass = "root";
$db = "abc";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->error) {
    die("Connect refused!");
}



//die("Connected database...");
// 2. query data
$sql = "select * from products where name like '%$name%'";
$result = mysqli_query($conn, $sql);
$products = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $products[] = $row;
    }
}
// 3. convert data to array


?> -->

<style>
    body {
        background: linear-gradient(30deg, #e0e1dd 20%, #778da9 40%, #e0e1dd 65%, #778da9 90%);

    }
</style>

<body>
    <?php include_once ("html/nav.php"); ?>
    <main>
        <div class="container">
            <div class="row">
                <?php foreach ($products as $item): ?>
                    <div class="col-3 op">
                        <div class="card">
                            <img src="." class="card-img-top" alt="...">
                            <div class="card-body">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><?php echo $item["name"]; ?></a>
                                </li>

                                <h5 class="card-title">Card Title</h5>
                                <p class="card-text">lorem</p>
                                <a href="#" class="btn btn-primary"> Go somewhere</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>

</html>