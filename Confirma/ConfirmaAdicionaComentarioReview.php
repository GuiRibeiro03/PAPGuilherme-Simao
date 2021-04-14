<?php
include_once ("../includes/body.inc.php");

$utilizadorId=intval($_SESSION["id"]);
$entidadeTipo=addslashes($_POST['comentarioEntidade']);
$entidadeId=intval($_GET['entidadeId']);
$comentarioTexto=addslashes($_POST['comentarioTexto']);
$comentarioData=addslashes($_POST['comentarioData']);


$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$sql="insert into comentarios (comentarioData,comentarioTexto,comentarioPerfilId,comentarioEntidade,comentarioEntidadeId ) 
values ('".$comentarioData."','".$comentarioTexto."','".$utilizadorId."','".$entidadeTipo."','".$entidadeId."')";
print_r($sql);
mysqli_query($con, $sql);


?>
