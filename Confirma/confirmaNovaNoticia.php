<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$noticiaTitulo=addslashes($_POST["noticiaTitulo"]);
$noticiaDesenvolvimento=addslashes($_POST["noticiaDesenvolvimento"]);
$noticiaData=addslashes($_POST["noticiaData"]);
$noticiaImagemFundoURL=$_FILES["noticiaImagemFundoURL"]["name"];


echo $sql="insert into noticias(noticiaTitulo,noticiaImagemFundoURL,noticiaData,noticiaDesenvolvimento) values('".$noticiaTitulo."','".$noticiaImagemFundoURL."','".$noticiaDesenvolvimento."','".$noticiaData."')";

mysqli_query($con,$sql);
print_r($sql);
header("location: ../backoffice/NoticiasBackoffice.php");
?>



