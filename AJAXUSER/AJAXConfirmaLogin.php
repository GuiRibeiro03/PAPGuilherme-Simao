<?php
include_once("../includes/body.inc.php");

$nome=addslashes($_POST['nome']);

$password=md5(addslashes($_POST['password']));
$sql="select * from perfis where perfilNome='$nome' and perfilPassword='$password'";
$result=mysqli_query($con,$sql);
echo mysqli_affected_rows($con);
?>
