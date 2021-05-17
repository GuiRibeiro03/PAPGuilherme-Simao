<?php

$id=intval($_POST['utilizador']);
$nome=addslashes($_POST['userName']);
$pwd=addslashes($_POST['userPassword']);

$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from users where userId=".$id;
$res=mysqli_query($con, $sql);
$dados=mysqli_fetch_array($res);
session_start();

if($nome===$dados['userName'] and $pwd===$dados['userPassword'] and $dados["userType"] == "ativo"){
    session_start();
    $_SESSION['id']=$dados['userId'];
    $_SESSION['nome']=$dados['userName'];
}/*elseif($nome===$dados['userNome'] and $pwd===$dados['userPassword'] and $dados["userType"] == "inativo"){
    $verificacao='sim';
    header("location: login.php?message");
}*/



header("location: ".$_SERVER['HTTP_REFERER']);
?>
