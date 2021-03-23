<?php
$con = mysqli_connect("localhost", "root", "", "pap2021gameon");


$reviewTexto = addslashes($_POST["reviewTexto"]);
$reviewData= addslashes($_POST["reviewData"]);
$reviewImagemURL = $_FILES["reviewImagemURL"]["name"];
$reviewJogoId = intval($_POST["reviewJogoId"]);
$reviewAutor = intval($_POST["reviewAutor"]);
$novoNome="../img/wallpapers/".$reviewImagemURL;
copy($_FILES['reviewImagemURL']['tmp_name'],$novoNome);

echo $sql = "insert into reviews (reviewData,reviewAutor,reviewTexto,reviewJogoId,reviewImagemURL) 
values('" . $reviewData . "','" . $reviewAutor . "','" . $reviewTexto . "','" . $reviewJogoId  . "','" . $novoNome . "')";

mysqli_query($con, $sql);
header("location: ../backoffice/reviewsBackoffice.php");





