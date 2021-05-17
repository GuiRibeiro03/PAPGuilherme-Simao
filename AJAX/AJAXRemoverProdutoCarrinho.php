<?php
$id=intval($_POST['id']);
session_start();
unset($_SESSION['carrinho']);
header("location: ".$_SERVER['HTTP_REFERER']);
?>