<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");
$id=intval($_GET["id"]);
$sql="delete from plataformas where plataformaId=".$id;
mysqli_query($con,$sql);
header("location: tagPlataformaBackoffice.php");





