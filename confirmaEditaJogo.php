<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET["id"]);
$jogoNome=addslashes($_POST["jogoNome"]);
$jogoSinopse=addslashes($_POST["jogoSinopse"]);
$jogoPreco=("jogoPreco");
$empresaId=intval("jogoEmpresaId");
$jogoTrailer=addslashes("jogoTrailer");
$img=$_FILES['jogoImagemURL']["name"];


$sql="UPDATE jogos  set jogoNome='".$jogoNome."', jogoSinopse='".$jogoSinopse."',jogoTrailer='".$jogoTrailer."',jogoPreco='".$jogoPreco."', jogoEmpresaId='".$empresaId."'  ";
if($img!=''){
    $sql.=", jogoImagemURL='img/jogos/".$img."'";
}
$sql.=" where jogoId=".$id;

mysqli_query($con,$sql);
header("location: jogosBackoffice.php");





