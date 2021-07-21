<?php
include_once("includes/bodyBase.inc.php");
top();
?>

   <body style=" background-color: #0d0d0d">

     <section class="store" style="margin-top: 20px; margin-bottom: 20px; color: #FFFFFF; background-color: #0d0d0d">

            <div class="container" style=" width: 100%;  color: #FFFFFF; font-weight: bold;  ">
                <span style="color: white; font-size: 45px; font-weight: bold">Carrinho:</span>

                <button onclick="eliminaCarrinhoTodo()" class="btn btn-warning" style="color: #0b0b0b; float: right ">Remover Todos</button>
                <hr>

                <?php
                if(isset($_SESSION['id'])){

                    ?>

                    <?php
                    $total=0;
                    $k=0;

                    if(isset($_SESSION['carrinho'])){
                        foreach ($_SESSION['carrinho'] as $produto){
                            foreach ($produto as $prdId => $quant){
                                $sql2="select * from produtos where produtoId = ".$prdId;
                                $result2=mysqli_query($con,$sql2);
                                if(mysqli_affected_rows($con)>0){
                                    $dados2=mysqli_fetch_array($result2);

                                    ?>
                                    <div style="margin-right: 20px; margin-left: 20px">
                                        <img src="img/<?php echo $dados2["produtoImagemURL"] ?>" style="height: 60px; width: 70px;" > <?php echo $dados2["produtoNome"] ?>:</a> &nbsp;<span id="preco" style="font-size: 20px"><strong><?php echo $dados2["produtoPreco"] ?>€</strong> </span>
                                        <button onclick="confirmaEliminaCarrinhoProduto(<?php echo $prdId?>)" style="float: right; background-color: transparent;color: #FFF"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px; font-size: 20px"></i></button></span>
                                        <p style="color: #000000!important;"><input onclick="atualizaCarrinho(this.value,<?php echo $prdId?>)" type="number"  value="<?php echo $quant?>" min="1" style="width: 50px; text-align: center"></p>
                                        <hr>
                                    </div>



                                    <?php
                                    $k++;
                                    $total+=$dados2["produtoPreco"]*$quant;
                                }else{
                                    ?>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>



                    <?php

                    if(isset($_SESSION['carrinho'])){
                        foreach ($_SESSION['carrinho'] as $produto){
                            foreach ($produto as $prdId => $quant){
                                $sql2="select * from jogos where jogoId = ".$prdId;
                                $result2=mysqli_query($con,$sql2);
                                if(mysqli_affected_rows($con)>0){
                                    $dados3=mysqli_fetch_array($result2);

                                    ?>

                                    <div style="margin-right: 20px; margin-left: 20px">
                                        <img src="img/<?php echo $dados3["jogoImagemURL"] ?>" style="height: 60px; width: 70px;" >
                                        <span style="color: #FFFFFF; font-size: 20px"><?php echo $dados3["jogoNome"] ?>:</span>
                                        &nbsp;<span id="preco" style="color: #FFFFFF; font-size: 20px"><strong><?php echo $dados3["jogoPreco"] ?>€</strong> </span>
                                        <button onclick="confirmaEliminaCarrinhoJogo(<?php echo $prdId?>)" style="float: right; background-color: transparent;color: #FFF"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px; font-size: 20px"></i></button></span>

                                        <p style="margin-top: 3%"><span>Quantidade: &nbsp;<?php echo $quant?></span></p>

                                        <hr>
                                    </div>

                                    <?php
                                    $k++;
                                    $total+=$dados3["jogoPreco"]*$quant;
                                }else{
                                    ?>

                                    <?php
                                }
                            }
                        }
                    }
                    ?>

                    <span style="font-size: 25px; font-weight: bold">Total ( <?php echo $k?> Produto<?php echo $k!=1?'s':''?>): <?php echo $total ?>&nbsp;€</span>
                    <a href="checkout2.php"><button type="button" class="btn btn-danger" style="float: right; background-color: red">Próximo</button></a>

                    <?php
                }else{

                    ?>

                    <div class="row"><span>Para adicionar produtos ao carrinho,</span><span onclick="document.getElementById('id01').style.display='block'"><a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 14px;"><span class="badge badge-light" style="color: black; font-size: 16px">Login</span></a></span></div>

                    <?php
                }
                ?>
            </div>
        </div>
        </div>
    </section>



   </body>


    <!-- Footer Section Begin -->
    <?php
bottom();
?>