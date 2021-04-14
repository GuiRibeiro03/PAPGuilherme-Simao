<?php
include_once("../includes/body.inc.php");
top(GAMES);

$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from jogos inner join empresas on jogoEmpresaId=empresaId order by jogoId asc  ";
$result=mysqli_query($con, $sql);
?>





<a href="Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>

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


    <div style="width: 100%"><input type="text" placeholder="Procurar..." id="search"  style="width: 45%;"></div>


    </div>
</section>
<div id="tableContent">

</div>

<?php
bottom();
?>

<script>

</script>