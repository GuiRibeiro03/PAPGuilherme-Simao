<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$noticiaTitulo=addslashes($_POST["noticiaTitulo"]);
$noticiaDesenvolvimento=addslashes($_POST["noticiaDesenvolvimento"]);
$noticiaData=addslashes($_POST["noticiaData"]);
$jogoImagemFundoURl=$_FILES["jogoImagemFundoURL"]["name"];


echo $sql="insert into noticias (noticiaTitulo,jogoImagemFundoURL,noticiaDatanoticiaDesenvolvimento) values('".$noticiaTitulo."','".$jogoImagemFundoURl."','".$noticiaData."','".$noticiaDesenvolvimento."','".$noticiaData."')";

mysqli_query($con,$sql);
header("location: ../backoffice/NoticiasBackoffice.php");
?>



