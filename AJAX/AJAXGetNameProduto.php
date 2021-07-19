<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_POST['idProduto']);
$sql="Select * from produtos where produtoId=".$id;

$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
echo $dados['produtoNome'];
?>