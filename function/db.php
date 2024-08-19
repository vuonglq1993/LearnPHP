<?php 
function connect()
{
    $config = file_get_contents("./app_setting.json");
    $config = json_decode($config, true);
    $host = $config['host'];
    $user = $config['user'];
    $pass = $config['pass'];
    $db = $config['db'];
    $conn = new mysqli("$host", "$user", "$pass", "$db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function select($sql)
{
    $conn = connect();
    $data = [];

    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        $result->free(); // Giải phóng bộ nhớ
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        die("Query failed: " . $conn->error);
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
