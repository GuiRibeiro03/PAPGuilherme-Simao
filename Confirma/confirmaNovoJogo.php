<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$jogoNome=addslashes($_POST["jogoNome"]);
$jogoSinopse=addslashes($_POST["jogoSinopse"]);
$jogoTrailer=addslashes($_POST["jogoTrailer"]);
$jogoImagemURL=$_FILES["jogoImagemURL"]["name"];
$jogoPreco=intval($_POST["jogoPreco"]);
$jogoempresaId=intval($_POST["jogoEmpresaId"]);
$jogoDestaque=addslashes($_POST["jogoDestaque"]);

echo $sql="insert into jogos (jogoNome,jogoSinopse,jogoTrailer,jogoImagemURL,jogoPreco,jogoEmpresaId, jogoDestaque) values('".$jogoNome."','".$jogoSinopse."','".$jogoTrailer."','".$jogoImagemURL."', '".$jogoPreco."', '".$jogoempresaId."','".$jogoDestaque."')";

mysqli_query($con,$sql);
header("location: ../backoffice/jogosBackoffice.php");
?>



