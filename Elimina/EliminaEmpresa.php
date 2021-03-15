<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");
$id=intval($_GET["id"]);
$sql="delete from empresas where empresaId=".$id;
mysqli_query($con,$sql);
header("location: ../backoffice/tagEmpresasBackoffice.php");





