<?php
require_once("db.php");
function getCartItems(){
    $cart = isset($_SESSION["cart"])?$_SESSION["cart"]:[];
    $items = [];
    if(count($cart)> 0){
        // $ids = "(1,2,4,5,6)";
        $ids = [];
        foreach($cart as $key=>$item){
            $ids[] = $key;
        }
        $ids = implode(",",$ids); // [1,3,4] => "1,3,4"
        $sql = "select * from products where product_id in ($ids)";
        $result = select($sql);
        foreach($result as $item){
            $items[] = [
                    "id"=> $item["product_id"],
                    "name"=> $item["name"],
                    "thumbnail"=> $item["thumbnail"],
                    "price"=> $item["price"],
                    "in_stock"=> $item["qty"] > $cart[$item["product_id"]]?true:false,
                    "buy_qty"=>$cart[$item["product_id"]],
                    "details" => $item["description"]
            ];
        }
    }
    return $items;
}