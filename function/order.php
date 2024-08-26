<?php

require_once("db.php");
function order_list() {
    $sql = "SELECT* from orders order by id desc";
    return select($sql);

}
?>