<?php
$con = mysqli_connect("localhost", "root", "", "pap2021gameon");

$id=intval($_GET["id"]);
$noticiaTitulo = addslashes($_POST["noticiaTitulo"]);
$noticiaDesenvolvimento = addslashes($_POST["noticiaDesenvolvimento"]);
$noticiaData = addslashes($_POST["noticiaData"]);
$noticiaImagemFundoURL = $_FILES["noticiaImagemFundoURL"]["name"];


$sql=" UPDATE noticias SET noticiaTitulo='".$noticiaTitulo."' ";

if($noticiaImagemFundoURL!=''){
    $sql.=", noticiaImagemFundoURL='".$noticiaImagemFundoURL."'";
}

$sql.=", noticiaData='".$noticiaData."', noticiaDesenvolvimento='".$noticiaDesenvolvimento."' where noticiaId=".$id;



mysqli_query($con, $sql);
print_r($sql);
//header("location: ../backoffice/NoticiasBackoffice.php");








