<?php
include_once ("includes/bodyBase.inc.php");

top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET['id']);
$sql="select * from jogos inner join empresas on jogoEmpresaId=empresaId where jogoId=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
?>

    <div style="text-align: center"> <h1 style="text-shadow: 5px 5px 0px #000000; padding-top:20px "><strong><?php echo $dados["jogoNome"] ?></strong></h1></div>
    <section class="store" style="margin-left: 15%">
    </div>
        <br>
        <br>
        <div class="row" style="width: 100%">
            <div class="container" style="width: 20%";>
            <div class="card" style="width: 19rem; background-color: #000000">
                <img src="img/<?php echo $dados["jogoImagemURL"] ?>" style="background-color: #000000; padding: 15px; padding-top: 40px; width: 500px; height: 400px" class="card-img-top" alt="...">
                <div class="card-body" >
                    <h3 class="card-title"><strong><span ><?php echo $dados["jogoPreco"] ?>€</span></strong> </h3>
                        <p><span style="color: #FFFFFF">Qtn:</span><input type="number" id="quantity" name="quantity" min="1" value="1" max="5" style="width: 50px"></p>
                <button class="btn btn-danger  cart-button" style="color: #dc3545; width: 100%">
                    <strong>
                        <span class="add-to-cart" style="color: #FFFFFF">Comprar &nbsp;<i class="fa fa-shopping-basket"> </i></span>
                        <span class="added" style="color: #FFFFFF">Adicionado &nbsp;<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                    </strong>
                </button>
                </div>
                </div>
            <script>
                const cartButtons=document.querySelectorAll('.cart-button');
                cartButtons.forEach(button => {
                    button.addEventListener('click',cartClicker);
                });

                function cartClicker() {
                    var cart=0;
                    let button = this;
                    button.classList.add('clicked');
                    document.getElementById("bdg1").innerHTML = cart + 1;
                }
            </script>
            </div>
            <section class="details-post-section" >
                <div class="container" style="margin-right: 600px">
                    <div class="row">
                        <div class="details-text" >
                            <div class="dt-overall-rating">
                                <div style="color: #FFFFFF; font-size: 30px; padding-left: 10px;"><strong><span >Resultado Global:</span></strong></div>
                                <div class="or-heading">
                                    <div class="or-item" style="padding-left: 150px">
                                        <div class="or-loader">

                                            <div class="loader-circle-wrap">
                                                <div class="loader-circle">
                                                    <span class="circle-progress-2" data-cpid="circle1" data-cpvalue="<?php echo $dados['jogoGlobalRating']?>"  data-cpcolor="#4bcf13"></span>
                                                    <div class="review-point">
                                                        <span style="padding-left: 5px; color: #FFFFFF">Global Rating:</span>
                                                        <div style="margin-right:10px; margin-top: 10px"><?php echo $dados['jogoGlobalRating']?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="or-loader">

                                            <div class="loader-circle-wrap">
                                                <div class="loader-circle">
                                                    <span class="circle-progress-2" data-cpid="circle2" data-cpvalue="<?php echo $dados['jogoUserRating']?>"  data-cpcolor="#c20000"></span>
                                                    <div class="review-point">
                                                        <span style="padding-left: 10px; color: #FFFFFF">User Rating:</span>
                                                        <div style="padding-left: 5px; padding-top: 10px"><?php echo $dados['jogoUserRating']?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>




    </section>
<section class="store">
    <div style="height: 80%; width: 80%; border: 1px #FFFFFF; background-color: black; padding: 10px 50px; color: #FFFFFF; font-size: 25px; margin-top: 200px; margin-bottom: 200px; margin-left: 10%">
        <h2>Acerca do jogo:</h2>
        <hr>
        <div>
            <div style=" margin-left:5%; width: 1280px; height: 720px" >
                <?php echo $dados["jogoTrailer"] ?>
            </div>
        </div>
        <hr>
        <div>
            <h3>Resumo:</h3>
            <?php echo $dados["jogoSinopse"] ?>
        </div>
        <hr>
        <?php

        $sql1="SELECT * FROM jogos 
                inner join jogogeneros on jogoId=jogoGeneroJogoId 
                inner join jogoplataformas on jogoId=jogoPlataformaJogoId
                inner join generos on jogoGeneroGeneroId=generoId
                inner join plataformas on jogoPlataformaPlataformaId=plataformaId
                where jogoId=".$id;

        $result1=mysqli_query($con,$sql1);
        $dados1=mysqli_fetch_array($result1);
        ?>
        <div class="row" style="margin-left: 20%">
            <h4 style="margin-left: 30px">Empresa:</h4><span>&nbsp;<?php echo $dados["empresaNome"] ?></span>
            <h4 style="margin-left: 30px">Género: </h4><span>&nbsp;<?php echo $dados1["generoNome"] ?></span>
            <h4 style="margin-left: 30px">Plataforma: </h4><span>&nbsp;<?php echo $dados1["plataformaNome"] ?></span>
        </div>
    </div>
    </section>
<?php
bottom();
?>