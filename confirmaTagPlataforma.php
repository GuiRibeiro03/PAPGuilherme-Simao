<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$platNome=addslashes($_POST["plataformaNome"]);

echo $sql="insert into plataformas(plataformaNome) 
values('".$platNome."')";

mysqli_query($con,$sql);
header("location: tagPlataformaBackoffice.php");
?>



