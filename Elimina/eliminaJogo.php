<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");
$id=intval($_GET["id"]);
$sql="delete from jogos where jogoId=".$id;
$sql2="delete from jogoplataformas where jogoPlataformaJogoId=".$id;
$sql3="delete from jogogeneros where jogoGeneroJogoId=".$id;
mysqli_query($con,$sql2);
mysqli_query($con,$sql3);
mysqli_query($con,$sql);
header("location: ../backoffice/jogosBackoffice.php");





