<?php
include_once("includes/bodyBase.inc.php");
$con=mysqli_connect("localhost","root","","pap2021gameon");
$search=addslashes($_POST["txt"]);
$sql="select * from jogos where jogoNome like '%$search%' ";
$result=mysqli_query($con,$sql);

top();

?>


<script>

    $('document').ready(function (){
        $('#search').keyup(function (){
            fillJogos(this.value);
        });
        fillJogos();
    })

</script>

<input type="text" placeholder="Procura o jogo que desejas..." id="search" style="width: 30%; margin-left: 30%">
    <section class="store" style="padding-top: 40px; margin-left: 100px; background-color: #0d0d0d;">
        <div class="row" style="width: 300px; float: left">
        <form action="blog.php" method="post"  enctype="multipart/form-data" >
            <div class="row" style="width: 200px; outline: #5a6268">
                <div style="color: #FFFFFF;margin-left: 40px; margin-bottom: 30px">
                    <h5><strong>Preço:</strong></h5>
                    <br>
                    <div class="price-slider"><span>
                         Mínimo:
                        <input type="text" value="0" min="0" max="120000" />
                          Máximo:
                        <input type="text" value="5000" min="0" max="120000"/></span>
                    </div>
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
                        <input type="checkbox" value="<?php echo $dadosGeneros["generoNome"] ?>"> <?php echo $dadosGeneros["generoNome"] ?>
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
                        <input type="checkbox" value="<?php echo $dadosPlataformas["plataformaNome"] ?>"> <?php echo $dadosPlataformas["plataformaNome"] ?>
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
                        <input type="checkbox" value="<?php echo $dadosEmpresas["empresaNome"] ?>"> <?php echo $dadosEmpresas["empresaNome"] ?>
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


            <div id="content"  class="col-lg-4 col-md-3">

                <div  class="card" style="width: 19rem; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">

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


    </section>

<?php
bottom();
?>



