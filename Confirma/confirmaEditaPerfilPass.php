<?php
include_once("../includes/body.inc.php");
$con = mysqli_connect("localhost", "root", "","pap2021gameon");



$id=intval($_GET['id']);
$sql="select * from users where userId=".$id;

$oldPass=addslashes($_POST['oldPass']);
$newPass=addslashes($_POST['newPass']);
$newPassEncrypt=md5($newPass);

if($oldPass)

$sql="update users set userPassword='".$newPassEncrypt."' where userId=".$id;


print_r($sql);
mysqli_query($con, $sql);
header("location: ../perfilUser.php?id=".$id);