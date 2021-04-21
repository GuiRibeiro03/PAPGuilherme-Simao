<?php
include_once("../includes/body.inc.php");
$txt=addslashes($_POST['txt']);
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from jogos where jogoNome like '%$txt%' order by jogoId asc ";
$result=mysqli_query($con, $sql);

?>

<section class="store" style="padding-top: 40px; margin-left: 100px; background-color: #0d0d0d;">
    <div class="row" style="width: 300px; float: left; height: 100%">
        <form action="jogos.php" method="post"  enctype="multipart/form-data" >
            <div class="row" style="width: 100%; outline: #5a6268">
                <div style="color: #FFFFFF; margin-bottom: 20%; width: 50%">
                    <h5><strong>Preço:</strong></h5>
                    <br>
                </div>



                <div style="color: #FFFFFF;margin-left: 40px; margin-bottom: 30px">
                    <h5><strong>Generos:</strong></h5>
                    <br>
                    <?php
                    $sqlGeneros="select * from generos";
                    $resultGeneros=mysqli_query($con,$sqlGeneros);
                    while ($dadosGeneros=mysqli_fetch_array($resultGeneros)){
                        ?>
                        <br>
                        <input name="genero[]" type="checkbox" value="<?php echo $dadosGeneros["generoId"] ?>"> <?php echo $dadosGeneros["generoNome"] ?>
                        <br>
                        <?php
                    }
                    ?>
                </div>

                <div style="color: #FFFFFF; margin-left: 40px;margin-bottom: 30px">
                    <hr>
                    <h5><strong>Plataformas:</strong></h5>
                    <br>
                    <?php
                    $sqlPlataformas="select * from plataformas";
                    $resultPlataformas=mysqli_query($con,$sqlPlataformas);
                    while ($dadosPlataformas=mysqli_fetch_array($resultPlataformas)){
                        ?>
                        <br>
                        <input name="plataforma[]" type="checkbox" value="<?php echo $dadosPlataformas["plataformaId"] ?>"> <?php echo $dadosPlataformas["plataformaNome"] ?>
                        <br>
                        <?php
                    }
                    ?>
                </div>

                <div style="color: #FFFFFF; margin-left: 40px;  margin-bottom: 30px;">
                    <hr>
                    <h5><strong>Empresas:</strong></h5>
                    <br>
                    <?php

                    $sqlEmpresas="select * from empresas ";
                    $resultEmpresas=mysqli_query($con,$sqlEmpresas);
                    while ($dadosEmpresas=mysqli_fetch_array($resultEmpresas)){
                        ?>
                        <br>
                        <input name="empresa[]" type="checkbox" value="<?php echo $dadosEmpresas["empresaId"] ?>"> <?php echo $dadosEmpresas["empresaNome"] ?>
                        <br>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Aplicar Filtros &nbsp;<i class="fa fa-check"></i></button>
        </form>
    </div>


    <div class="row">



        <?php
        $i=0;
        while ($dados=mysqli_fetch_array($result)){
            $i+=1;
            ?>


            <div id="content"  class="col-lg-4 col-md-3" style="width: auto;">

                <div  class="card" style="width: auto; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">

                    <a href="Listajogo.php?id=<?php echo $dados["jogoId"]?>"><img src="img/<?php echo $dados["jogoImagemURL"] ?>" class="card-img-top" alt="..." style="height: 400px"></a>

                    <div class="card-body">

                        <a href="Listajogo.php?id=<?php echo $dados["jogoId"] ?>"><h5 class="card-title"><?php echo $dados["jogoNome"] ?></h5></a>

                        <p class="card-text" style="font-size: 18px"><strong><?php echo $dados["jogoPreco"] ?>€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <button class="btn btn-danger  cart-button" style="color: #FF0000; width: 100%"><strong>
                                <span class="add-to-cart" style="color: #FFFFFF">Adicionar ao Carrinho</span>
                                <span class="added" style="color: #FFFFFF">Adicionado &nbsp;<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                            </strong>

                        </button>

                        <script>
                            const cartButtons<?php echo $i + 1?>=document.querySelectorAll('.cart-button');
                            cartButtons<?php echo $i + 1?>.forEach(button => {
                                button.addEventListener('click',cartClicker);
                            });

                            function cartClicker() {
                                var cart=0;
                                let button = this;
                                button.classList.add('clicked');
                                document.getElementById("bdg<?php echo $i + 1?>").innerHTML = cart + 1;
                            }
                        </script>
                    </div>

                </div>

            </div>

            <?php
        }
        ?>



    </div>
    <hr>
    <div  class="align-center" style="width: 100%; margin-top: 20px;">
        <div class="btn-group" role="group" aria-label="Basic example" style="font-size: 20px; font-weight: bold">
            <button type="button" class="btn btn-danger" style="font-size: 20px"><i class="fa fa-fast-backward" style="font-size: 20px"></i>&nbsp;Inicio.</button>
            <button type="button" class="btn btn-danger" style="font-size: 20px"><i class="fa fa-arrow-left" style="font-size: 20px"></i>&nbsp;Ant.</button>
            <button type="button" class="btn btn-danger" style="font-size: 20px">1</button>
            <button type="button" class="btn btn-danger" style="font-size: 20px">2</button>
            <button type="button" class="btn btn-danger" style="font-size: 20px">3</button>
            <button type="button" class="btn btn-danger" style="font-size: 20px">Prox.&nbsp;<i class="fa fa-arrow-right" style="font-size: 20px"></i></button>
            <button type="button" class="btn btn-danger" style="font-size: 20px">Fim &nbsp;<i class="fa fa-fast-forward" style="font-size: 20px"></i></button>
        </div></div>

</section>