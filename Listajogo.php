<?php
include_once ("includes/bodyBase.inc.php");

top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET['id']);
$sql="select * from jogos inner join empresas on jogoEmpresaId=empresaId where jogoId=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
?>

    <section class="store">
        <div style="text-align: center"> <h1 style="text-shadow: 5px 5px 0px #000000; padding-top:20px "><strong><?php echo $dados["jogoNome"] ?></strong></h1></div>
        <br>
        <br>
        <div class="row" style="width: 100%">
            <div class="container-md">
            <div class="card" style="width: 19rem; background-color: #000000">
                <img src="img/<?php echo $dados["jogoImagemURL"] ?>" style="background-color: #000000; padding: 15px; padding-top: 40px; width: 300px; height: 500px" class="card-img-top" alt="...">
                <div class="card-body" >
                    <h3 class="card-title"><strong><span ><?php echo $dados["jogoPreco"] ?>€</span></strong> </h3>
                        <p><span style="color: #FFFFFF">Qtn:</span><input type="number" id="quantity" name="quantity" min="1" value="1" max="5" style="width: 50px"></p>
                <button class="btn btn-danger  cart-button" style="color: #dc3545">
                    <strong>
                        <span class="add-to-cart" style="color: #FFFFFF">Adicionar ao Carrinho</span>
                        <span class="added" style="color: #FFFFFF">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
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
            <section class="details-post-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 p-0">
                            <div class="details-text" style="width: 100%">
                                <div class="dt-overall-rating">
                                    <div style="color: #FFFFFF; font-size: 30px; padding-left: 10px"><strong><span >Resultados:</span></strong></div>
                                    <div class="or-heading">
                                        <div class="or-item" style="margin-left: 20% ">
                                            <div class="or-loader">
                                                <div class="loader-circle-wrap">
                                                    <div class="loader-circle">
                                                        <span class="circle-progress-2" data-cpid="circle1" data-cpvalue="88"  data-cpcolor="#4bcf13"></span>
                                                        <div class="review-point">
                                                            <div style="padding-left: 10px; padding-top: 10px"><?php echo $dados["jogoGlobalRating"] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="or-loader">
                                                <div class="loader-circle-wrap">
                                                    <div class="loader-circle">
                                                        <span class="circle-progress-2" data-cpid="circle2" data-cpvalue="94"  data-cpcolor="#c20000"></span>
                                                        <div class="review-point">
                                                            <div style="padding-left: 10px; padding-top: 10px"><?php echo $dados["jogoUserRating"] ?></div>
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

        <div style="height: 80%;width: 80%; border: 1px #FFFFFF; background-color: black; padding: 10px 50px; color: #FFFFFF; font-size: 25px; margin-top: 200px; margin-bottom: 200px; margin-left: 15%">
            <h2>Acerca do jogo:</h2>
            <hr>
            <div>
                <div style=" margin-left:5%; width: 1280px; height: 720px" >
                    <?php echo $dados["jogoTrailer"] ?>
                </div>
            </div>
            <div>
                <h3>Resumo:</h3>
                <?php echo $dados["jogoSinopse"] ?>
            </div>
            <hr>
            <div><h4>Empresa:</h4><span><?php echo $dados["empresaNome"] ?></span>
                <h4>Género: </h4><span>FPS/RPG</span>
                <h4>Plataforma: </h4><span>PS5</span>
            </div>
        </div>


    </section>


<?php
bottom();
?>