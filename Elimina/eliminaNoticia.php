<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");
$id=intval($_GET["id"]);
$sql="delete from noticias where noticiaId=".$id;
mysqli_query($con,$sql);
header("location: ../backoffice/NoticiasBackoffice.php");





