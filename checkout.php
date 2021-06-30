<?php
include_once("includes/bodyBase.inc.php");
top();
?>

   <body style=" background-color: #0d0d0d">

     <section class="store" style="margin-top: 20px; margin-bottom: 20px; color: #FFFFFF;background-color: #0d0d0d">

            <div class="container" style=" width: 100%;  color: #FFFFFF; font-weight: bold;  ">
                <span style="color: white; font-size: 45px; font-weight: bold">Carrinho:</span>

                <button onclick="confirmaEliminaCarrinho()" class="btn btn-warning" style="color: #0b0b0b; float: right ">Remover Todos</button>
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
                        <div style="width: 100%;  color: #FFFFFF;font-size:25px!important;">
                        <span style="color: #FFFFFF!important;"> <img src="img/<?php echo $dados2["produtoImagemURL"] ?>" style="height: 60px; width: 70px;" > <?php echo $dados2["produtoNome"] ?>:</a> &nbsp;<span id="preco" style="color: #FFFFFF; font-size: 20px"><?php echo $dados2["produtoPreco"] ?>€ </span>
                            <button onclick="confirmaEliminaCarrinhoProduto(<?php echo $dados2["produtoId"]?>)" style="float: right; background-color: transparent;color: #FFF"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px; font-size: 20px"></i></button></span>
                            <p style="color: #FFFFFF!important;"><input type="number" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>
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

                    while($dados2=mysqli_fetch_array($result1)){

                        ?>
                         <div style="width: 100%;  color: #FFFFFF;font-size: 25px!important;">
                        <span style="color: #FFFFFF!important; "> <img src="img/<?php echo $dados2["jogoImagemURL"] ?>" style="height: 60px; width: 70px;" > <?php echo $dados2["jogoNome"] ?>:</a> &nbsp;<span id="preco" style="color: #FFFFFF; font-size: 20px"><strong><?php echo $dados2["jogoPreco"] ?>€</strong> </span>
                            <button onclick="confirmaEliminaCarrinhoJogo(<?php echo $dados2["jogoId"]?>)" style="float: right; background-color: transparent;color: #FFF"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px; font-size: 20px"></i></button></span>
                            <p style="color: #FFFFFF!important;"><input type="number" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>
                            <hr>
                        </div>
                        <?php
                        $k++;
                        $i+=$dados2["jogoPreco"];
                    }?>


                    <?php
                    if($k == 0){
                    ?> <span style="color: #FFFFFF!important; font-size: 25px; font-weight: bold">Total ( <?php echo $k?> Produtos): <?php echo $i ?>&nbsp;€</span>

                        <?php
                    }elseif ($k < 2){

                        ?>
                        <span style="color: #FFFFFF!important; font-size: 25px; font-weight: bold">Total ( <?php echo $k?> Produto): <?php echo $i ?>&nbsp;€</span>

                        <a href="checkout2.php"><button type="button" class="btn btn-danger" style="float: right">Próximo</button></a>
                        <?php
                    }elseif ($k > 1){
                        ?>
                        <span style="color: #FFFFFF!important; font-size: 25px; font-weight: bold">Total ( <?php echo $k?> Produtos): <?php echo $i ?>&nbsp;€</span>

                    <a href="checkout2.php"><button type="button" class="btn btn-danger" style="float: right">Próximo</button></a>

                <?php
                }
                ?>



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