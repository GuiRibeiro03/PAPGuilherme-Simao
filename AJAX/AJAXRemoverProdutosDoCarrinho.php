<?php
include_once ("../includes/bodyBase.inc.php");
array_pop($_SESSION['carrinho']);
header("location: ".$_SERVER['HTTP_REFERER']);
?>