<?php
$id=intval($_POST['id']);
session_start();
var_dump($_SESSION['carrinho'], $id);
header("location: ".$_SERVER['HTTP_REFERER']);
?>