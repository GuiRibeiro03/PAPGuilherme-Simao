<?php
include_once("includes/body.inc.php");
top();


$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from plataformas";
$result=mysqli_query($con, $sql);
?>



        <table class="table-striped" style=" color: #FFFFFF; font-weight: bold; font-size: 20px; width: 100%; height: 100%; margin-left: 20px; margin-bottom: 30px; margin-right: 20px">

        <tr>
        <td colspan="3" style="margin-bottom: 30px">
        <a href="AdicionaTagPlataforma.php" style="color: #FFFFFF"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Adicionar</button></a>
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
    echo "<td>" . $dados['plataformaId'] . "</td>";
    echo "<td>" . $dados['plataformaNome'] . "</td>";
    echo "</tr>";
    echo "<td><a href=\"editaTagPlataforma.php?id=".$dados['canalId']."\"> Editar</a></td>";
    echo "<td><a href=\"#\" onclick=\"confirmaElimina(".$dados['plataformaId'].");\">Eliminar</a></td>";
}
            ?>

        </tr>
        </table>

<?php
bottom();
?>
