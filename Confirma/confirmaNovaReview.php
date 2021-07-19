<?php
$con = mysqli_connect("localhost", "root", "", "pap2021gameon");


$reviewTexto = addslashes($_POST["reviewTexto"]);
$reviewRating= addslashes($_POST["reviewGlobalRating"]);
$reviewImagemURL = $_FILES["reviewImagemURL"]["name"];
$reviewJogoId = intval($_POST["reviewJogoId"]);
$reviewAutor = addslashes($_SESSION['nome']);
$novoNome="../img/wallpapers/".$reviewImagemURL;
copy($_FILES['reviewImagemURL']['tmp_name'],$novoNome);

echo $sql = "insert into reviews (reviewData,reviewAutor,reviewTexto,reviewJogoId,reviewImagemURL,reviewGlobalRating) 
values(NOW(),'" . $reviewAutor . "','" . $reviewTexto . "','" . $reviewJogoId  . "','" . $novoNome . "','" . $reviewRating . "')";

mysqli_query($con, $sql);
header("location: ../backoffice/reviewsBackoffice.php");





