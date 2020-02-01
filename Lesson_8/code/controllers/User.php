<?php
session_start();
include "../models/Model.php";

if(isset($_POST[submit])){
    $login = trim(strip_tags($_POST[login]));

    $user = getAll($link, 'users');

    if(strtolower($login) == 'admin'){
        exit("Логин админа нельзя зарегистрировать!");
    }

    foreach ($user as $item) {
        if($login == $item[login]){
            exit("Такой уже логин есть!");
        }
    }

    if (filter_var($_POST[email], FILTER_VALIDATE_EMAIL)) {
        $email = trim(strip_tags($_POST[email]));
    }
    $pass = trim(strip_tags($_POST[pass]));

    newUser($link, $login, $email, md5($pass));

    $message = "Вы зарегистрированы!";

}

if(isset($_POST[enter])){
    $login = trim(strip_tags($_POST[login]));
    $pass = trim(strip_tags($_POST[pass]));

    $user = getAll($link, 'users');
    foreach ($user as $item) {
        if($login == $item[login] and md5($pass) == $item[pass]){
            $message = "Вы вошли!";
            $_SESSION[login] = $login;
            $_SESSION[pass] = $pass;
            header("Location: login.php");
        }else{
            $message = "Не правильно ввели данные!";
        }
    }
}

if($_GET[action] == 'logout'){
    unset($_SESSION['login']);
    unset($_SESSION['pass']);
    session_destroy();
    header('Location: index.php');
}