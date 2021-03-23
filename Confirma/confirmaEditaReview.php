<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET["id"]);
$reviewData=addslashes($_POST["reviewData"]);
$reviewText=addslashes($_POST["reviewTexto"]);
$reviewAutor=addslashes($_POST["reviewAutor"]);
$reviewJogoId=intval($_POST["reviewJogoId"]);
$img=$_FILES['reviewImagemURL']["name"];
$novoNome="../img/".$img;


$sql="UPDATE reviews SET reviewAutor='".$reviewAutor."', reviewTexto='".$reviewText."',reviewJogoId='".$reviewJogoId."'";

if($img!=''){
    $sql.=", reviewImagemURL='".$novoNome."'";
}

$sql.="where reviewId=".$id;

mysqli_query($con,$sql);
print_r($sql);
header("location: ../backoffice/reviewsBackoffice.php");





