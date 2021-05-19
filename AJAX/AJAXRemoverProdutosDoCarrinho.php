<?php
$id=intval($_POST['id']);
session_start();
array_pop($_SESSION['carrinho'], $id);
header("location: ".$_SERVER['HTTP_REFERER']);
?>