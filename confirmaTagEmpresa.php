<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$platNome=addslashes($_POST["empresaNome"]);

echo $sql="insert into empresas(empresaNome) 
values('".$platNome."')";

mysqli_query($con,$sql);
header("location: tagEmpresasBackoffice.php");
?>



