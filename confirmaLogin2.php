<?php
include_once ("includes/config.inc.php");
$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);

session_start();
$nome=addslashes($_POST['nome']);
$pwd=addslashes($_POST['password']);
$pwd=md5($pwd);

//1º ir buscar o id DO login

$sql="select userId from users where userName='$nome' AND userState='ativo' OR userState='pendente' ";
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
$id=$dados['userId'];
// id=$sql="select userId from users where userName='$nome' AND userState='ativo' OR userState='pendente' ";

//2º ir buscar à BD os dados do Id obtido
$sql2="select userId, userName, userPassword from users where userId='$id'";
// buscar dados
$res2=mysqli_query($con,$sql2);
$dados2=mysqli_fetch_array($res2);

//3º comparar o que enviaram com este últimos dados IF


     if($nome == $dados2['userName'] AND $pwd == $dados2['userPassword']) {
     $_SESSION['id'] = $dados['userId'];
     $_SESSION['nome'] = $dados2['userName'];
     $_SESSION['carrinho'][0][0]=-1;
     $teste=array(0 => 0);
     array_push($_SESSION['carrinho'],$teste);
     header("location:index.php");

 }else{
         header("location:index.php?message=2");
 }

?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>
