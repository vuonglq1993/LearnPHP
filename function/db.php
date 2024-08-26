<?php 
function connect(){
    $config = file_get_contents("app_setting.json");// string
    $config = json_decode($config);
    $host = $config->host;
    $user = $config->user;
    $pass = $config->pass;
    $db = $config->db;
    $conn = new mysqli($host,$user,$pass,$db);
    if($conn->error){
        die("Connect refused!");
    }
    return $conn;
}

function select($sql){
    $conn = connect();
    $result = $conn->query($sql);
    //convert data to array
    $data = [];
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    return $data;
}

function findById($sql) {
    $data = select($sql); // [] : 1 hoặc 0 element
    if(count($data)>0){
        return $data[0];
    }
    return null;
}

function insert($sql){
    $conn = connect();
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        return $last_id;
    }
    return null;
}

function selects($sql, $params = []) {
    $conn = connect();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat("s", count($params)), ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    //convert data to array
    $data = [];
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    return $data;
}

function clearcart(){
    unset($_SESSION['cart']); 
}

