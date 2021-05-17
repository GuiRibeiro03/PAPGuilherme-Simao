<?php
$id=intval($_POST['id']);
session_start();
unset($_SESSION['carrinho'],$id);
header("location: ".$_SERVER['HTTP_REFERER']);
?>