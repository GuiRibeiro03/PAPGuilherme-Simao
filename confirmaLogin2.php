<?php
include_once ("includes/config.inc.php");
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from users inner join perfis on userId = perfilUserId";
$res=mysqli_query($con, $sql);

$nome=addslashes($_POST['nome']);
$pwd=addslashes($_POST['password']);


while ($dados=mysqli_fetch_array($res)){
    if ($nome === $dados['userName'] AND md5($pwd) == $dados['userPassword'] AND $dados['userState'] == 'ativo') {
        session_start();
        $_SESSION['id'] = $dados['userId'];
        $_SESSION['nome'] = $dados['userName'];
        $_SESSION['perfilId'] = $dados['perfilId'];
        header("location:index.php?message=0");
    }elseif($nome === $dados['userName'] AND md5($pwd) === $dados['userPassword'] AND $dados['userState'] == 'inativo' ) {
        $verificacao='sim';
        header("location:index.php?message=1");

    }elseif($nome === $dados['userName'] AND md5($pwd) === $dados['userPassword'] AND $dados['userState'] == 'pendente' ) {
        session_start();
        $_SESSION['id'] = $dados['userId'];
        $_SESSION['nome'] = $dados['userName'];
        $_SESSION['perfilId'] = $dados['perfilId'];
        header("location:index.php?message=0");

    }elseif($nome != $dados['userName'] OR md5($pwd) != $dados['userPassword']){
        $verificacao='sim';
        header("location:index.php?message=2");
    }

}



?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>
