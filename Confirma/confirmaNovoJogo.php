<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$jogoNome=addslashes($_POST["jogoNome"]);
$jogoSinopse=addslashes($_POST["jogoSinopse"]);
$jogoTrailer=addslashes($_POST["jogoTrailer"]);
$jogoImagemURL=$_FILES["jogoImagemURL"]["name"];
$jogoPreco=intval($_POST["jogoPreco"]);
$jogoGlobalRating=addslashes($_POST['jogoGlobalRating']);
$jogoempresaId=intval($_POST["jogoEmpresaId"]);
$jogoPlataformaId=intval($_POST["jogoPlataformaId"]);
$jogoGeneroId=intval($_POST["jogoGeneroId"]);
$jogoDestaque=addslashes($_POST["jogoDestaque"]);

$novoNome="../img/jogos/".$jogoImagemURL;
copy($_FILES['jogoImagemURL']['tmp_name'],$novoNome);

echo $sql="insert into jogos (jogoNome,jogoSinopse,jogoTrailer,jogoImagemURL,jogoGlobalRating,jogoPreco,jogoEmpresaId, jogoDestaque) 
values('".$jogoNome."','".$jogoSinopse."','".$jogoTrailer."','".$novoNome."','".$jogoGlobalRating."', '".$jogoPreco."', '".$jogoempresaId."','".$jogoDestaque."')";

mysqli_query($con,$sql);

$novoId = mysqli_insert_id($con);

echo $sql3="insert into jogoplataformas (jogoPlataformaPlataformaId,jogoPlataformaJogoId) values('".$jogoPlataformaId."','".$novoId."')";
echo $sql4="insert into jogogeneros (jogoGeneroGeneroId,jogoGeneroJogoId) values('".$jogoGeneroId."','".$novoId."')";

mysqli_query($con,$sql3);
mysqli_query($con,$sql4);

header("location: ../backoffice/jogosBackoffice.php");
?>



