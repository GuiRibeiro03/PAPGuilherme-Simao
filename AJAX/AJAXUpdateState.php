<?php
include_once ("../includes/config.inc.php");
$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$estado=addslashes($_POST["userState"]);
$tipo=addslashes($_POST['userType']);
$id=intval($_GET['id']);
$sql="update users set userState='".$estado."', userType='".$tipo."' where userId=".$id;
mysqli_query($con,$sql);
print_r($sql);
header("location: ".$_SERVER['HTTP_REFERER']);