<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$jogoNome=addslashes($_POST["jogoNome"]);
$jogoSinopse=addslashes($_POST["jogoSinopse"]);
$jogoTrailer=addslashes($_POST["jogoTrailer"]);
$jogoImagemURL=$_FILES["jogoImagemURL"]["name"];
$jogoPreco=intval($_POST["jogoPreco"]);
$jogoempresaId=intval($_POST["jogoEmpresaId"]);
$jogoDestaque=addslashes($_POST["jogoDestaque"]);

$novoNome="../img/jogos/".$jogoImagemURL;
copy($_FILES['jogoImagemURL']['tmp_name'],$novoNome);

echo $sql="insert into jogos (jogoNome,jogoSinopse,jogoTrailer,jogoImagemURL,jogoPreco,jogoEmpresaId, jogoDestaque) 
values('".$jogoNome."','".$jogoSinopse."','".$jogoTrailer."','".$novoNome."', '".$jogoPreco."', '".$jogoempresaId."','".$jogoDestaque."')";

mysqli_query($con,$sql);
header("location: ../backoffice/jogosBackoffice.php");
?>



