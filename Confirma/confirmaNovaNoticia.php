<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$noticiaTitulo=addslashes($_POST["noticiaTitulo"]);
$noticiaDesenvolvimento=addslashes($_POST["noticiaDesenvolvimento"]);
$noticiaData=addslashes($_POST["noticiaData"]);
$noticiaImagemFundoURL=$_FILES["noticiaImagemFundoURL"]["name"];
$noticiaImagemURL=$_FILES["noticiaImagemURL"]["name"];
$noticiaEscolha=addslashes($_POST["noticiaEscolha"]);


echo $sql="insert into noticias(noticiaTitulo,noticiaImagemFundoURL,noticiaImagemURL,noticiaData,noticiaDesenvolvimento, noticiaEscolha)
 values('".$noticiaTitulo."','".$noticiaImagemFundoURL."','".$noticiaImagemURL."','".$noticiaData."','".$noticiaDesenvolvimento."','".$noticiaEscolha."')";

mysqli_query($con,$sql);
//header("location: ../backoffice/NoticiasBackoffice.php");
?>



