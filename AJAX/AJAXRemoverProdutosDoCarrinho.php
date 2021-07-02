<?php
include_once ("../includes/bodyBase.inc.php");
$id=intval($_GET['id']);
$array=$_SESSION['carrinho'];

foreach (array_keys($array, $id) as $key) {
    unset($array[$key]);
}

header("location: ".$_SERVER['HTTP_REFERER']);
?>