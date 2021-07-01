<?php
include_once ("includes/bodyBase.inc.php");

top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET['id']);
$sql="select * from produtos where produtoid=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
?>

    <section class="store" style="padding-top: 40px; margin-left: 100px; background-color: #0d0d0d;">




        <div class="row">



                <div class="col-lg-4 col-md-3">

                    <div class="card" style="width: 19rem; margin-left: 30%; margin-right: 10px; margin-top: 10px; background-color: black">

                        <img src="img/<?php echo $dados["produtoImagemURL"] ?>" class="card-img-top" alt="...">



                    </div>

                </div>

            <div class="row">
            <div class="card-body" style="height: 100%;">

                <h5 class="card-title"><?php echo $dados["produtoNome"] ?></h5>

                <p class="card-text" style="font-size: 18px"><strong><?php echo $dados["produtoPreco"] ?>€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                <a href="#" onclick="adicionaCarrinho(<?php echo $id ?>)"  style="color: #dc3545; float: left">
                    <input type="submit" class="btn btn-danger  cart-button" value="Adicionar ao Carrinho"></a>





            </div>

            <div class="container" style="outline: solid 2px gray; background-color: dimgray; height: 250px; width: 300px; float: left">
                <?php
                $sql2="select * from users inner join perfis on userId=perfilUserId 
                        inner join outlet on perfilId=outletPerfilId";
                $res2=mysqli_query($con,$sql2);
                $dados2=mysqli_fetch_array($res2);

                ?>
                <p><img src="<?php echo $dados2['perfilAvatarURL'] ?>" style="width: 30%; border-radius: 50px; margin-top: 10px"></p>
                <span>&nbsp;<?php echo $dados2['perfilNome'] ?> </span>
                <br>
                <br>
                <p><span style="width: 100%;"> Contacto: &nbsp; <?php echo $dados2['perfilTelefone'] ?></span></p>
                <p><span style="width: 100%;"> Email: <?php echo $dados2['perfilEmail'] ?></span></p>
            </div>

            </div>
        </div>

        <section class="store">
            <div style="height: 80%; width: 80%; border: 1px #FFFFFF; background-color: black; padding: 10px 50px; color: #FFFFFF; font-size: 25px; margin-top: 200px; margin-bottom: 200px; margin-left: 10%">
                <h2>Acerca do Produto:</h2>
                <div>
                    <h3>Resumo:</h3>
                    <?php echo $dados["produtoDescricao"] ?>
                </div>
                <hr>
            </div>
        </section>


    </section>


<?php
bottom();
?>