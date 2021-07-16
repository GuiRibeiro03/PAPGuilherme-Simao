<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET["id"]);
$jogoGeneroGeneroId=addslashes($_POST["generoId"]);
$jogoPlataformaPlataformaId=addslashes($_POST["plataformaId"]);



$sql="UPDATE jogogeneros SET jogoGeneroGeneroId='".$jogoGeneroGeneroId."', jogoGeneroJogoId='".$id."'";

$sql2="UPDATE jogoplataformas SET jogoPlataformaPlataformaId='".$jogoPlataformaPlataformaId."', jogoPlataformaJogoId='".$id."'";




mysqli_query($con,$sql);
mysqli_query($con,$sql2);

print_r($sql);
print_r($sql2);

header("location: ../backoffice/jogosBackoffice.php");





