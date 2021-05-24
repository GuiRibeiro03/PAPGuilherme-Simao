<?php

$id=intval($_POST['utilizador']);
$nome=addslashes($_POST['userName']);
$pwd=addslashes($_POST['password']);

$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from users where userId=".$id;
$res=mysqli_query($con, $sql);
$dados=mysqli_fetch_array($res);
session_start();

if($nome===$dados['userName'] and $pwd===$dados['userPassword'] and $dados["userType"] == "ativo"){
    session_start();
    $_SESSION['id']=$dados['userId'];
    $_SESSION['nome']=$dados['userName'];
    header("location: ".$_SERVER['HTTP_REFERER']);
}
?>
