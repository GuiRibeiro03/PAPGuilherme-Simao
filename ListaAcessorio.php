<?php
include_once ("includes/bodyBase.inc.php");

top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET['id']);
$sql="select * from produtos where produtoid=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
?>
    <a href="backoffice/produtoBackoffice.php"><button type="button" class="btn btn-primary">Backoffice</button></a>
    <section class="store" style="padding-top: 40px; margin-left: 100px; background-color: #0d0d0d;">




        <div class="row" >



            <div class="col-lg-4 col-md-3">

                <div style="width: 19rem; margin-left: 30%; margin-right: 10px; margin-top: 10px; background-color: black">

                    <img src="img/<?php echo $dados["produtoImagemURL"] ?>" class="card-img-top" alt="..." >
                </div>

            </div>

            <div  >

                <h3 class="card-title" style="font-weight: bold"><?php echo $dados["produtoNome"] ?></h3>
                <br>
                <p class="card-text" style="font-size: 23px; color:#FFFFFF;"><strong><?php echo $dados["produtoPreco"] ?>€</strong>&nbsp;&nbsp;</p>



                <button class="btn btn-danger  cart-button" style="color: #dc3545"><strong>
                        <span class="add-to-cart" style="color: #FFFFFF">Adicionar ao Carrinho</span>
                        <span class="added" style="color: #FFFFFF">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                    </strong>

                </button>

                <script>
                    const cartButtons1=document.querySelectorAll('.cart-button');
                    cartButtons1.forEach(button => {
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

        </div>

        <section class="store">
            <div style="height: 80%; width: 80%; border: 1px #FFFFFF; background-color: black; padding: 10px 50px; color: #FFFFFF; font-size: 25px; margin-top: 200px; margin-bottom: 200px; margin-left: 10%">
                <div style="text-align: center; width: 100%">
                <h2>Acerca do Produto</h2>
                </div>
                <br>
                <div>
                    <h3>Resumo:</h3>
                    <div style="width: 100%"><?php echo $dados["produtoDescricao"] ?></div>
                </div>
                <hr>
            </div>
        </section>
    </section>


<?php
bottom();
?>