<?php
require_once ("../includes/body.inc.php");

$utilizadorId=($_SESSION["id"]);



//********Nao deteta***************************************
$entidadeId=intval($_GET["id"]);
$entidadeTipo=addslashes($_POST["comentarioEntidade"]);
$comentarioTexto=addslashes($_POST["comentarioTexto"]);
$comentarioData=addslashes($_POST["comentarioData"]);

//*********************************************************



$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
echo $sql="insert into comentarios (comentarioData,comentarioTexto,comentarioPerfilId,comentarioEntidade,comentarioEntidadeId ) 
values ('".$comentarioData."','".$comentarioTexto."','".$utilizadorId."','".$entidadeTipo."','".$entidadeId."')";

mysqli_query($con, $sql);
header("location: ../ListaBlog.php?id=".$entidadeId);

?>
