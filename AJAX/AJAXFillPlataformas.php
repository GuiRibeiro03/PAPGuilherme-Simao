<?php
include_once("../includes/body.inc.php");
$txt=addslashes($_POST['txt']);
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from plataformas where plataformaNome like '%$txt%' order by plataformaId asc ";
$result=mysqli_query($con, $sql);

?>
<table class="table table-striped" style=" color: #FFFFFF; font-weight: bold; font-size: 20px; width: 100%; height: 100%; margin-left: 20px; margin-bottom: 30px; margin-right: 20px">

    <tr>
        <td colspan="3" style="margin-bottom: 30px">
            <a href="../Adiciona/AdicionaTagPlataforma.php" style="color: #FFFFFF"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Adicionar</button></a>
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
        echo "<td><a href=\"../Edita/EditaTagPlataforma.php?id=".$dados['plataformaId']."\"><button type='button' class='btn btn-primary'><i class='fa fa-edit'></i>Editar</button></a></td>";
        echo "<td><a href=\"#\" onclick=\"confirmaEliminaPlataforma(".$dados['plataformaId'].");\"><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i>&nbsp;Eliminar</button></a></td>";
        echo "</tr>";
    }
    ?>

    </tr>
</table>