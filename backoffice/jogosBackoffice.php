<?php
include_once("../includes/body.inc.php");
top();

$search=addslashes($_POST["txt"]);
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from jogos inner join empresas on jogoEmpresaId=empresaId order by jogoId asc  ";
$result=mysqli_query($con, $sql);
?>

<script>

    $('document').ready(function (){
        $('#search').keyup(function (){
            fillJogosBackoffice(this.value);
        });
        fillJogosBackoffice();
    })

</script>





<a href="Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>

<section class="store" >
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


    <div style="width: 100%"><input type="text" placeholder="procurar..." id="search"  style="width: 45%;"></div>


    </div>
</section>
        <table class="table-striped" style=" color: #FFFFFF; font-weight: bold; font-size: 20px; width: 100%; height: 100%; margin-left: 20px; margin-bottom: 30px; margin-right: 20px" >


        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Imagem</th>
            <th>Empresa</th>
            <th>Preço</th>
            <th>Destaque</th>
            <th colspan="3">Opções</th>
        </tr>

            <tr>
                <td colspan="3" style="margin-bottom: 30px">
                    <a href="../Adiciona/AdicionaJogo.php" style="color: #FFFFFF;"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Adicionar</button></a>
                </td>
            </tr>

        <tr id="content">
            <?php
            while ($dados=mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $dados['jogoId'] . "</td>";
                echo "<td>" . $dados['jogoNome'] . "</td>";
                echo "<td> <img  style='width: 300px; height: 350px' src=".$dados['jogoImagemURL']."></td>";
                echo "<td>" . $dados['empresaNome'] . "</td>";
                echo "<td>" . $dados['jogoPreco'] . "€</td>";
                echo "<td>" . $dados['jogoDestaque'] . "</td>";
                echo "<td><a href=\"../Edita/EditaJogo.php?id=".$dados['jogoId']."\"><button type='button' class='btn btn-primary'><i class='fa fa-edit'></i>&nbsp;Editar</button></a></td>";
                echo "<td><a href=\"../Edita/EditaTagsJogo.php?id=".$dados['jogoId']."\"><button type='button' class='btn btn-secondary'><i class='fa fa-edit'></i>&nbsp;Editar Tags</button></a></td>";
                echo "<td><a href=\"#\" onclick=\"confirmaElimina(".$dados['jogoId'].");\"><button type='button' class='btn btn-danger'><i class='fa fa-trash'>&nbsp;Eliminar</button></a></td>";
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
            window.location="../Elimina/eliminaJogo?id=" + id;
    }


    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>