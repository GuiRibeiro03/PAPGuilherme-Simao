<?php
include_once("../includes/body.inc.php");
$txt=addslashes($_POST['txt']);
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from jogos inner join empresas on jogoEmpresaId=empresaId where jogoNome like '%$txt%' order by jogoId asc ";
$result=mysqli_query($con, $sql);

?>
<table class="table table-striped" style=" color: #FFFFFF; font-weight: bold; font-size: 20px; width: 100%; height: 100%; margin-left: 20px; margin-bottom: 30px; margin-right: 20px" >


    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Imagem</th>
        <th>Empresa</th>
        <th>Preço</th>
        <th>Destaque</th>
        <th colspan="3">Opções</th>
        <th><a href="../Adiciona/AdicionaJogo.php" style="color: #FFFFFF;"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Adicionar</button></a></th>
    </tr>
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
</table>