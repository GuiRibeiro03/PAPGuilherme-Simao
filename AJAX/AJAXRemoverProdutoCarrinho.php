<?php
$id=intval($_POST['id']);
session_start();
unset($_SESSION['carrinho'],$id);
print_r($_SESSION);
return true;
?>