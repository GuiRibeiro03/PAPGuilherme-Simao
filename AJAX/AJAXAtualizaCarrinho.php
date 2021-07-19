<?php
$id=intval($_POST['idPrd']);
$quant=intval($_POST['quant']);
session_start();
$produto=array($id=>1);
$cont=0;
foreach ($_SESSION['carrinho'] as $prod){
    // echo $prod[$id];
    foreach ($prod as $key => $value)
        if($key==$id){
            $_SESSION['carrinho'][$cont][$id]=$quant;
            $encontra=true;
        }
    $cont++;
}

return true;

?>