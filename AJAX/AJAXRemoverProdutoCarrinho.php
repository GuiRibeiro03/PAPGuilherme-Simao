<?php
include_once ("../includes/body.inc.php");
$id=intval($_GET['id']);
$array=$_SESSION['carrinho'];



unset($_SESSION['carrinho']);
$_SESSION['carrinho'][0][0]=-1;
$teste=array(0 => 0);
array_push($_SESSION['carrinho'],$teste);


header("location:".$_SERVER['HTTP_REFERER']);
?>