<?php
include_once("includes/bodyBase.inc.php");
top();
$con = mysqli_connect("localhost", "root", "", "pap2021gameon");
$id = $_GET['id'];
$sql = "select * from produtos inner join outlet on produtoId = outletProdutoId where produtoTipo = 'outlet' and outletPerfilId = " . $id;
$result = mysqli_query($con, $sql);
?>
<button class="btn btn-success " style="margin-left: 5%; margin-top: 5%; margin-bottom: 5%"><a href="Adiciona/AdicionaProdutoOutlet.php?id=<?php echo $_SESSION['id'] ?>">Adicionar anúncio</a></button>

<br>

<?php
while ($dados = mysqli_fetch_array($result)) {
    ?>
    <div class="col-lg-4 col-md-3" style="margin-bottom: 2%; margin-left: 3%">
        <div class="card"
             style="width: 19rem; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">
            <a href="ListaOutlet.php?id=<?php echo $dados["produtoId"] ?>"><img
                        src="img/<?php echo $dados["produtoImagemURL"] ?>" style="height: 300px" class="card-img-top"
                        alt="..."></a>
            <div class="card-body">
                <a href="ListaOutlet.php?id=<?php echo $dados["produtoId"] ?>"><h5
                            class="card-title"><?php echo $dados["produtoNome"] ?></h5></a>
                <p class="card-text" style="font-size: 18px"><strong><?php echo $dados["produtoPreco"] ?>€</strong>&nbsp;&nbsp;<span
                            class="badge bg-success"><i class="fa fa-check"></i></span></p>
                <p class="card-text" style="font-size: 16px"></p>
                <button class="btn btn-danger" onclick="confirmaEliminaOutlet(<?php echo $dados["produtoId"] ?>)">
                    <i class='fa fa-trash'></i> Eliminar Produto
                </button>
                <a href="Edita/EditaProdutoOutlet.php?id=<?php echo $dados['produtoId'] ?>">
                    <button type='button' class='btn btn-primary'><i class='fa fa-edit'></i></button>
                </a>
            </div>
        </div>
    </div>
    <?php
}
bottom();
?>
