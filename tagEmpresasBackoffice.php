<?php
include_once("includes/body.inc.php");
top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from empresas";
$result=mysqli_query($con, $sql);

?>

<a href="Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>

        <table class="table-striped" style=" color: #FFFFFF; font-weight: bold; font-size: 20px; width: 100%; height: 100%; margin-left: 20px; margin-bottom: 30px; margin-right: 20px">

        <tr>
        <td colspan="3" style="margin-bottom: 30px">
        <a href="AdicionaTagEmpresa.php" style="color: #FFFFFF"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Adicionar</button></a>
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
    echo "<td>" . $dados['empresaId'] . "</td>";
    echo "<td>" . $dados['empresaNome'] . "</td>";
    echo "<td><a href=\"EditaTagEmpresa.php?id=".$dados['empresaId']."\"><button type='button' class='btn btn-primary'>Editar</button></a></td>";
    echo "<td><a href=\"#\" onclick=\"confirmaElimina(".$dados['empresaId'].");\"><button type='button' class='btn btn-danger'>Eliminar</button></a></td>";
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
            window.location="eliminaEmpresa.php?id=" + id;
    }
</script>