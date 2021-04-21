<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$noticiaTitulo=addslashes($_POST["noticiaTitulo"]);
$noticiaDesenvolvimento=addslashes($_POST["noticiaDesenvolvimento"]);
$noticiaData=addslashes($_POST["noticiaData"]);
$noticiaImagemFundoURL=$_FILES["noticiaImagemFundoURL"]["name"];
$noticiaImagemURL=$_FILES["noticiaImagemURL"]["name"];
$noticiaEscolha=addslashes($_POST["noticiaEscolha"]);

$novoNome="../img/wallpapers/".$noticiaImagemFundoURL;
copy($_FILES['noticiaImagemFundoURL']['tmp_name'],$novoNome);

$novoNome2="../img/wallpapers/".$noticiaImagemURL;
copy($_FILES['noticiaImagemURL']['tmp_name'],$novoNome2);

echo $sql="insert into noticias(noticiaTitulo,noticiaImagemFundoURL,noticiaImagemURL,noticiaData,noticiaDesenvolvimento, noticiaEscolha)
 values('".$noticiaTitulo."','".$novoNome."','".$novoNome2."','".$noticiaData."','".$noticiaDesenvolvimento."','".$noticiaEscolha."')";


mysqli_query($con,$sql);
header("location: ../backoffice/NoticiasBackoffice.php");
?>



