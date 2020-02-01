<?php
include_once "../models/Model.php";
if($_GET[id]){
    $id= $_GET[id];
    delete($link, $id,'goods');
    //надо еще удалять картинки
    header("Location: ../admin/index.php");
}