<?php
include_once ("../includes/body.inc.php");

$con=mysqli_connect("localhost", "root","","pap2021gameon");

$userId=intval($_SESSION['id']);
$perfilNome=addslashes($_POST['perfilNome']);
$perfilAvatarURL=$_FILES['perfilAvatarURL']['name'];
$perfilMorada=addslashes($_POST['perfilMorada']);
$perfilEmail=addslashes($_POST['perfilEmail']);
$perfilTele=intval($_POST['perfilTele']);

$novoNome="/img/pessoas/".$perfilAvatarURL;
copy($_FILES['perfilAvatarURL']['tmp_name'].$novoNome);

$sql="insert into perfis(perfilNome, perfilAvatarURL,perfilMorada,perfilTelefone,perfilEmail,perfilUserId) 
values('".$perfilNome."','".$novoNome."','".$perfilMorada."','".$perfilTele."','".$perfilEmail."','".$userId."')";

mysqli_query($con,$sql);
header("location: ../perfilUser.php?id=$userId");