<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET["id"]);
$reviewData=addslashes($_POST["reviewData"]);
$reviewText=addslashes($_POST["reviewTexto"]);
$reviewAutor=addslashes($_POST["reviewAutor"]);
$reviewJogoId=intval($_POST["reviewJogoId"]);
$img2=$_FILES['reviewImagemURL']["name"];
$novoNome2="img/wallpapers/".$img2;




$sql="UPDATE reviews SET reviewAutor='".$reviewAutor."', reviewTexto='".$reviewText."',reviewJogoId='".$reviewJogoId."', reviewData='".$reviewData."'";

if($img2!=''){
    $sql.=", reviewImagemURL='".$novoNome2."'";
    copy($_FILES['reviewImagemURL']['name'],$novoNome2);
}

$sql.="where reviewId=".$id;

mysqli_query($con,$sql);
print_r($sql);
header("location: ../backoffice/reviewsBackoffice.php");





