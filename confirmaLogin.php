<?php

$id=intval($_POST['utilizador']);


$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from users where userId=".$id;
$res=mysqli_query($con, $sql);
$dados=mysqli_fetch_array($res);
session_start();
$_SESSION['id']=$dados['userId'];
$_SESSION['nome']=$dados['userNome'];


header("location: ".$_SERVER['HTTP_REFERER']);
?>
