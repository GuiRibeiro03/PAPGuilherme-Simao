<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");
$id=intval($_GET["id"]);
$sql="delete from generos where generoId=".$id;
mysqli_query($con,$sql);
header("location: tagGenerosBackoffice.php");





