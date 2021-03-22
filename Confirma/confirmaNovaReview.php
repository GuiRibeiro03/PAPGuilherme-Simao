<?php
$con = mysqli_connect("localhost", "root", "", "pap2021gameon");


$reviewTexto = addslashes($_POST["reviewTexto"]);
$reviewData= addslashes($_POST["reviewData"]);
$reviewImagemURL = $_FILES["reviewImagemURL"]["name"];
$reviewJogoId = intval($_POST["reviewJogoId"]);
$reviewAutor = intval($_POST["reviewAutor"]);

echo $sql = "insert into reviews (jogoNome,jogoSinopse,jogoTrailer,jogoImagemURL,jogoPreco,jogoEmpresaId, jogoDestaque) 
values('" . $jogoNome . "','" . $jogoSinopse . "','" . $jogoTrailer . "','" . $jogoImagemURL . "', '" . $jogoPreco . "', '" . $jogoempresaId . "','" . $jogoDestaque . "')";

mysqli_query($con, $sql);
header("location: ../backoffice/jogosBackoffice.php");





