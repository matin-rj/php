<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Document</title>
</head>
<body>
     <header>
       <?php include "header.php"?>
    </header>
    <section>
        <div class="category-title">
            <h3>Products Category</h3>
        </div>
        <div class="category">
            <a href="products/products_category.php?type=hijab">
                <div>
                    <p>English book</p>
                    <img src="img/books.png" alt="book">
                </div>
            </a>
            <a href="products/products_category.php?type=watch">
                <div>
                    <p>persian book</p>
                    <img src="img/books.png" alt="book">
                </div>
            </a>
            <a href="products/products_category.php?type=footwear">
                <div>
                    <p>padcast</p>
                    <img src="img/books.png" alt="book">
                </div>
            </a>
        </div>
    </section>
</body>
</html>