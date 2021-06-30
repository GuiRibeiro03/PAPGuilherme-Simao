<?php
include_once("../includes/body.inc.php");
top(NEWS);

$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from noticias";
$result=mysqli_query($con, $sql);

$sql2="select * from users where userId=".$_SESSION['id'];
$res2=mysqli_query($con,$sql2);
$dados=mysqli_fetch_array($res2);
if($dados['userType']=='admin'){

?>


<a href="Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>
<section class="store" >
    <div style="margin-left: 35%">
        <div class="btn-group" >
            <a href="jogosBackoffice.php"><button type="button" class="btn btn-light">Jogos</button></a>
            <a href="reviewsBackoffice.php"><button type="button" class="btn btn-light">Reviews</button></a>
            <a href="NoticiasBackoffice.php"><button type="button" class="btn btn-primary">Noticias</button></a>
            <a href="produtoBackoffice.php"><button type="button" class="btn btn-light">Produto</button></a>
            <a href="tagGenerosBackoffice.php"><button type="button" class="btn btn-light">Géneros</button></a>
            <a href="tagEmpresasBackoffice.php"><button type="button" class="btn btn-light">Empresas</button></a>
            <a href="tagPlataformaBackoffice.php"><button type="button" class="btn btn-light">Plataformas</button></a>
        </div>

        <div style="width: 100%"><input type="text" placeholder="Procurar..." id="search"  style="width: 45%;"></div>

    </div>
</section>

<div id="tableContent">

</div>

<?php
}else
    header("location: index.php");

bottom();
?>

<script>

</script>