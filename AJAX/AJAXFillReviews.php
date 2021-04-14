<?php
include_once("../includes/body.inc.php");
$txt=addslashes($_POST['txt']);
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from reviews inner join jogos on reviewJogoId=jogoId where jogoNome like '%$txt%' order by jogoId asc ";
$result=mysqli_query($con, $sql);

?>
<table class="table table-striped" style=" color: #FFFFFF; font-weight: bold; font-size: 20px; width: 100%; height: 100%; margin-left: 20px; margin-bottom: 30px; margin-right: 20px">

    <tr>
        <td colspan="3" style="margin-bottom: 30px">
            <a href="../Adiciona/AdicionaReview.php" style="color: #FFFFFF"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Adicionar</button></a>
        </td>
    </tr>
    <tr>
        <th>Id</th>
        <th>Imagem</th>
        <th>Jogo</th>
        <th colspan="2">Opções</th>
    </tr>

    <tr >
        <?php
        while ($dados=mysqli_fetch_array($result)) {
        ?>

    <tr>
        <td><?php echo $dados['reviewId'] ?></td>
        <td> <img  style='width: 600px; height: 350px' src="../<?php echo $dados['reviewImagemURL']?>"></td>
        <td><?php echo $dados['jogoNome'] ?></td>
        <td><a href="../Edita/EditaReview.php?id=<?php echo $dados['reviewId']?>"><button type='button' class='btn btn-primary'><i class='fa fa-edit'></i>&nbsp;Editar</button></a></td>
        <td><a href="#" onclick="confirmaEliminaReview(<?php echo $dados['reviewId']?>);"><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i>&nbsp;Eliminar</button></a></td>
    </tr>



    <?php
    }
    ?>

    </tr>
</table>