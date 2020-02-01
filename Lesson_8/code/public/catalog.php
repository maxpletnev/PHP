<?php include_once "../controllers/Product.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Интернет-магазин ноутбуков</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
    <script src="js/jquery.js"></script>
    <script src="js/my.js"></script>
</head>
<body>
<div id="container">
    <? include "../templates/header.php"; ?>
    <div class="leftblock">
        <? include "../templates/menu.php"; ?>
    </div>
    <div class="content">
       <ul class="breadcrumbs">
            <li><a href="index.php">Главная</a></li> <span>&raquo;</span>
            <li>Каталог</li>
        </ul>
        <h1>Каталог товаров</h1>
        <hr>
        <?php
        if(isset($goods)){
            foreach ($goods as $good){?>
                <div class="item">
                    <a href="item.php?id=<?=$good[id]?>"><img src="<?=$good[small_src]?>" alt="<?=$good[name]?>" title="<?=$good[name]?>"></a>
                    <h3 class="item-name"><a href="item.php?id=<?=$good[id]?>"><?=$good[name]?></a></h3>
                    <p class="price"><?=$good[price]?>р.</p>
                    <p class="add-to-basket"><a href="#" onclick="item(<?=$good[id]?>)" title="Добавить в корзину">Купить</a></p>
                </div>
            <?}
        }
        ?>
    </div>
    <footer>
        <? include "../templates/footer.php"; ?>
    </footer>
</div>
</body>
</html>