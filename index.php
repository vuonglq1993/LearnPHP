<?php
  $menu= [
    "Phở gà",
    "Bún riêu",
    "Cơm tấm",
    "Cá kho"
  ];
  $sv =[
    "name" =>"Nguyễn Văn An",
    "age" => 19,
    "tel" => "0987654321"
  ];


  $list_sv =[
    [
      "name" => "Trần Văn A",
      "age" =>18,
      "tel" => "0121111111"
    ],
    [
      "name" =>"Trần Văn B",
      "age" => 18,
      "tel" => "0989989999"
    ]
  ];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1> Thực đơn ngày hôm nay</h1>
  <ul>
    <?php foreach($menu as $item){ ?>
      <li><?php echo $item; ?></li>
    <?php }?>
  </ul>

  <h2>Thông tin sinh viên</h2>
  <h3><?php echo $sv['name']; ?></h3>
  <h3><?php echo $sv['age']; ?></h3>
  <h3><?php echo $sv['tel']; ?></h3>
  <h2>Thông tin sinh viên</h2>
      
  <ul>
    <?php foreach($list_sv as $s):  ?>
      <div>
        <h3><?php echo $s['name']; ?></h3>
        <h3><?php echo $s['age']; ?></h3>
        <h3><?php echo $s['tel']; ?></h3>
      </div>
    <?php endforeach?>
  </ul>
</body>
</html>