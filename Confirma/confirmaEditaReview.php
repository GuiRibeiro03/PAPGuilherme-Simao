<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET["id"]);
$reviewData=addslashes($_POST["reviewData"]);
$reviewText=addslashes($_POST["reviewTexto"]);
$reviewAutor=addslashes($_POST["reviewAutor"]);
$reviewJogoId=intval($_POST["reviewJogoId"]);
$img=$_FILES['reviewImagemFundoURL']["name"];
$img2=$_FILES['reviewImagemURL']["name"];
$novoNome="../img/wallpapers/".$img;
$novoNome2="../img/wallpapers/".$img2;
copy($_FILES['reviewImagemFundoURL']['tmp_name'],$novoNome);
copy($_FILES['reviewImagemURL']['tmp_name'],$novoNome2);


$sql="UPDATE reviews SET reviewAutor='".$reviewAutor."', reviewTexto='".$reviewText."',reviewJogoId='".$reviewJogoId."', reviewData='".$reviewData."'";

if($img!=''){
    $sql.=", reviewImagemFundoURL='".$novoNome."', reviewImagemURL='".$novoNome2."'";
}

$sql.="where reviewId=".$id;

mysqli_query($con,$sql);
print_r($sql);
header("location: ../backoffice/reviewsBackoffice.php");





