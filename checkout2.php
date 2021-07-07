<?php
include_once("includes/bodyBase.inc.php");
top();
$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

$sql = "select * from moradas inner join perfis on perfilId=moradaPerfilId where perfilId=" . $_SESSION['id'];
$res = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($res);


$sql2 = "select * from produtos ";
$res2 = mysqli_query($con, $sql2);
$dados2 = mysqli_fetch_array($res2);


$ctt = '';









?>


    <div style="width: 100%; text-align: center;  margin-top: 2%">
        <h3 style="font-weight: bold">Checkout: Envio</h3>
    </div>


    <section class="store" id="storeStyleCheckout" style="color: #0d0d0d ">
        <br>
        <h4 style="font-weight: bold; color: #FFFFFF">Morada de Entrega</h4>

        <span onclick="document.getElementById('morada2').style.display='block'">
        <a href="#"><button style="background-color: forestgreen; font-size: 20px; padding: 7px 7px;">Adicionar Morada</button></a>
        </span>



        data-toggle="modal" data-target="#morada"
        <div class="row">

            <!-- **************************DIV MORADA**************START*********  -->
            <?php
            $sql = "select * from moradas inner join perfis on perfilId=moradaPerfilId where perfilId=" . $_SESSION['id'];
            $res = mysqli_query($con, $sql);
            while ($dados = mysqli_fetch_array($res)) {
                ?>
                <div id="morada">

                    <div>
                        <p style="color: black"><?php echo $dados['perfilNome'] ?></p>
                        <p style="color: black"><?php echo $dados['moradaTexto'] ?></p>
                        <p style="color: black"><?php echo $dados['moradaTelefone'] ?></p>
                    </div>
                    <div style="float: right; padding-bottom: 5px"><input type="radio" name="radio" value="checked">
                    </div>

                </div>
                <?php
            }
            ?>
            <!-- **************************DIV MORADA***************END********  -->

            <!-- **************************MODAL***************START********  -->
            <div id="morada2" class="modal">

                <form class="modal-content animate"
                      action="confirmaAdicionaMoradaCheckout.php?id=<?php echo $_SESSION['id']; ?>" method="post">
                    <div class="imgcontainer">
                        <img src="img/Game.png">
                        <span onclick="document.getElementById('morada2').style.display='none'" class="close"
                              title="Close Modal">&times;</span>
                    </div>
                    <div class="container">
                        <div class="form-group">
                            <label>Endereço de Morada:</label>
                            <input type="text" class="form-control" name="moradaTexto"
                                   placeholder="ex: rua principal...">

                        </div>
                        <div class="form-group">
                            <label>Número de Telefone:</label>
                            <input type="text" class="form-control" name="moradaTelefone"
                                   placeholder="ex: rua principal..." maxlength="9">
                        </div>
                        <button type="submit" class="btn btn-danger">Adicionar</button>
                    </div>
                </form>
            </div>


            <!-- **************************MODAL***************END********  -->


        </div>

        <div class="row" style="margin-top: 5%;">
            <div id="ctt">

                <h4 style="font-weight: bold; color: #FFFFFF">Metodo de Envio:</h4>
                <div style="margin-top: 20px">
                    <span>CTT- Expresso: 3,90€</span>
                    <div style="float: right;"><input type="radio" name="jogoDestaque" id="<?php $ctt ?>"
                                                      value="sim" <?php if ($ctt == 'sim') {
                            echo "checked";
                        } ?>></div>
                </div>

                <div style="margin-top: 20px">
                    <span>Recolher em Loja:</span>
                    <div style="float: right;"><input type="radio" name="jogoDestaque" value="nao"></div>

                    <p style="margin-top: 10px"><select>
                            <option value="Leiria">Leiria</option>
                            <option value="Leiria">Lisboa</option>
                            <option value="Leiria">Coimbra</option>
                            <option value="Leiria">Aveiro</option>
                            <option value="Leiria">Setúbal</option>
                            <option value="Leiria">Faro</option>
                            <option value="Leiria">Porto</option>
                        </select></p>
                </div>


            </div>
        </div>


        <!-- **************************DIV DETALHES***************START********  -->

        <div id="detalhesPedido" style=" float:right; position: relative;">

            <div style="width: 100%; margin-bottom: 20px; text-align: center"><span style="font-weight: bold; ">Detalhes do pedido &nbsp;<i
                            class="fa fa-arrow-down"></i></span></div>
            <?php
            $lista = "(0";
            if (isset($_SESSION['carrinho'])) {
                foreach ($_SESSION['carrinho'] as $produto) {
                    $lista .= "," . $produto;
                }
            }
            $lista .= ")";

            $sql1 = "select * from produtos where produtoId in " . $lista;


            $result1 = mysqli_query($con, $sql1);
            $precoTotal = 0;
            $k = 0;

            while ($dados2 = mysqli_fetch_array($result1)) {

                ?>
                <div style="margin-right: 20px; margin-left: 20px">
                    <?php $k++; ?> <img src="img/<?php echo $dados2["produtoImagemURL"] ?>" style="width: 20%;"> <span
                            style="font-weight: bold"><?php echo $dados2["produtoNome"] ?></span>:</a>
                    <span id="preco"
                          style="color: #0b0b0b; font-size: 20px"><strong><?php echo $dados2["produtoPreco"] ?>€</strong> </span>
                    <?php
                    if ($ctt == 'checked') {
                        $precoTotal += 3.90;
                        ?>
                        <span style="color: #0b0b0b; font-size: 20px">Envio: 3,90€</span>

                        <?php
                    }
                    ?>

                </div>


                <?php
                $precoTotal += $dados2["produtoPreco"];
            } ?>



            <?php
            $lista = "(0";
            if (isset($_SESSION['carrinho'])) {
                foreach ($_SESSION['carrinho'] as $jogo) {
                    $lista .= "," . $jogo;
                }
            }
            $lista .= ")";

            $sql2 = "select * from jogos where jogoId in $lista";


            $result2 = mysqli_query($con, $sql2);

            while ($dados3 = mysqli_fetch_array($result2)) {

                ?>
                <div style="margin-right: 20px; margin-left: 20px; margin-bottom: 5%; margin-top: 5%">
                    <?php $k++; ?> <img src="img/<?php echo $dados3["jogoImagemURL"] ?>" style=" width: 20%; "> <span
                            style="font-weight: bold; margin-left: 20px"> <?php echo $dados3["jogoNome"] ?></span>:
                    &nbsp;</a>
                    <span id="preco"
                          style="color: #0b0b0b; font-size: 20px"><strong><?php echo $dados3["jogoPreco"] ?>€</strong> </span>
                    <?php
                    if ($ctt == 'checked') {
                        $precoTotal += 3.90;
                        ?>
                        <span style="color: #0b0b0b; font-size: 20px">Envio: 3,90€</span>

                        <?php
                    }
                    ?>
                </div>


                <?php

                $precoTotal += $dados3["jogoPreco"];


            }


            ?>
            <div style="width: 100%;"><span
                        style="font-weight: bold; color: #0d0d0d; font-size: 20px; margin-left: 20px">Total: <?php echo $precoTotal ?>€</span>
                <a>
                    <button type="button" class="btn btn-danger" style="float: right; background-color: red">
                        Encomendar
                    </button>
                </a></div>

        </div>


        <!-- **************************DIV DETALHES***************END********  -->
        </div>


        <div class="row">
            <div class="col-75">
                <span style="padding: 15px 10px; font-weight: bold; font-size: 35px;">Método de Pagamento:</span>
                <div class="container">

                    <form action="/action_page.php">

                        <div class="row"
                             style="outline: solid 3px gray; background-color: #FFFFFF; width: 70%; padding: 5px 20px 15px 20px; color: #0d0d0d ">

                            <div class="col-50" >

                                <label for="fname">Métodos Aceites:</label>
                                <div class="icon-container">
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                </div>

                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                                <label for="ccnum">Credit card number</label>
                                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                                <label for="expmonth">Exp Month</label>
                                <input type="text" id="expmonth" name="expmonth" placeholder="September">

                                <div class="row" style="padding: 5px 20px 15px 20px;">
                                    <div class="col-50">
                                        <label for="expyear">Exp Year</label>
                                        <input type="text" id="expyear" name="expyear" placeholder="2018">
                                    </div>
                                    <div class="col-50">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="352">
                                    </div>
                                </div>
                            </div>

                            <input type="submit"
                                   style="background-color: red; color:#FFFFFF; margin-top: 5%; height: auto; padding: 5px 10px; float: right"
                                   value="Guardar">
                        </div>


                    </form>
                </div>
            </div>

        </div>


    </section>


    <!-- Footer Section Begin -->
<?php

bottom();
?>