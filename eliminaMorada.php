<?php
include_once ("includes/config.inc.php");
session_start();

$con = mysqli_connect(HOST, USER, PASSWORD,DATABASE);


$id=intval($_GET['id']);
$sql="delete from moradas where moradaId=".$id;
mysqli_query($con,$sql);


header("Location: perfilUser.php?id=".$_SESSION['id']);
