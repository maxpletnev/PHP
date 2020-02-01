<?php
require_once "../config/database.php";

function getAll($link, $table, $orderby='id'){
    $query = "SELECT * FROM {$table} order by {$orderby} desc";
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    $n = mysqli_num_rows($result);
    $res = array();

    for($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_assoc($result);
        $res[] = $row;
    }

    return $res;
}

function getOne($link, $id, $table){
    $query = sprintf("SELECT * FROM {$table} where id=%d",(int)$id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    $res = mysqli_fetch_assoc($result);

    return $res;
}

function delete($link, $id, $table){
    $id = (int)$id;

    if($id == 0)
        return false;

    $query = sprintf("DELETE FROM {$table} where id='%d'", $id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}


function newProduct($link, $name, $description, $src, $small_src, $price){

    $t = "INSERT INTO goods (name, description, src, small_src, price) VALUES ('%s','%s','%s','%s','%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $name),mysqli_real_escape_string($link, $description),mysqli_real_escape_string($link, $src),mysqli_real_escape_string($link, $small_src),mysqli_real_escape_string($link, $price));

    $result = mysqli_query($link, $query);

    if(!$result){
        die(mysqli_error($link));
    }

    return true;
}

function editProduct($link, $id, $name, $description, $src, $small_src, $price){
    $id = (int)$id;

    $sql = "UPDATE goods SET name='%s',description='%s',src='%s',small_src='%s',price='%s' WHERE id='%d'";

    $query = sprintf($sql, mysqli_real_escape_string($link, $name),mysqli_real_escape_string($link, $description),mysqli_real_escape_string($link, $src),mysqli_real_escape_string($link, $small_src),mysqli_real_escape_string($link, $price),$id);

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}

function newComment($link, $fio, $email, $text){

    $t = "INSERT INTO comment (fio, email, text) VALUES ('%s','%s','%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $fio),mysqli_real_escape_string($link, $email),mysqli_real_escape_string($link, $text));

    $result = mysqli_query($link, $query);

    if(!$result){
        die(mysqli_error($link));
    }else{
        header("Location: ../public/guestbook.php");
    }
}

function newImage($link, $name, $src, $small_src, $size){
    $name = trim($name);

    if ($name=='')
        return False;

    $t = "INSERT INTO images (name, src, small_src, size) VALUES ('%s','%s','%s','%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $name),mysqli_real_escape_string($link, $src),mysqli_real_escape_string($link, $small_src),mysqli_real_escape_string($link, $size));

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return true;
}

function countImages($link, $id, $table){
    $sql = "UPDATE {$table} SET count=count+1 WHERE id='$id'";
    $result = mysqli_query($link, $sql);
}

function newUser($link, $login, $email, $pass){

    $t = "INSERT INTO users (login, email, pass) VALUES ('%s','%s','%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $login),mysqli_real_escape_string($link, $email),mysqli_real_escape_string($link, $pass));

    $result = mysqli_query($link, $query);

    if(!$result){
        die(mysqli_error($link));
    }

    return true;
}

function newTempOrder($link, $id_good, $name, $price, $count, $login=null){

    $t = "INSERT INTO temp_orders (id_good, name, price, count, login) VALUES ('%s','%s','%s','%s','%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $id_good),mysqli_real_escape_string($link, $name),mysqli_real_escape_string($link, $price),mysqli_real_escape_string($link, $count),mysqli_real_escape_string($link, $login));

    $result = mysqli_query($link, $query);

    if(!$result){
        die(mysqli_error($link));
    }

    return true;
}

function editTempOrder($link, $id, $count){
    $id = (int)$id;

    $sql = "UPDATE temp_orders SET count='%d' WHERE id_good='%d'";

    $query = sprintf($sql, mysqli_real_escape_string($link, $count),$id);

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}

function getOneTemp($link, $id, $table){
    $query = sprintf("SELECT * FROM {$table} where id_good=%d",(int)$id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    $res = mysqli_fetch_assoc($result);

    return $res;
}