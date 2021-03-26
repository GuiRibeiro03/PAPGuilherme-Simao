<?php
include_once("../includes/body.inc.php");
top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from generos";
$result=mysqli_query($con, $sql);

?>

<a href="Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>
<section class="store" >
    <div style="margin-left: 35%">
        <div class="btn-group" >
            <a href="jogosBackoffice.php"><button type="button" class="btn btn-light">Jogos</button></a>
            <a href="reviewsBackoffice.php"><button type="button" class="btn btn-light">Reviews</button></a>
            <a href="NoticiasBackoffice.php"><button type="button" class="btn btn-light">Noticias</button></a>
            <a href="produtoBackoffice.php"><button type="button" class="btn btn-light">Produto</button></a>
            <a href="tagGenerosBackoffice.php"><button type="button" class="btn btn-primary">Géneros</button></a>
            <a href="tagEmpresasBackoffice.php"><button type="button" class="btn btn-light">Empresas</button></a>
            <a href="tagPlataformaBackoffice.php"><button type="button" class="btn btn-light">Plataformas</button></a>
        </div>

    </div>
</section>
<table class="table-striped" style=" color: #FFFFFF; font-weight: bold; font-size: 20px; width: 100%; height: 100%; margin-left: 20px; margin-bottom: 30px; margin-right: 20px">

    <tr>
        <td colspan="3" style="margin-bottom: 30px">
            <a href="../Adiciona/AdicionaTagGenero.php" style="color: #FFFFFF"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Adicionar</button></a>
        </td>
    </tr>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th colspan="2">Opções</th>
    </tr>

    <?php
    while ($dados=mysqli_fetch_array($result)) {

        echo "<tr>";
        echo "<td>" . $dados['generoId'] . "</td>";
        echo "<td>" . $dados['generoNome'] . "</td>";
        echo "<td><a href=\"../Edita/EditaTagGenero.php?id=".$dados['generoId']."\"><button type='button' class='btn btn-primary'>Editar</button></a></td>";
        echo "<td><a href=\"#\" onclick=\"confirmaElimina(".$dados['generoId'].");\"><button type='button' class='btn btn-danger'>Eliminar</button></a></td>";
        echo "</tr>";
    }
    ?>

    </tr>
</table>

<?php
bottom();
?>

<script>
    function confirmaElimina(id) {
        if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
            window.location="../ELimina/EliminaGenero.php?id=" + id;
    }
</script>