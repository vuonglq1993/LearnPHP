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
        $sql = "select * from products where id in ($ids)";
        $result = select($sql);
        foreach($result as $item){
            $items[] = [
                    "id"=> $item["id"],
                    "name"=> $item["name"],
                    "thumbnail"=> $item["thumbnail"],
                    "price"=> $item["price"],
                    "in_stock"=> $item["qty"] > $cart[$item["id"]]?true:false,
                    "buy_qty"=>$cart[$item["id"]]
            ];
        }
    }
    return $items;
}