<?php
include_once ("../includes/config.inc.php");
$con = mysqli_connect(HOST, USER,PASSWORD,DATABASE);

$id=intval($_GET["id"]);
$jogoGeneroGeneroId=addslashes($_POST["generoId"]);
$jogoPlataformaPlataformaId=addslashes($_POST["plataformaId"]);



$sql="UPDATE jogogeneros,jogoplataformas SET jogoGeneroGeneroId='".$jogoGeneroGeneroId."', jogoGeneroJogoId='".$id."',
jogoPlataformaPlataformaId='".$jogoPlataformaPlataformaId."', jogoPlataformaJogoId='".$id."' where jogoPlataformaJogoId=$id AND jogoGeneroJogoId=$id";

mysqli_query($con,$sql);

print_r($sql);

header("location: ../backoffice/jogosBackoffice.php");





