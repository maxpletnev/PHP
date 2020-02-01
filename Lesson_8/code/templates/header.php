<header>
    <div class="logotip">
        <a href='index.html'><img src="img/logotip.png" alt="Логотип сайта" title="Магазин ноутбуков"></a>
    </div>
</header>
<?
    if(isset($_SESSION[basket])) {
        echo "<h3 class=\"basket\">Корзина: <span class=\"basket-items\"><a href='basket.php'><u>Просмотреть товары</u></a></span></h3>";
    }else{
        echo "<h3 class=\"basket\">Корзина: <span class=\"basket-items\">Корзина пуста</span></h3>";
    }
?>

