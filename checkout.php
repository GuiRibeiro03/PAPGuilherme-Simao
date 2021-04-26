<?php
include_once("includes/bodyBase.inc.php");
top();
?>

    <!-- Criticas -->

     <section class="store" style="margin-top: 20px; margin-bottom: 20px">

            <div class="container" style="background-color: #e7e7e7; width: 100% ">
                <span style="color: black; font-size: 45px; font-weight: bold">Finalizar:</span>
                <hr>

                <?php
                if(isset($_SESSION['id'])){

                    ?>

                    <?php
                    $lista="(0";
                    if(isset($_SESSION['carrinho'])){
                        foreach ($_SESSION['carrinho'] as $produto){
                            $lista.=",".$produto;
                        }
                    }
                    $lista.=")";

                    $sql1="select * from produtos where produtoId in $lista";

                    $result1=mysqli_query($con,$sql1);
                    $i=0;
                    $k=0;
                    while($dados2=mysqli_fetch_array($result1)){

                        ?>
                        <div style="width: 100%">
                        <span style="color: #000000!important; font-size: 20px;"> <img src="img/<?php echo $dados2["produtoImagemURL"] ?>" style="height: 60px; width: 70px;" > <?php echo $dados2["produtoNome"] ?>:</a> &nbsp;<span id="preco" style="color: #0b0b0b; font-size: 20px"><strong><?php echo $dados2["produtoPreco"] ?>€</strong> </span>
                            <button onclick="confirmaEliminaCarrinho(<?php echo $dados2["produtoId"]?>)" style="float: right; background-color: transparent;color: #FFF"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px; font-size: 20px"></i></button></span>
                            <p style="color: #000000!important;"><input type="number" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>
                            <hr>
                        </div>
                        <?php
                        $k++;
                        $i+=$dados2["produtoPreco"];
                    }?>



                    <?php
                    $lista2="(0";
                    if(isset($_SESSION['carrinho'])){
                        foreach ($_SESSION['carrinho'] as $jogo){
                            $lista2.=",".$jogo;
                        }
                    }
                    $lista2.=")";

                    $sql1="select * from jogos where jogoId in $lista2";

                    $result1=mysqli_query($con,$sql1);
                    $k=0;
                    while($dados2=mysqli_fetch_array($result1)){

                        ?>
                        <div>
                        <span style="color: #000000!important; font-size: 20px;"> <img src="img/<?php echo $dados2["jogoImagemURL"] ?>" style="height: 60px; width: 70px;" > <?php echo $dados2["jogoNome"] ?>:</a> &nbsp;<span id="preco" style="color: #0b0b0b; font-size: 20px"><strong><?php echo $dados2["jogoPreco"] ?>€</strong> </span>
                            <button onclick="confirmaEliminaCarrinho(<?php echo $dados2["jogoId"]?>)" style="float: right; background-color: transparent;color: #FFF"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px; font-size: 20px"></i></button></span>
                            <p style="color: #000000!important;"><input type="number" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>
                            <hr>
                        </div>
                        <?php
                        $k++;
                        $i+=$dados2["jogoPreco"];
                    }?>

                    <span style="color: #000000!important; font-size: 20px; font-weight: 400">Total: <?php echo $i ?>&nbsp;€</span> <a href="checkout.php"><button type="button" class="btn btn-danger" style="float: right">Checkout</button></a>

                    <?php
                }else{
                    $k=0;
                    ?>

                    <div class="row"><span>Para adicionar produtos ao carrinho,</span><span onclick="document.getElementById('id01').style.display='block'"><a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 14px;"><span class="badge badge-light" style="color: black; font-size: 16px">Login</span></a></span></div>

                    <?php
                }
                ?>
            </div>
        </div>
        </div>
    </section>






    <!-- Footer Section Begin -->
    <?php
bottom();
?>