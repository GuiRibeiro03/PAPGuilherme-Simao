<?php
$id=intval($_POST['idPrd']);
session_start();
$produto=array($id=>1);
$cont=0;



foreach ($_SESSION['carrinho'] as $prod){
    // echo $prod[$id];
    foreach ($prod as $key => $value)
        if($key==$id){
            unset($_SESSION['carrinho'][$cont]);
            return true;
        }
    $cont++;
}

print_r($_SESSION['carrinho']);


//header("location:".$_SERVER['HTTP_REFERER']);
?>