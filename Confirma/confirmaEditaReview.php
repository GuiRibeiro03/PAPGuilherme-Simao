<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET["id"]);
$reviewData=addslashes($_POST["reviewData"]);
$reviewRating= addslashes($_POST["jogoGlobalRating"]);
$reviewText=addslashes($_POST["reviewTexto"]);
$reviewAutor=addslashes($_POST["reviewAutor"]);
$reviewJogoId=intval($_POST["reviewJogoId"]);
$img=$_FILES["reviewImagemURL"]["name"];
$novoNome="../img/wallpapers/".$img;



$sql="UPDATE reviews SET reviewAutor='".$reviewAutor."', reviewTexto='".$reviewText."',reviewJogoId='".$reviewJogoId."', reviewData='".$reviewData."'";

if($img!=''){
    $sql.=", reviewImagemURL='".$novoNome."' ";
    copy($_FILES['reviewImagemURL']['tmp_name'],$novoNome);
}

$sql.=", jogoGlobalRating='".$reviewRating."' where reviewId=".$id;

mysqli_query($con,$sql);
print_r($sql);
header("location: ../backoffice/reviewsBackoffice.php");





