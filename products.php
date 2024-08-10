<?php
$products = [
    [
        "id" => 1,
        "name" => "iPhone 15 Promax",
        "price" => 1500,
        "thumbnail" => "https://cdn.dummyjson.com/products/images/smartphones/iPhone%20X/1.png",
        "description" => "The iPhone X is a flagship smartphone featuring a bezel-less OLED display, facial recognition technology (Face ID), and impressive performance. It represents a milestone in iPhone design and innovation."
    ],
    [
        "id" => 1,
        "name" => "iPhone 15 Promax",
        "price" => 1500,
        "thumbnail" => "https://cdn.dummyjson.com/products/images/smartphones/iPhone%20X/1.png",
        "description" => "The iPhone X is a flagship smartphone featuring a bezel-less OLED display, facial recognition technology (Face ID), and impressive performance. It represents a milestone in iPhone design and innovation."
    ],
    [
        "id" => 1,
        "name" => "iPhone 15 Promax",
        "price" => 1500,
        "thumbnail" => "https://cdn.dummyjson.com/products/images/smartphones/iPhone%20X/1.png",
        "description" => "The iPhone X is a flagship smartphone featuring a bezel-less OLED display, facial recognition technology (Face ID), and impressive performance. It represents a milestone in iPhone design and innovation."
    ],
    [
        "id" => 1,
        "name" => "iPhone 15 Promax",
        "price" => 1400,
        "thumbnail" => "https://cdn.dummyjson.com/products/images/smartphones/iPhone%20X/1.png",
        "description" => "The iPhone X is a flagship smartphone featuring a bezel-less OLED display, facial recognition technology (Face ID), and impressive performance. It represents a milestone in iPhone design and innovation."
    ],
    [
        "id" => 1,
        "name" => "iPhone 15 Promax",
        "price" => 1500,
        "thumbnail" => "https://cdn.dummyjson.com/products/images/smartphones/iPhone%20X/1.png",
        "description" => "The iPhone X is a flagship smartphone featuring a bezel-less OLED display, facial recognition technology (Face ID), and impressive performance. It represents a milestone in iPhone design and innovation."
    ],
    [
        "id" => 1,
        "name" => "iPhone 15 Promax",
        "price" => 1500,
        "thumbnail" => "https://cdn.dummyjson.com/products/images/smartphones/iPhone%20X/1.png",
        "description" => "The iPhone X is a flagship smartphone featuring a bezel-less OLED display, facial recognition technology (Face ID), and impressive performance. It represents a milestone in iPhone design and innovation."
    ],
    [
        "id" => 1,
        "name" => "iPhone 15 Promax",
        "price" => 1500,
        "thumbnail" => "https://cdn.dummyjson.com/products/images/smartphones/iPhone%20X/1.png",
        "description" => "The iPhone X is a flagship smartphone featuring a bezel-less OLED display, facial recognition technology (Face ID), and impressive performance. It represents a milestone in iPhone design and innovation."
    ],
    [
        "id" => 1,
        "name" => "iPhone 15 Promax",
        "price" => 1500,
        "thumbnail" => "https://cdn.dummyjson.com/products/images/smartphones/iPhone%20X/1.png",
        "description" => "The iPhone X is a flagship smartphone featuring a bezel-less OLED display, facial recognition technology (Face ID), and impressive performance. It represents a milestone in iPhone design and innovation."
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(30deg, #e0e1dd 20%, #778da9 40%, #e0e1dd 65%, #778da9 90%);

        }

        .margin-left {
            margin-left: 6rem;
        }

        .productscol {
            border: 0.5px solid grey;
            padding: 1rem;
        }

        .productscol h3 {
            font-size: 1rem;
            background: linear-gradient(70deg, #0d1b2a 40%, #1b263b 75%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        header {
            background-color: black;
            opacity: 0.75;
            height: 3rem;
        }

        .nav-na {
            margin-top: 0.25em;
        }

        .deconone {
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <ul class="nav justify-content-end">
            <li class="nav-na">
                <a class="nav-link deconone active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item nav-na">
                <a class="nav-link deconone" href="#">Products</a>
            </li>
            <li class="nav-item nav-na">
                <a class="nav-link deconone" href="#">Products</a>
            </li>
            <li class="nav-item nav-na">
                <a class="nav-link deconone disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </header>
    <div class="container">
        <div class="row justify text-center">
            <div class="col-10 margin-left">
                <div class="row">
                    <?php foreach ($products as $s): ?>
                        <div class="col-3 productscol mb-3 mt-3">
                            <img src="<?php echo $s['thumbnail']; ?>" class="img-fluid" alt="abc" />
                            <h3><?php echo $s['name']; ?></h3>
                            <h3><?php echo $s['price']; ?></h3>
                            <h3><?php echo $s['description']; ?></h3>
                        </div>
                    <?php endforeach ?>
                    <div class="row">
                    </div>
                </div>
            </div>
</body>

</html>