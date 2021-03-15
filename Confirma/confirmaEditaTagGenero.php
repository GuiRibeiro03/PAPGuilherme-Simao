<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$genNome=addslashes($_POST["generoNome"]);
$id=intval($_GET["id"]);

$sql="UPDATE generos SET generoNome='".$genNome."' where generoId=".$id;


mysqli_query($con,$sql);
header("location: ../backoffice/tagGenerosBackoffice.php");





