<?php
$con=mysqli_connect("localhost","root","","pap2021gameon");
$nome=addslashes($_POST['user']);
$pwd=addslashes($_POST['password']);
$sql="select * from users where userId";
$res=mysqli_query($con, $sql);
$dados=mysqli_fetch_array($res);

if($nome===$dados['userNome'] and $pwd===$dados['userPassword'] and $dados["userType"] == "ativo"){
    session_start();
    $_SESSION['id']=$dados['userId'];
    $_SESSION['nome']=$dados['userNome'];
}elseif($nome===$dados['userNome'] and $pwd===$dados['userPassword'] and $dados["userType"] == "inativo"){
    $verificacao='sim';
    header("location: login.php?message");
}

header("location: index.php");
?>
