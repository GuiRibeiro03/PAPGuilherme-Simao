<?php
$id=intval($_POST['idPrd']);
session_start();
$produto=array($id=>1);
$encontra=false;
$cont=0;
foreach ($_SESSION['carrinho'] as $prod){
    // echo $prod[$id];
    foreach ($prod as $key => $value)
        if($key==$id){
            $_SESSION['carrinho'][$cont][$id]++;
            $encontra=true;
        }
    $cont++;
}

if(!$encontra)
    array_push($_SESSION['carrinho'],$produto);
return true;

?>