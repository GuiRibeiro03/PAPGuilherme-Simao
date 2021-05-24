<?php
include_once("includes/config.inc.php");

$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);

$userName=addslashes($_POST['userName']);
$userPass=addslashes($_POST['password']);
$userAvatar=$_FILES['perfilAvatarURL']['name'];
$novoNome="img/pessoas/".$userAvatar;
copy($_FILES['perfilAvatarURL']['tmp_name'],$novoNome);

$sql="insert into users(userId,userName,userPassword) values (0,'".$userName."','".$userPass."')";
mysqli_query($con,$sql);
$lastId=mysqli_insert_id($con);

$sql="insert into perfis(perfilId,perfilNome,perfilAvatarURL,perfilUserId) values (0,'".$userName."','".$novoNome."','".$lastId."')";
mysqli_query($con,$sql);

session_start();
$_SESSION['id']=$lastId;
$_SESSION['nome']=$userName;

header("location: ".$_SERVER['HTTP_REFERER']);


?>