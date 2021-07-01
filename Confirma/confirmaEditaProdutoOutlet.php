<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");
session_start();
$id=intval($_GET["id"]);
$prodNome=addslashes($_POST["produtoNome"]);
$prodPreco=addslashes($_POST["produtoPreco"]);
$prodDesc=addslashes($_POST["produtoDescricao"]);
$prodImagem=$_FILES["produtoImagemURL"]["name"];
$novoNome="../img/produtos/".$prodImagem;


$sql="update produtos set produtoNome='".$prodNome."',produtoDescricao='".$prodDesc."'";

if($prodImagem!=''){
    $sql.=", produtoImagemURL='".$novoNome."'";
    copy($_FILES['produtoImagemURL']['tmp_name'],$novoNome);
}

$sql.=", produtoPreco='".$prodPreco."', produtoTipo='outlet' where produtoId=".$id;
mysqli_query($con,$sql);
print_r($sql);
header("location: ../meusAnuncios.php?id=".$_SESSION['id']);