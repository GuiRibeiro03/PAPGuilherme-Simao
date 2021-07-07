<?php
include_once("../includes/body.inc.php");
$con = mysqli_connect("localhost", "root", "","pap2021gameon");

$id=intval($_GET['id']);

$userId = intval($_SESSION['id']);
$perfilNome = addslashes($_POST['perfilNome']);
$perfilAvatarURL = $_FILES['perfilAvatarURL']['name'];
$perfilEmail = addslashes($_POST['perfilEmail']);
$novoNome = "img/pessoas/" . $perfilAvatarURL;


$sql = "UPDATE perfis set perfilNome='".$perfilNome."' ";

if ($perfilAvatarURL!=''){
    $sql.=", perfilAvatarURL='".$novoNome."' ";
    copy($_FILES['perfilAvatarURL']['tmp_name'],$novoNome);
}

$sql.=",  perfilEmail='".$perfilEmail."', perfilUserId='".$userId."' where perfilId=$id";

print_r($sql);
mysqli_query($con, $sql);
header("location: ../perfilUser.php?id=".$id);