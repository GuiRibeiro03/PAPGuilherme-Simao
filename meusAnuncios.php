<?php
include_once("includes/bodyBase.inc.php");
top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id = $_GET['id'];
$sql="select * from produtos inner join outlet on produtoId = outletProdutoId where produtoTipo = 'outlet' and outletPerfilId = ".$id;

$result = mysqli_query($con,$sql);
?>

<br>

<?php
while ($dados=mysqli_fetch_array($result)){
    ?>

    <div class="col-lg-4 col-md-3" style="margin-bottom: 2%">

        <div class="card" style="width: 19rem; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">

            <a href="ListaOutlet.php?id=<?php echo $dados["produtoId"]?>"><img src="img/<?php echo $dados["produtoImagemURL"] ?>" style="height: 300px" class="card-img-top" alt="..."></a>

            <div class="card-body">

                <a href="ListaOutlet.php?id=<?php echo $dados["produtoId"] ?>"><h5 class="card-title"><?php echo $dados["produtoNome"] ?></h5></a>

                <p class="card-text" style="font-size: 18px"><strong><?php echo $dados["produtoPreco"] ?>€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>
                <p class="card-text" style="font-size: 16px"></p>
                <button class="btn btn-danger" onclick="confirmaEliminaOutlet(<?php echo $dados["produtoId"] ?>)">
                        <i class='fa fa-trash'></i> Eliminar Produto
                </button>

            </div>

        </div>

    </div>

    <?php
}

bottom();
?>




