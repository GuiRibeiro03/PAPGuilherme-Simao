<?phpinclude_once("includes/bodyBase.inc.php");$con=mysqli_connect("localhost","root","","pap2021gameon");$sql="select * from produtos where produtoTipo = 'acessorio'";$result=mysqli_query($con,$sql);top();?>    <section class="store" style="padding-top: 40px; margin-left: 100px; background-color: #0d0d0d;">        <div class="row">            <?php            while ($dados=mysqli_fetch_array($result)){                ?>                <div class="col-lg-4 col-md-3">                    <div class="card" style="width: 19rem; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">                        <a href="ListaAcessorio.php?id=<?php echo $dados["produtoId"]?>"><img src="img/<?php echo $dados["produtoImagemURL"] ?>" class="card-img-top" alt="..."></a>                        <div class="card-body">                            <a href="ListaAcessorio.php?id=<?php echo $dados["produtoId"] ?>"><h5 class="card-title"><?php echo $dados["produtoNome"] ?></h5></a>                            <p class="card-text" style="font-size: 18px"><strong><?php echo $dados["produtoPreco"] ?>€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>                            <button onclick="adicionaCarrinho(<?php echo $dados["produtoId"]?>)" class="btn btn-danger  cart-button" style="color: #dc3545;">                                <input type="submit" class="btn-danger" value="Adicionar ao Carrinho">                            </button>                        </div>                    </div>                </div>                <?php            }            ?>        </div>    </section><?phpbottom();?>