<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");
session_start();
$prodNome=addslashes($_POST["produtoNome"]);
$prodPreco=addslashes($_POST["produtoPreco"]);
$prodDesc=addslashes($_POST["produtoDescricao"]);
$perfilId= $_SESSION['perfilId'];
$prodImagem=$_FILES["produtoImagemURL"]["name"];
$novoNome="../img/produtos/".$prodImagem;
copy($_FILES['produtoImagemURL']['tmp_name'],$novoNome);


$sql="insert into produtos(produtoNome,produtoDescricao,produtoImagemURL,produtoPreco,produtoTipo)
 values('".$prodNome."', '".$prodDesc."','".$novoNome."','".$prodPreco."','outlet') ";
mysqli_query($con,$sql);

$lastid = mysqli_insert_id($con);

$sql2="insert into outlet(outletProdutoId,outletPerfilId) values('".$lastid."','".$perfilId."')";

mysqli_query($con,$sql2);
print_r($sql);
print_r($sql2);
//header("location: ../outlet.php");
