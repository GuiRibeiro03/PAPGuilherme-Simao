<?php
$id=intval($_POST['id']);
session_start();
unset($id);
header("location: ".$_SERVER['HTTP_REFERER']);
?>