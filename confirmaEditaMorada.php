<?php
include_once ("includes/config.inc.php");
$con=mysqli_connect(HOST,USER, PASSWORD,DATABASE);
$perfilId=intval($_GET['id2']);
$id=intval($_GET['id']);

$moradaTexto=addslashes($_POST['moradaTexto']);
$moradaTelefone=addslashes($_POST['moradaTelefone']);


$sql="update morada set moradaTexto='".$moradaTexto."',moradaTelefone= '".$moradaTelefone."', moradaPerfilId='".$perfilId."' where moradaId=".$id;

mysqli_query($con,$sql);

//header("Location: perfilUser.php?id=".$perfilId);

?>