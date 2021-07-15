<?php
include_once("../includes/body.inc.php");
top();

$sql="select * from users where userId=".$_SESSION['id'];
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
if($dados['userType']=='admin' ){

?>

<section class="store" style="background-color: #0b0b0b; " >
    <h2 style="text-decoration: underline">Backoffice</h2>
    <div style="width: 100%; height: 100%; margin-top: 5%; margin-bottom: 5%;">
        <div class="btn-group-vertical" role="group" aria-label="Basic example" style="margin-left: 32%; margin-top: 20px; margin-bottom: 20px">
            <a href="jogosBackoffice.php"><button type="button" class="btn btn-light">Jogos</button></a>
            <a href="reviewsBackoffice.php"><button type="button" class="btn btn-light">Reviews</button></a>
            <a href="NoticiasBackoffice.php"><button type="button" class="btn btn-light">Noticias</button></a>
            <a href="produtoBackoffice.php"><button type="button" class="btn btn-light">Produto</button></a>
            <a href="tagGenerosBackoffice.php"><button type="button" class="btn btn-light">Géneros</button></a>
            <a href="tagEmpresasBackoffice.php"><button type="button" class="btn btn-light">Empresas</button></a>
            <a href="tagPlataformaBackoffice.php"><button type="button" class="btn btn-light">Plataformas</button></a>
            <a href="usersBackoffice.php"><button type="button" class="btn btn-light">utilizadores</button></a>
        </div>

    </div>
</section>
<?php
    }elseif($dados['userType']=='editor'){

    ?>
    <section class="store" style="background-color: #0b0b0b; margin-left: 10%" >
        <div style="width: 100%; text-align: center"><h2 style="text-decoration: underline" style="margin-top: 2%;">Backoffice</h2></div>

            <div class="btn-group" role="group" aria-label="Basic example" style="width:100%; text-align:center; margin-top: 20px; margin-bottom: 40px">
                <a href="reviewsBackoffice.php"><button type="button" class="btn btn-light" style="width: 100px;">Reviews</button></a>
                <a href="NoticiasBackoffice.php"><button type="button" class="btn btn-light" style="width: 100px; margin-left: 4%">Noticias</button></a>
            </div>

    </section>

<?php


    }elseif($dados['userType']!='admin'){
header("location: index.php");
}elseif(!isset($_SESSION['id'])){
header("location: index.php");
}
    ?>

    <?php



bottom();
?>

