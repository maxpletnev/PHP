<?php include_once "../controllers/Image.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Фотогаллерея</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
</head>
<body>
<div id="container">
    <? include "../templates/header.php"; ?>
    <div class="leftblock">
        <? include "../templates/menu.php"; ?>
    </div>
    <div class="content">
    <h1>Фотогаллерея</h1>
    <?php
    echo $message;
    if(isset($images)){
        $k=1;
        echo "<table><tr>";
        foreach ($images as $img){
            echo "<td align='center'>
                <a href='gallery-show.php?id={$img[id]}' target='_blank'><img src='{$img[small_src]}' width='250' height='150'></a>
                <br>{$img[name]}
                <br><i>Размер: {$img[size]} байт</i>
                <br>Количество просмотров: <b>{$img[count]}</b> 
            </td>";
            if($k%COLS==0){
                echo "</tr><tr>";
            }
            $k++;
        }
        echo "</table>";
    }
    ?>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <p><strong>Загрузите картинку в формате JPEG, PNG или GIF</strong></p>
        <p><input type="file" name="img" accept="image/jpeg,image/png,image/gif" required></p>
        <p><input type="submit" name="submit"></p>
    </form>
    </div>
    <footer>
        <? include "../templates/footer.php"; ?>
    </footer>
</div>
</body>
</html>
