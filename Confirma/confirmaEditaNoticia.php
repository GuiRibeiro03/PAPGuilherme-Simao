<?php
$con = mysqli_connect("localhost", "root", "", "pap2021gameon");

$id=intval($_GET["id"]);
$noticiaTitulo = addslashes($_POST["noticiaTitulo"]);
$noticiaDesenvolvimento = addslashes($_POST["noticiaDesenvolvimento"]);
$noticiaData = addslashes($_POST["noticiaData"]);
$noticiaImagemFundoURL = $_FILES["noticiaImagemFundoURL"]["name"];
$noticiaImagemURL = $_FILES["noticiaImagemURL"]["name"];
$novoNome="../img/wallpapers/".$noticiaImagemFundoURL;
$novoNome2="../img/wallpapers/".$noticiaImagemURL;

$sql=" UPDATE noticias SET noticiaTitulo='".$noticiaTitulo."' ";

if($noticiaImagemFundoURL!=''){
    $sql.=", noticiaImagemFundoURL='".$noticiaImagemFundoURL."', noticiaImagemURL='".$noticiaImagemURL."'";
    copy($_FILES['noticiaImagemFundoURL']['tmp_name'],$novoNome);
}
if($noticiaImagemURL!=''){
    $sql.=", noticiaImagemURL='".$noticiaImagemURL."'";
    copy($_FILES['noticiaImagemURL']['tmp_name'],$novoNome2);
}

$sql.=", noticiaData='".$noticiaData."', noticiaDesenvolvimento='".$noticiaDesenvolvimento."' where noticiaId=".$id;



mysqli_query($con, $sql);
print_r($sql);
header("location: ../backoffice/NoticiasBackoffice.php");








