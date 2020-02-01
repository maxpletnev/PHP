<nav>
    <div class="menu">
        <ul>
            <li><a href="index.php" class="active">Главная</a></li>
            <li><a href="catalog.php">Каталог</a></li>
            <li><a href="guestbook.php">Отзывы</a></li>
            <li><a href="gallery.php">Фото</a></li>
            <li><a href="contact.php">Контакты</a></li>
            <?php
            if(isset($_SESSION[login]) && isset($_SESSION[pass])) {
                echo "<li><a href='login.php?action=profile'><u>Личный кабинет</u></a></li>";
                echo "<li><a href='login.php?action=logout'><u>Выйти</u> </a>($_SESSION[login])</li>";
            }else{
                echo "<li><a href='login.php'><u>Войти</u></a></li>";
                echo "<li><a href='reg.php'><u>Регистрация</u></a></li>";
            }
            if(isset($_SESSION[login]) && isset($_SESSION[pass]) && $_SESSION[login] == 'admin') {
            ?>
            <li><a href="../admin/">Админка</a></li>
            <?}?>
        </ul>
    </div>
</nav>