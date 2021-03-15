<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$jogoNome=addslashes($_POST["jogoNome"]);
$jogoSinopse=addslashes($_POST["jogoSinopse"]);
$jogoTrailer=addslashes($_POST["jogoTrailer"]);
$jogoImagemURL=$_FILES["jogoImagemURl"]["name"];
$jogoPreco=intval($_POST["jogoPreco"]);
$jogoempresaId=intval($_POST["jogoEmpresaId"]);

echo $sql="insert into jogos (jogoNome,jogoSinopse,jogoTrailer,jogoImagemURl,jogoPreco,jogoEmpresaId) values('".$jogoNome."','".$jogoSinopse."','".$jogoTrailer."','".$jogoImagemURL."', '".$jogoPreco."', '".$jogoempresaId."')";

mysqli_query($con,$sql);
header("location: jogosBackoffice.php");
?>



