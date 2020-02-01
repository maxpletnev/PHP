<?php include_once "../controllers/Basket.php"; ?>
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
        <h1>Корзина</h1>
        <hr>

        <?php
        if(isset($goodsTemp)){
            $i=0;
            echo " <table style='width: 99%' border=\"1\"><tr><td>Наименование товара</td><td>Цена</td><td>Количество</td></tr>";
            foreach ($goodsTemp as $good){?>
                    <tr>
                        <td><h3 class="item-name"><a href="item.php?id=<?=$good[id]?>"><?=$good[name]?></a></h3></td>
                        <td><?=$good[price]?>р.</td>
                        <td><?=$good[count]?></td>
                    </tr>
            <?
            $i++;
            $price_res += $good[price];
            $count_res += $good[count];
            }

            echo "<tr><td>Количество наименований: $i</td><td>Общая сумма: $price_res</td><td>Количество товаров: $count_res</td></tr></table>";

            if(isset($_SESSION[login]) && isset($_SESSION[pass])){
                echo "<p><a href='basket.php?action=order'><b><u>Оформить заказ</u></b></a></p>";
            }else{
                echo "<p><a href='reg.php'><b><u>Вы должны зарегистрироваться или войти чтобы офорить заказ</u></b></a></p>";
            }

            echo "<p><a href='basket.php?action=clear'><u>Удалить товары из корзины</u></a></p>";
        }
        ?>
    </div>
    <footer>
        <? include "../templates/footer.php"; ?>
    </footer>
</div>
</body>
</html>