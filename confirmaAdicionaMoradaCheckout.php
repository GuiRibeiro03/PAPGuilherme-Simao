<?php
include_once("includes/config.inc.php");

$con=mysqli_connect(HOST,USER, PASSWORD,DATABASE);

$perfilId=intval($_GET['id']);
$moradaTexto=addslashes($_POST['moradaTexto']);
$moradaTelefone=addslashes($_POST['moradaTelefone']);


$sql="insert into moradas(moradaTexto,moradaTelefone,moradaPerfilId) values('".$moradaTexto."','".$moradaTelefone."','".$perfilId."')";
mysqli_query($con,$sql);

print_r($sql);

header("Location: checkout2.php");

?>




