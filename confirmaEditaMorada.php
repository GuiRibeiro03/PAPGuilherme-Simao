<?php
include_once ("includes/config.inc.php");
session_start();
$con=mysqli_connect(HOST,USER, PASSWORD,DATABASE);
$perfilId=intval($_SESSION['id']);
$id=intval($_GET['id']);

$moradaTexto=addslashes($_POST['moradaTexto']);
$moradaTelefone=addslashes($_POST['moradaTelefone']);


$sql="update moradas set moradaTexto='".$moradaTexto."', moradaPerfilId='".$perfilId."', moradaTelefone= '".$moradaTelefone."' where moradaId=".$id;

mysqli_query($con,$sql);
print_r($sql);

header("Location: perfilUser.php?id=".$perfilId);

?>