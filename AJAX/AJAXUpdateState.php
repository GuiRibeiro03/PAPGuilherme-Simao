<?php
$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$estado=addslashes($_POST["userState"]);
$id=intval($_POST['userId']);
$sql="update users set userState='".$estado."' where userId=".$id;
mysqli_query($con,$sql);
header("location: ".$_SERVER['HTTP_REFERER']);