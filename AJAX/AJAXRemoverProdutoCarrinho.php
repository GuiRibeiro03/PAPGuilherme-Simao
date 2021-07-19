<?php
include_once ("../includes/body.inc.php");
$id=intval($_GET['id']);
    unset($_SESSION['carrinho']);
header("location:".$_SERVER['HTTP_REFERER']);
?>