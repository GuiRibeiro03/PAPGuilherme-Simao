<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET["id"]);
$reviewNome=addslashes($_POST["reviewNome"]);
$reviewSinopse=addslashes($_POST["reviewSinopse"]);
$reviewTitulo=addslashes($_POST["reviewTitulo"]);
$reviewCapa=intval($_POST["reviewImagemURL"]);
$reviewPP=addslashes($_POST["jogoPontosPositivos"]);
$reviewPN=addslashes($_POST["jogoPontosNegativos"]);
$img=$_FILES['jogoImagemURL']["name"];
$novoNome="../img/jogos/".$img;


$sql="UPDATE reviews SET reviewNome='".$reviewNome."', reviewTexto='".$reviewSinopse."', reviewTitulo='".$reviewTitulo."'";

if($img!=''){
    $sql.=", reviewImagemURL='".$img."'";
}

$sql.="where jogoId=".$id;

mysqli_query($con,$sql);
print_r($sql);
header("location: ../backoffice/reviewsBackoffice.php");





