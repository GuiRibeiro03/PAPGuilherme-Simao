<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$prodNome=addslashes($_POST["produtoNome"]);
$prodPreco=addslashes($_POST["produtoPreco"]);
$prodDesc=addslashes($_POST["produtoDescricao"]);
$prodImagem=$_FILES["produtoImagemURL"]["name"];
$prodTipo=addslashes($_POST["produtoTipo"]);
$novoNome="../img/produtos/".$prodImagem;
copy($_FILES['produtoImagemURL']['tmp_name'],$novoNome);


$sql="insert into produtos(produtoNome,produtoDescricao,produtoImagemURL,produtoPreco,produtoTipo)
 values('".$prodNome."', '".$prodDesc."','".$novoNome."','".$prodPreco."','".$prodTipo."') ";


mysqli_query($con,$sql);
print_r($sql);
header("location: ../backoffice/produtoBackoffice.php");
