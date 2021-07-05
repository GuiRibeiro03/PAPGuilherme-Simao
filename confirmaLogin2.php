<?php
include_once ("includes/config.inc.php");
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from users inner join perfis on userId = perfilUserId";
$res=mysqli_query($con, $sql);

$nome=addslashes($_POST['nome']);
$pwd=addslashes($_POST['password']);
session_start();


while ($dados=mysqli_fetch_array($res)){
    if ($nome === $dados['userName'] AND md5($pwd) == $dados['userPassword'] AND $dados['userState'] == 'ativo') {
        $_SESSION['id'] = $dados['userId'];
        $_SESSION['nome'] = $dados['userName'];
        $_SESSION['perfilId'] = $dados['perfilId'];
        header("location: ".$_SERVER['HTTP_REFERER']);

    }elseif($nome === $dados['userName'] AND md5($pwd) === $dados['userPassword'] AND $dados['userState'] == 'inativo' ) {
        $verificacao='sim';
        header("location:index.php?message");

    }elseif($nome === $dados['userName'] AND md5($pwd) === $dados['userPassword'] AND $dados['userState'] == 'pendente' ) {
        $_SESSION['id'] = $dados['userId'];
        $_SESSION['nome'] = $dados['userName'];
        $_SESSION['perfilId'] = $dados['perfilId'];
        header("location: ".$_SERVER['HTTP_REFERER']);

    }elseif($nome != $dados['userName'] OR md5($pwd) != $dados['userPassword'] AND $dados['userState'] == 'ativo'){
        $verificacao='sim';
        header("location:index.php?message2");

        }

}



?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>
