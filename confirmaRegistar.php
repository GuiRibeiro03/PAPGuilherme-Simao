<?php
include_once("includes/config.inc.php");

$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);

//Variaveis para user
$userName=addslashes($_POST['userName']);
$userPass=addslashes($_POST['password']);
$userPassEncrypt=md5($userPass);
//_____________________________


//Variaveis perfil
$perfilMorada=addslashes($_POST['morada']);
$telefone=intval($_POST['telefone']);
$email=addslashes($_POST['email']);

$perfilAvatar=$_FILES["perfilAvatarURL"]["name"];
$novoNome="img/pessoas/".$perfilAvatar;
copy($_FILES['perfilAvatarURL']['tmp_name'],$novoNome);
//_____________________________




$sql="insert into users(userId,userName,userPassword) values (0,'".$userName."','".$userPassEncrypt."')";
mysqli_query($con,$sql);

$lastId=mysqli_insert_id($con);

$sql2="insert into perfis(perfilNome,perfilAvatarURL,perfilMorada,perfilTelefone,perfilEmail,perfilUserId)
                    values ('".$userName."','".$novoNome."','".$perfilMorada."','".$telefone."',,'".$email."','".$lastId."')";
mysqli_query($con,$sql2);





session_start();
$_SESSION['id']=$lastId;
$_SESSION['nome']=$userName;

error_reporting(E_ALL);

//header("location:".$_SERVER['HTTP_REFERER']);


?>