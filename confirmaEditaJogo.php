<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$jogoNome=addslashes($_POST["jogoNome"]);
$jogoSinopse=addslashes($_POST["jogoSinopse"]);
$jogoPreco=("jogoPreco");
$empresaId=intval("jogoEmpresaId");
$jogoTrailer=addslashes("jogoTrailer");
$id=intval($_GET["id"]);
$img=$_FILES['jogoImagemURL']['name'];
$novoNome="../imagens/".$img;


$sql="UPDATE jogos SET jogoNome='".$jogoNome."', jogoSinopse='".$jogoSinopse."',jogoPreco='".$jogoPreco."',jogoTrailer='".$jogoTrailer."',jogoEmpresaId='".$empresaId."'";
if($img!=''){
    $sql.=", jogoImagemURL='imagens/jogos/".$img."'";
    copy($_FILES['jogoImagemURL']['tmp_name'],$novoNome);
}

$sql.="where jogoId=".$id;
mysqli_query($con,$sql);
header("location: jogosBackoffice.php");





