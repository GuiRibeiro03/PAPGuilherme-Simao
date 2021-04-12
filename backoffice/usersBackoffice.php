<?php
include_once ("../includes/body.inc.php");
top();
$con=mysqli_connect("localhost", "root","","pap2021gameon");
$sql="select * from users";
$res=mysqli_query($con,$sql);

?>
<table class="table table-striped" style="color: #FFFFFF; font-weight: bold; font-size: 20px">
    <tr>
        <th>User Id</th>
        <th>User Nome</th>
        <th>User Estado</th>
        <th>User Tipo</th>
        <th colspan="3">Opções</th>
    </tr>
    <tr>
        <?php
        while ($dados=mysqli_fetch_array($res)){
        ?>
        <td><?php echo $dados["userId"]?></td>
        <td><?php echo $dados["userName"]?></td>
        <td><?php echo $dados["userState"]?></td>
        <td><?php echo $dados["userType"]?></td>
        <td><a href="../Edita/EditaUtilizador.php?id=<?php echo $dados["userId"]?>"><button type='button' class='btn btn-info'><i class='fa fa-edit'></i>&nbsp;Editar</button></a></td>
        <?php
        }
        ?>
    </tr>
</table>


<?php
bottom();
?>
