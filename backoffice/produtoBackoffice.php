<?php
include_once ("../includes/body.inc.php");
top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from produtos";
$result=mysqli_query($con, $sql);
?>



<a href="Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>


<table class="table-striped" style=" color: #FFFFFF; font-weight: bold; font-size: 20px; width: 100%; height: 100%; margin-left: 20px; margin-bottom: 30px; margin-right: 20px">

    <tr>
        <td colspan="3" style="margin-bottom: 30px">
            <a href="../Adiciona/AdicionaProduto.php" style="color: #FFFFFF"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Adicionar</button></a>
        </td>
    </tr>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Imagem</th>
        <th>Tipo</th>
        <th>Preço</th>
        <th colspan="2">Opções</th>
    </tr>

    <tr >
        <?php
        while ($dados=mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $dados['produtoId'] . "</td>";
            echo "<td>" . $dados['produtoNome'] . "</td>";
            echo "<td> <img  style='width: 300px; height: 350px' src=\"".$dados['produtoImagemURL']."\"></td>";
            echo "<td>" . $dados['produtoTipo'] . "</td>";
            echo "<td>" . $dados['produtoPreco'] . "€</td>";
            echo "<td><a href=\"../Edita/EditaProduto.php?id=".$dados['produtoId']."\"><button type='button' class='btn btn-primary'>Editar</button></a></td>";
            echo "<td><a href=\"#\" onclick=\"confirmaElimina(".$dados['produtoId'].");\"><button type='button' class='btn btn-danger'>Eliminar</button></a></td>";
            echo "</tr>";
        }
        ?>

    </tr>
</table>


<script>
    function confirmaElimina(id) {
        if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
            window.location="../Elimina/eliminaProduto?id=" + id;
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

<?php
bottom();
?>
