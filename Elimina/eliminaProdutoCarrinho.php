<?php
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET["id"]);
$sql="delete from produtos where produtoId=".$id;
mysqli_query($con,$sql);
header("location: ".$_SERVER['HTTP_REFERER']);
?>

