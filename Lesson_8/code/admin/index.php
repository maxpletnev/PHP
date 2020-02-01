<?php include_once "../models/Model.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Админка</title>
    <link rel="stylesheet" href="../public/css/styles.css" type="text/css" media="all">
</head>
<body>
<div id="container">
    <?php
    if(isset($_SESSION[login]) && isset($_SESSION[pass]) && $_SESSION[login] == 'admin') {
    ?>
    <div class="leftblock">
        <nav>
            <div class="menu">
                <ul>
                    <li><a href="../public/index.php" class="active">Сайт</a></li>
                    <li><a href="index.php" class="active">Главная</a></li>
                    <li><a href="add_goods.php">Добавить товар</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="content">
    <h1>Админка</h1>
<?
    $goods = getAll($link, 'goods');
    if ($goods) {
        foreach ($goods as $good) {
            ?>
            <div class="item">
                <img src="../public/<?= $good[small_src] ?>" alt="<?= $good[name] ?>" title="<?= $good[name] ?>">
                <h3 class="item-name"><?= $good[name] ?></h3>
                <p class="add-to-basket"><a href="edit_goods.php?id=<?= $good[id] ?>" title="Редактировать">Редактировать</a>
                </p><br>
                <p class="add-to-basket"><a href="delete_goods.php?id=<?= $good[id] ?>" title="Удалить">Удалить</a></p>
            </div>
        <?
        }
    }
}else{
    echo "Вы не вошли или вы не Админ!";
}
?>
    </div>
</div>
</body>
</html>
