<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");
$id=intval($_GET["id"]);
$sql="delete from reviews where reviewId=".$id;
mysqli_query($con,$sql);
header("location: jogosBackoffice.php");





