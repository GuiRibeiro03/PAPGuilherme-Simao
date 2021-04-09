<?php
include_once("../includes/body.inc.php");
top();

$txt=addslashes($_POST["txt"]);
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from jogos inner join empresas on jogoEmpresaId=empresaId where jogoNome like '%$txt%'";
$result=mysqli_query($con, $sql);

?>



<a href="Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>

<section class="store" >
    <div style="margin-left: 35%">
        <div class="btn-group" >
            <a href="../backoffice/jogosBackoffice.php"><button type="button" class="btn btn-primary">Jogos</button></a>
            <a href="../backoffice/reviewsBackoffice.php"><button type="button" class="btn btn-light">Reviews</button></a>
            <a href="../backoffice/NoticiasBackoffice.php"><button type="button" class="btn btn-light">Noticias</button></a>
            <a href="../backoffice/produtoBackoffice.php"><button type="button" class="btn btn-light">Produto</button></a>
            <a href="../backoffice/tagGenerosBackoffice.php"><button type="button" class="btn btn-light">Géneros</button></a>
            <a href="../backoffice/tagEmpresasBackoffice.php"><button type="button" class="btn btn-light">Empresas</button></a>
            <a href="../backoffice/tagPlataformaBackoffice.php"><button type="button" class="btn btn-light">Plataformas</button></a>
        </div>
    </div>
</section>

<table class="table table-striped" style=" color: #FFFFFF; font-weight: bold; font-size: 20px; width: 100%; height: 100%; margin-left: 20px; margin-bottom: 30px; margin-right: 20px" >
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Imagem</th>
        <th>Empresa</th>
        <th>Preço</th>
        <th>Destaque</th>
        <th colspan="3">Opções</th>
        <th></t><a href="../Adiciona/AdicionaJogo.php" style="color: #FFFFFF;"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Adicionar</button></a></th>
        <th></th>
    </tr>





    <tr>
        <?php
        while ($dados=mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $dados['jogoId'] . "</td>";
            echo "<td>" . $dados['jogoNome'] . "</td>";
            echo "<td> <img  style='width: 300px; height: 350px' src='../".$dados['jogoImagemURL']."'></td>";
            echo "<td>" . $dados['empresaNome'] . "</td>";
            echo "<td>" . $dados['jogoPreco'] . "€</td>";
            echo "<td>" . $dados['jogoDestaque'] . "</td>";
            echo "<td><a href=\"../Edita/EditaJogo.php?id=".$dados['jogoId']."\"><button type='button' class='btn btn-primary'><i class='fa fa-edit'></i>&nbsp;Editar</button></a></td>";
            echo "<td><a href=\"../Edita/EditaTagsJogo.php?id=".$dados['jogoId']."\"><button type='button' class='btn btn-secondary'><i class='fa fa-edit'></i>&nbsp;Editar Tags</button></a></td>";
            echo "<td><a href=\"#\" onclick=\"confirmaElimina(".$dados['jogoId'].");\"><button type='button' class='btn btn-danger'><i class='fa fa-trash'>&nbsp;Eliminar</button></a></td>";
            echo "</tr>";
        }
        ?>
</table>



<?php
bottom();
?>

