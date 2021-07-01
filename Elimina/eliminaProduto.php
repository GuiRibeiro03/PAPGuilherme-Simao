<?php
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET["id"]);
$sql="delete from produtos where produtoId=".$id;
$sql2="delete from outlet where outletProdutoId=".$id;
mysqli_query($con,$sql2);
mysqli_query($con,$sql);
header("location: ".$_SERVER['HTTP_REFERER']);