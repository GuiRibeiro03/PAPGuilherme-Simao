<?php
include_once ("includes/config.inc.php");
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from users inner join perfis on userId = perfilUserId";
$res=mysqli_query($con, $sql);

$nome=addslashes($_POST['nome']);
$pwd=addslashes($_POST['password']);



while ($dados=mysqli_fetch_array($res)){
    if ($nome === $dados['userName'] AND $pwd === $dados['userPassword'] AND $dados['userState'] == 'ativo') {
        session_start();
        $_SESSION['id'] = $dados['userId'];
        $_SESSION['nome'] = $dados['userName'];
        $_SESSION['perfilId'] = $dados['perfilId'];
        header("location: ".$_SERVER['HTTP_REFERER']);

    }elseif($nome === $dados['userName'] AND $pwd === $dados['userPassword'] AND $dados['userState'] == 'inativo' ) {
        $verificacao = 'sim';
        $_SESSION['message'] = "1";
        header("location: ".$_SERVER['HTTP_REFERER']);

    }elseif($nome === $dados['userName'] AND $pwd === $dados['userPassword'] AND $dados['userState'] == 'pendente' ) {
        $verificacao = 'sim';
        $_SESSION['id'] = $dados['userId'];
        $_SESSION['nome'] = $dados['userName'];
        $_SESSION['perfilId'] = $dados['perfilId'];
        header("location: ".$_SERVER['HTTP_REFERER']);

    }elseif($nome != $dados['userName'] OR $pwd != $dados['userPassword'] AND $dados['userState'] == 'ativo'){
             $_SESSION['msg'] = "1";
             header("location: ".$_SERVER['HTTP_REFERER']);

        }

}



?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>
