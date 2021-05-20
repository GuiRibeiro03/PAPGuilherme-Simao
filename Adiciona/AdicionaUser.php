<?php
include_once ("../includes/config.inc.php");

$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);

$userName=addslashes($_POST['userName']);
$userPass=addslashes($_POST['password']);

$sql="insert into users(userId,userName,userPassword) values (0,'".$userName."','".$userPass."')";
mysqli_query($con,$sql);

session_start();
$_SESSION['id']=mysqli_insert_id($sql);
$_SESSION['nome']=$userName;


header("location: ../Adiciona/AdicionaPerfil.php");


?>