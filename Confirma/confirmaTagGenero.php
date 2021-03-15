<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$genNome=addslashes($_POST["generoNome"]);

echo $sql="insert into generos(generoNome) 
values('".$genNome."')";

mysqli_query($con,$sql);
header("location: tagGenerosBackoffice.php");
?>



