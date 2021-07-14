<?php
include_once("../includes/body.inc.php");
top(GAMES);

$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from jogos inner join empresas on jogoEmpresaId=empresaId order by jogoId asc  ";
$result=mysqli_query($con, $sql);


$sql2="select * from users where userId=".$_SESSION['id'];
$res2=mysqli_query($con,$sql2);
$dados=mysqli_fetch_array($res2);
if($dados['userType']=='admin'){

?>





<a href="Backoffice.php" style="margin-left: 3%; margin-top: 3%"><button type="button" class="btn btn-light"><i class="arrow_back"></i>Voltar</button></a>

<section class="store"  style="background-color: #0b0b0b">
    <div style="margin-left: 35%">
        <div class="btn-group" >
            <a href="jogosBackoffice.php"><button type="button" class="btn btn-primary">Jogos</button></a>
            <a href="reviewsBackoffice.php"><button type="button" class="btn btn-light">Reviews</button></a>
            <a href="NoticiasBackoffice.php"><button type="button" class="btn btn-light">Noticias</button></a>
            <a href="produtoBackoffice.php"><button type="button" class="btn btn-light">Produto</button></a>
            <a href="tagGenerosBackoffice.php"><button type="button" class="btn btn-light">Géneros</button></a>
            <a href="tagEmpresasBackoffice.php"><button type="button" class="btn btn-light">Empresas</button></a>
            <a href="tagPlataformaBackoffice.php"><button type="button" class="btn btn-light">Plataformas</button></a>
        </div>


    <div style="width: 100%"><input type="text" placeholder="Procurar..." id="search"  style="width: 45%; height: 40px; border-radius: 10px"></div>


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