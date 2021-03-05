<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET["id"]);
$jogoNome=addslashes($_POST["jogoNome"]);
$jogoSinopse=addslashes($_POST["jogoSinopse"]);
$jogoPreco=addslashes($_POST["jogoPreco"]);
$empresaId=intval($_POST["jogoEmpresaId"]);
$jogoTrailer=addslashes($_POST["jogoTrailer"]);
$img=$_FILES['jogoImagemURL']["name"];
$novoNome="img/jogos/".$img;


$sql="UPDATE jogos SET jogoNome='".$jogoNome."', jogoSinopse='".$jogoSinopse."', jogoTrailer='".$jogoTrailer."',jogoPreco='".$jogoPreco."', jogoEmpresaId='".$empresaId."'";

if($img!=''){
    $sql.=", jogoImageURL='".$img."'";
}

$sql.="where jogoId=".$id;

mysqli_query($con,$sql);
print_r($sql);
header("location: jogosBackoffice.php");





