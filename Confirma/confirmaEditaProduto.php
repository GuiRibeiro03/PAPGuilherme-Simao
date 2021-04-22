<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET["id"]);
$prodNome=addslashes($_POST["produtoNome"]);
$prodPreco=addslashes($_POST["produtoPreco"]);
$prodDesc=addslashes($_POST["produtoDescricao"]);
$prodImagem=$_FILES["produtoImagemURL"]["name"];
$prodTipo=addslashes($_POST["produtoTipo"]);
$novoNome="../img/produtos/".$prodImagem;


$sql="update produtos set produtoNome='".$prodNome."',produtoDescricao='".$prodDesc."'";

if($prodImagem!=''){
    $sql.=", produtoImagemURL='".$novoNome."'";
    copy($_FILES['produtoImagemURL']['tmp_name'],$novoNome);
}

$sql.=", produtoPreco='".$prodPreco."', produtoTipo='".$prodTipo."' where produtoId=".$id;
mysqli_query($con,$sql);
print_r($sql);
header("location: ../backoffice/produtoBackoffice.php");