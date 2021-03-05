<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET["id"]);
$jogoNome=addslashes($_POST["jogoNome"]);
$jogoSinopse=addslashes($_POST["jogoSinopse"]);
$jogoPreco=("jogoPreco");
$empresaId=intval("jogoEmpresaId");
$jogoTrailer=addslashes("jogoTrailer");
$img=$_FILES['jogoImagemURL']["name"];
$novoNome="img/jogos/".$img;


$sql="UPDATE jogos SET jogoNome='".$jogoNome."', jogoSinopse='".$jogoSinopse."',jogoTrailer='".$jogoTrailer."',jogoPreco='".$jogoPreco."', jogoEmpresaId='".$empresaId."'";

if($img!=''){
    $sql.=", jogosImagemURL='$novoNome'";
}

$sql.="where jogoId=".$id;

mysqli_query($con,$sql);
print_r(error_get_last());
header("location: jogosBackoffice.php");





