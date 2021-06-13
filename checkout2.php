<?php
include_once("includes/bodyBase.inc.php");
top();

$sql = "select * from perfis where perfilId=" . $_SESSION['id'];
$res = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($res);


$sql2 = "select * from produtos ";
$res2 = mysqli_query($con, $sql2);
$dados2 = mysqli_fetch_array($res2);


?>


    <div style="width: 100%; text-align: center;  margin-top: 2%">
        <h3 style="font-weight: bold">Checkout: Envio</h3>
    </div>


    <section class="store" id="storeStyleCheckout">
        <br>
        <div class="row-cols-lg-4">
        <!-- **************************DIV MORADA**************START*********  -->

        <h4 style="font-weight: bold; color: #FFFFFF">Morada de Entrega:</h4>
        <div id="morada">
            <div>
                <p style="color: black"><?php echo $dados['perfilNome'] ?></p>
                <p style="color: black"><?php echo $dados['perfilMorada'] ?></p>
                <p style="color: black"><?php echo $dados['perfilTelefone'] ?></p>
            </div>

            <div style="float: right; padding-bottom: 10px"><input type="radio" style="width: 20px; height: 20px;" checked>
            </div>
        </div>
        <!-- **************************DIV MORADA***************END********  -->
        </div>

        <!-- **************************DIV DETALHES***************START********  -->
        <div class="row-cols-lg-4">
        <div id="detalhesPedido" style="height: auto; width: 450px; margin-left: 60%">
            <div style="width: 100%; text-align: center"><span style="font-weight: bold; ">Detalhes do pedido<i class="fa fa-arrow-down"></i></span></div>
            <?php
            $lista="(0";
            if(isset($_SESSION['carrinho'])){
                foreach ($_SESSION['carrinho'] as $produto){
                    $lista.=",".$produto;
                }
            }
            $lista.=")";

            $sql1="select * from produtos where produtoId in ".$lista;



            $result1=mysqli_query($con,$sql1);
            $precoTotal=0;
            $k=0;
            while($dados2=mysqli_fetch_array($result1)){

                ?>
                <div style="margin-right: 20px; margin-left: 20px">
                    <?php  $k++; ?> <img src="img/<?php echo $dados2["produtoImagemURL"] ?>" style="height: 60px; width: 70px;" > <?php echo $dados2["produtoNome"] ?>:</a>
                    <span id="preco" style="color: #0b0b0b; font-size: 20px"><strong><?php echo $dados2["produtoPreco"] ?>€</strong> </span>


                </div>



                <?php
                $precoTotal+=$dados2["produtoPreco"];
            }?>



            <?php
            $lista="(0";
            if(isset($_SESSION['carrinho'])){
                foreach ($_SESSION['carrinho'] as $jogo){
                    $lista.=",".$jogo;
                }
            }
            $lista.=")";

            $sql2="select * from jogos where jogoId in $lista";


            $result2=mysqli_query($con,$sql2);

            while($dados3=mysqli_fetch_array($result2)){

                ?>
                <div style="margin-right: 20px; margin-left: 20px">
                    <?php  $k++; ?> <img src="img/<?php echo $dados3["jogoImagemURL"] ?>" style="height: 60px; width: 70px; outline: solid 1px black;" > <?php echo $dados3["jogoNome"] ?>: &nbsp;</a>
                    <span id="preco" style="color: #0b0b0b; font-size: 20px"><strong><?php echo $dados3["jogoPreco"] ?>€</strong> </span>


                </div>
                <?php

                $precoTotal+=$dados3["jogoPreco"];
            }?>
        </div>
        <!-- **************************DIV DETALHES***************END********  -->
        </div>

        <!-- **************************DIV CTT*****************START******  -->
        <div style="width: 400px; height:90px; margin-top: 3%">
            <span style="padding: 15px 10px; font-weight: bold; font-size: 35px;">Metodo de Envio:</span>
        </div>

        <div id="ctt">
            <span>CTT- Expresso: 3,90€</span>
            <div style="float: right;"><input type="radio" style="width: 20px; height: 20px;" checked></div>

        </div>
        <!-- **************************DIV CTT***************END********  -->



    </section>


    <!-- Footer Section Begin -->
<?php
bottom();
?>