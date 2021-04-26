<?php
$id = intval($_POST['id']);

session_start();
$lista="(0";
if(isset($_SESSION['carrinho'])){
    foreach ($_SESSION['carrinho'] as $produto){
        $lista.=",".$produto;
    }
}
$lista.=")";

if(($key = array_search('produtoId', $lista)) !== false){
   unset($lista[$key]);
}


header("location: ".$_SERVER['HTTP_REFERER']);
?>



