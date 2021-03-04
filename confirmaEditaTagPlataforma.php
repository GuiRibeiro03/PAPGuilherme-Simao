<?php
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$platNome=addslashes($_POST["plataformaNome"]);
$id=intval($_GET["id"]);

$sql="UPDATE plataformas SET plataformaNome='".$platNome."' where plataformaId=".$id;


mysqli_query($con,$sql);
header("location: tagPlataformaBackoffice.php");





