<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET["id"]);
$jogoNome=addslashes($_POST["reviewNome"]);
$jogoSinopse=addslashes($_POST["reviewSinopse"]);
$jogoPreco=addslashes($_POST["reviewTitulo"]);
$empresaId=intval($_POST["reviewImagemURL"]);
$jogoTrailer=addslashes($_POST["jogoPontosPositivos"]);
$jogoTrailer=addslashes($_POST["jogoPontosNegativos"]);
$img=$_FILES['jogoImagemURL']["name"];
$novoNome="img/jogos/".$img;


$sql="UPDATE jogos SET jogoNome='".$jogoNome."', jogoSinopse='".$jogoSinopse."', jogoTrailer='".$jogoTrailer."',jogoPreco='".$jogoPreco."', jogoEmpresaId='".$empresaId."'";

if($img!=''){
    $sql.=", jogoImagemURL='".$img."'";
}

$sql.="where jogoId=".$id;

mysqli_query($con,$sql);
print_r($sql);
header("location: jogosBackoffice.php");





