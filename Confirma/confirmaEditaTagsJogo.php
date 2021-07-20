<?php
include_once ("../includes/config.inc.php");
$con = mysqli_connect(HOST, USER,PASSWORD,DATABASE);

$id=intval($_GET["id"]);
$jogoGeneroGeneroId=addslashes($_POST["generoId"]);
$jogoPlataformaPlataformaId=addslashes($_POST["plataformaId"]);


$sql="UPDATE jogogeneros,jogoplataformas
SET jogoGeneroGeneroId='".$jogoGeneroGeneroId."', jogoGeneroJogoId='".$id."',
 jogoPlataformaPlataformaId='".$jogoPlataformaPlataformaId."', jogoPlataformaJogoId='".$id."'
WHERE jogoGeneroJogoId=".$id." AND jogoPlataformaJogoId=".$id;

mysqli_query($con,$sql);


if(mysqli_affected_rows($con)==0){

$sql2="insert into jogogeneros (jogoGeneroGeneroId,jogoGeneroJogoId)  values('".$jogoGeneroGeneroId."','".$id."');
    insert into jogoplataformas (jogoPlataformaPlataformaId,jogoPlataformaJogoId) values('".$jogoPlataformaPlataformaId."','".$id."');";

    mysqli_query($con,$sql2);

}




header("location: ../backoffice/jogosBackoffice.php");





