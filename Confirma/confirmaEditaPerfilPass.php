<?php
include_once("../includes/body.inc.php");
$con = mysqli_connect("localhost", "root", "","pap2021gameon");



$id=intval($_GET['id']);
$sql2="select * from users where userId=".$id;
$res=mysqli_query($con,$sql2);
$dados=mysqli_fetch_array($res);


$oldPass=addslashes($_POST['oldPass']);
$newPass=addslashes($_POST['newPass']);
$newPassEncrypt=md5($newPass);

if($oldPass===$dados['userPassword'] AND $newPass != $dados['userPassword'] ){
    $sql="update users set userPassword='".$newPassEncrypt."' where userId=".$id;
}




print_r($sql);
mysqli_query($con, $sql);
header("location: ../perfilUser.php?id=".$id);