<?php
include_once("includes/bodyBase.inc.php");

$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

$sql = "select * from moradas inner join perfis on perfilId=moradaPerfilId where perfilId=" . $_SESSION['id'];
$res = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($res);


$sql2 = "select * from produtos ";
$res2 = mysqli_query($con, $sql2);
$dados2 = mysqli_fetch_array($res2);

$ctt='';

top();
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

        <div class="row" style="margin-top: 5%;" onload="envio()">
            <div id="ctt">

                <h4 style="font-weight: bold; color: #FFFFFF">Metodo de Envio:</h4>
                <div style="margin-top: 20px">
                    <span>CTT- Expresso: 3,90€</span>

                    <div style="float: right;">
                        <input type="radio" name="opcao" id="btn1" value="sim">
                    </div>
                </div>

                <div style="margin-top: 20px">
                    <span>Recolher em Loja:</span>

                    <div style="float: right;">
                        <input type="radio" name="opcao" id="btn2" value="nao" >
                    </div>

                    <p style="margin-top: 10px"><select>
                            <option value="Leiria">Leiria</option>
                            <option value="Lisboa">Lisboa</option>
                            <option value="Coimbra">Coimbra</option>
                            <option value="Aveiro">Aveiro</option>
                            <option value="Setúbal">Setúbal</option>
                            <option value="Faro">Faro</option>
                            <option value="Porto">Porto</option>
                        </select></p>

                </div>

                <button id="btn" class="btn btn-danger" style="color: black; font-size: 15px">Guardar</button>



            </div>
        </div>





        <!-- **************************DIV DETALHES***************START********  -->

        <div id="detalhesPedido" style=" float:right; position: relative; background-color: #FFFFFF">

            <div style="width: 100%; margin-bottom: 20px; text-align: center"><span style="font-weight: bold; ">Detalhes do pedido &nbsp;<i
                            class="fa fa-arrow-down"></i></span></div>
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
                              <img src="img/<?php echo $dados2["produtoImagemURL"] ?>" style="height: 60px; width: 70px;" > <?php echo $dados2["produtoNome"] ?>:</a> &nbsp;<span id="preco" style="color: #0b0b0b; font-size: 20px"><strong><?php echo $dados2["produtoPreco"] ?>€</strong> </span>
                                <button onclick="confirmaEliminaCarrinhoProduto(<?php echo $dados2["produtoId"]?>)" style="float: right; background-color: transparent;color: #FFF"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px; font-size: 20px"></i></button></span>
                                <p style="color: #000000!important;"><input type="number" name="quantidade" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>
                                <hr>
                            </div>



                            <?php
                            $k++;
                            $total+=$dados2["produtoPreco"]*$quant;
                        }
                    }
                }
            }
            ?>



            <?php

            if(isset($_SESSION['carrinho'])){
                foreach ($_SESSION['carrinho'] as $produto){
                    foreach ($produto as $prdId => $quant){
                        $sql2="select * from jogos where jogoId =".$prdId;
                        $result2=mysqli_query($con,$sql2);
                        if(mysqli_affected_rows($con)>0){
                            $dados3=mysqli_fetch_array($result2);

                            ?>
                            <div style="margin-right: 20px; margin-left: 20px">
                           <img src="img/<?php echo $dados3["jogoImagemURL"] ?>" style="height: 60px; width: 70px;" > <?php echo $dados3["jogoNome"] ?>:</a>
                                &nbsp;<span id="preco" style="color: #0b0b0b; font-size: 20px"><strong><?php echo $dados3["jogoPreco"] ?>€</strong> </span>
                                <button onclick="confirmaEliminaCarrinhoJogo(<?php echo $dados3["jogoId"]?>)" style="float: right; background-color: transparent;color: #FFF"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px; font-size: 20px"></i></button></span>
                                <p style="color: #000000!important;"><input type="number" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>
                                <hr>
                            </div>

                            <?php
                            $k++;
                            $total+=$dados3["produtoPreco"]*$quant;
                        }
                    }
                }
            }
            ?>
            <div style="width: 100%;"><span
                        style="font-weight: bold; color: #0d0d0d; font-size: 20px; margin-left: 20px">Total: <?php echo $total ?>€</span>
                <a>
                    <a href="AJAX/finalizarEncomenda.php"><button type="button" class="btn btn-danger" style="float: right; background-color: red">
                        Encomendar
                    </button></a>
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
                             style="outline: solid 3px gray; background-color: #FFFFFF; font-size: 20px; width: 63%;  padding: 5px 20px 15px 20px; color: #0d0d0d ">

                            <div class="col-50" >

                                <label for="fname">Métodos Aceites:</label>
                                <div class="icon-container">
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                </div>
                                <div class="col-20" style="margin-top: 5%; ">
                                <label for="cname">Nome do Utente:</label>
                                <input type="text" id="cname" name="cardname" required>
                                </div>
                                <div class="col-20" style="margin-top: 5%; ">
                                <label for="ccnum">Numero do Cartão:</label>
                                <input type="text" id="ccnum" name="cardnumber" maxlength="19" placeholder="1111-2222-3333-4444" required>
                                </div>

                                    <div class="col-20" style="margin-top: 5%; width: 30% ">
                                <label for="expmonth">Validade:</label>
                                <input type="text" maxlength="2" id="exp" name="expmonth" placeholder="Mês: 01" required>
                                <input type="text" maxlength="4" id="exp" name="expmonth" placeholder="Ano: 2021" required>
                                    </div>

                                <div class="col-20" style="margin-top: 5%; width: 40%;">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="Ex.: 111" maxlength="3" required>
                                    </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>

        </div>


    </section>

    <script>



            const btn = document.querySelector('#btn');
            // handle button click
            btn.onclick = function () {
                const rbs = document.querySelectorAll('input[name="opcao"]');
                let selectedValue;
                for (const rb of rbs) {
                    if (rb.checked && rb.value == 'sim') {
                        selectedValue = rb.value;
                        document.getElementById("textContent").innerHTML ='<span style="color: #0b0b0b; font-size: 16px; font-weight: bold">Envio: 3,90€</span>';
                        let valor=3.90;
                        break;


                    } else if (rb.checked && rb.value == 'nao') {
                        selectedValue = rb.value;
                        document.getElementById("textContent").innerHTML = '';
                        break;
                    }
                }



            };

    </script>
    <!-- Footer Section Begin -->
<?php

bottom();
?>