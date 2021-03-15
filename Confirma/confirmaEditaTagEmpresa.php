<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$platNome=addslashes($_POST["empresaNome"]);
$id=intval($_GET["id"]);

$sql="UPDATE empresas SET empresaNome='".$platNome."' where empresaId=".$id;


mysqli_query($con,$sql);
header("location: ../backoffice/tagEmpresasBackoffice.php");





