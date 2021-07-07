<?php
include_once ("includes/bodyBase.inc.php");
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET['id']);
$sql="select * from produtos where produtoid=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);

top();
?>

    <section class="store" style="padding-top: 40px; margin-left: 100px; background-color: #0d0d0d;">

        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><button type="button" class="btn btn-light"><i class="arrow_back"></i>&nbsp;Voltar</button></a>


        <div class="row">



            <div class="col-lg-4 col-md-3">

                <div class="card" style="width: 19rem; margin-left: 30%; margin-right: 10px; margin-top: 10px; background-color: black">

                    <img src="img/<?php echo $dados["produtoImagemURL"] ?>" class="card-img-top" alt="...">


                </div>

            </div>

            <div class="card-body" >

                <h3 class="card-title"><?php echo $dados["produtoNome"] ?></h3>
<br>
                <p class="card-text" style="font-size: 25px; color: #FFF"><strong><?php echo $dados["produtoPreco"] ?>€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                <a href="#"  onclick="adicionaCarrinho(<?php echo $id ?>)" class="btn btn-danger  cart-button" style="color: #dc3545;margin-top: 10%; color: #FFF; font-weight: bold; font-size: 17px">
                    Adicionar ao Carrinho</a>
            </div>

        </div>

        <section class="store">
            <div style="height: 80%; width: 80%; border: 1px #FFFFFF; background-color: black; padding: 10px 50px; color: #FFFFFF; font-size: 25px; margin-top: 200px; margin-bottom: 200px; margin-left: 10%">
                <h2>Acerca do Produto:</h2>
                <div style="margin-top: 5%">
                    <?php echo $dados["produtoDescricao"] ?>
                </div>
                <hr>
            </div>
        </section>
    </section>


<?php
bottom();
?>