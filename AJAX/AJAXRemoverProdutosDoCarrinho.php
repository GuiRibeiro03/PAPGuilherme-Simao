<?php
include_once ("../includes/bodyBase.inc.php");
$id=intval($_GET['id']);
array_pop($_SESSION['carrinho']);
header("location: ".$_SERVER['HTTP_REFERER']);
?>