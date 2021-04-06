<?php
include_once("includes/bodyBase.inc.php");
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from jogos";
$result=mysqli_query($con,$sql);

top();

?>
    <a href="backoffice/jogosBackoffice.php"><button type="button" class="btn btn-primary">Backoffice</button></a>
    <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Filtros </button>
        <div class="dropdown-content" style="background-color: #0d0d0d">
            <div style="color: #FFFFFF">
                <span>Generos:</span>
                <?php
                $con=mysqli_connect("localhost","root","","pap2021gameon");
                $sqlGeneros="select * from generos";
                $resultGeneros=mysqli_query($con,$sqlGeneros);
                while ($dadosGeneros=mysqli_fetch_array($resultGeneros))
                    ?>
                    <br>
                    <input type="checkbox"> <?php echo $dadosGeneros["generoNome"] ?>
                <br>

            </div>
            <div style="color: #FFFFFF">
                <span>Plataformas:</span>
                <?php
                $con=mysqli_connect("localhost","root","","pap2021gameon");
                $sqlPlataformas="select * from plataformas";
                $resultPlataformas=mysqli_query($con,$sqlPlataformas);
                while ($dadosPlataformas=mysqli_fetch_array($resultPlataformas))
                    ?>
                    <br>
                    <input type="checkbox"> <?php echo $dadosPlataformas["plataformaNome"] ?>
                <br>

            </div>
            <div style="color: #FFFFFF">
                <span>Empresas:</span>
                <?php
                $con=mysqli_connect("localhost","root","","pap2021gameon");
                $sqlEmpresas="select * from empresas";
                $resultEmpresas=mysqli_query($con,$sqlEmpresas);
                while ($dadosEmpresas=mysqli_fetch_array($resultEmpresas))
                    ?>
                    <br>
                    <input type="checkbox"> <?php echo $dadosEmpresas["empresaNome"] ?>
                <br>

            </div>

            <button type="button" class="btn btn-danger">Aplicar</button>
        </div>
    </div>
    <hr>

    <section class="store" style="padding-top: 40px; margin-left: 100px; background-color: #0d0d0d;">


        <div class="row">

<?php
while ($dados=mysqli_fetch_array($result)){
?>

            <div class="col-lg-4 col-md-3">

                <div class="card" style="width: 19rem; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">

                    <a href="Listajogo.php?id=<?php echo $dados["jogoId"]?>"><img src="img/<?php echo $dados["jogoImagemURL"] ?>" class="card-img-top" alt="..."></a>

                    <div class="card-body">

                        <a href="Listajogo.php?id=<?php echo $dados["jogoId"] ?>"><h5 class="card-title"><?php echo $dados["jogoNome"] ?></h5></a>

                        <p class="card-text" style="font-size: 18px"><strong><?php echo $dados["jogoPreco"] ?>€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

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

            </div>

    <?php
}
        ?>

</div>


    </section>

<?php
bottom();
?>