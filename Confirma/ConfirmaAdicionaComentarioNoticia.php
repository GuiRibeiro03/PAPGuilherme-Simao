<?php
include_once ("../includes/body.inc.php");

$utilizadorId=intval($_SESSION["id"]);

$entidadeTipo=addslashes($_POST['comentarioEntidade']);
$entidadeId=intval($_GET['id']);
$comentarioTexto=addslashes($_POST['comentarioTexto']);
$comentarioData=$_POST['comentarioData'];


$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
echo $sql="insert into comentarios (comentarioData,comentarioTexto,comentarioPerfilId,comentarioEntidade,comentarioEntidadeId ) 
values ('".$comentarioData."','".$comentarioTexto."','".$utilizadorId."','".$entidadeTipo."','".$entidadeId."')";

mysqli_query($con, $sql);


?>