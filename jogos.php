<?php
include_once("includes/body.inc.php");
top();

?>

    <section class="store" style="padding-top: 40px; padding-left: 200px; background-color: #0d0d0d;">

        <a href="jogosBackoffice.php"><button type="button" class="btn btn-primary">Backoffice</button></a>

        <div class="row">



            <div class="col-lg-4 col-md-3">

                <div class="card" style="width: 280px; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">

                    <a href="DevilMayCry.php"><img src="img/jogos/devilmaycry5.jpg" class="card-img-top" alt="..."></a>

                    <div class="card-body">

                        <a href="DevilMayCry.php"><h5 class="card-title">Devil May Cry 5 SE</h5></a>

                        <p class="card-text" style="font-size: 18px"><strong>69,90€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <button class="btn btn-danger  cart-button" style="color: #1b1e21"><strong>
                                <span class="add-to-cart">Adicionar ao Carrinho</span>
                                <span class="added">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                </i></strong>
                        </button>
                        <div style="text-align: center"> <a href="#" onclick="confirmaElimina(1)"></a><button type="button" class="btn btn-danger" style=""><i class="fa fa-close"> </i></button>
                            <a href="Edita/EditaJogo.php"><button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button></a> </div>
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

                            function confirmaElimina(id) {
                                if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
                                    window.location="../elimina/eliminaCanais.php?id=" + id;
                            }

                        </script>



                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-md-3">

                <div class="card" style="width: 280px; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">

                    <a href="TheLastofUs2.php"><img src="img/jogos/TloU2.jpg" class="card-img-top" alt="..."></a>

                    <div class="card-body">

                        <a href="TheLastofUs2.php"><h5 class="card-title">The Last of Us 2</h5></a>

                        <p class="card-text" style="font-size: 18px"><strong>69,90€</strong>&nbsp;&nbsp;<span class="badge bg-danger"><i class="fa fa-close"></i></span></p>

                        <button class="btn btn-danger  cart-button" style="color: #1b1e21"><strong>
                                <span class="add-to-cart">Adicionar ao Carrinho</span>
                                <span class="added">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                </i></strong>
                        </button>
                        <div style="text-align: center"> <button type="button" class="btn btn-danger" style=""><i class="fa fa-close"> </i></button>
                            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button> </div>
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



            <div class="col-lg-4 col-md-3">

                <div class="card" style="width: 280px; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">

                    <img src="img/jogos/godofwar.jpg" class="card-img-top" alt="...">

                    <div class="card-body">

                        <h5 class="card-title">God of War</h5>

                        <p class="card-text" style="font-size: 18px"><strong>69,90€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <button class="btn btn-danger  cart-button" style="color: #1b1e21"><strong>
                                <span class="add-to-cart">Adicionar ao Carrinho</span>
                                <span class="added">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                </i></strong>
                        </button>
                        <div style="text-align: center"> <button type="button" class="btn btn-danger" style=""><i class="fa fa-close"> </i></button>
                            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button> </div>
                        <script>
                            const cartButtons2=document.querySelectorAll('.cart-button');
                            cartButtons2.forEach(button => {
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

            <div class="col-lg-4 col-md-3">
                <div class="card" style="width: 280px; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">
                    <img src="img/jogos/kg3.jpg" class="card-img-top" alt="...">

                    <div class="card-body">

                        <h5 class="card-title">Kingdom Hearts 3 </h5>

                        <p class="card-text" style="font-size: 18px"><strong>69,90€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <button class="btn btn-danger  cart-button" style="color: #1b1e21"><strong>
                                <span class="add-to-cart">Adicionar ao Carrinho</span>
                                <span class="added">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                </i></strong>
                        </button>
                        <div style="text-align: center"> <button type="button" class="btn btn-danger" style=""><i class="fa fa-close"> </i></button>
                            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button> </div>
                        <script>
                            const cartButtons3=document.querySelectorAll('.cart-button');
                            cartButtons3.forEach(button => {
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

            <div class="col-lg-4 col-md-3">
                <div class="card" style="width: 280px; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">
                    <img src="img/jogos/uncharted4.jpg" class="card-img-top" alt="...">

                    <div class="card-body">

                        <h5 class="card-title">Uncharted 4: A Thiefs End</h5>

                        <p class="card-text" style="font-size: 18px"><strong>69,90€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <button class="btn btn-danger  cart-button" style="color: #1b1e21"><strong>
                                <span class="add-to-cart">Adicionar ao Carrinho</span>
                                <span class="added">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                </i></strong>
                        </button>
                        <div style="text-align: center"> <button type="button" class="btn btn-danger" style=""><i class="fa fa-close"> </i></button>
                            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button> </div>
                        <script>
                            const cartButtons4=document.querySelectorAll('.cart-button');
                            cartButtons4.forEach(button => {
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


            <div class="col-lg-4 col-md-3">
                <div class="card" style="width: 280px; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">
                    <img src="img/jogos/milesmorales.png" class="card-img-top" alt="...">
                    <div class="card-body">

                        <h5 class="card-title">Spider-Man: Miles Morales</h5>

                        <<p class="card-text" style="font-size: 18px"><strong>69,90€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <button class="btn btn-danger  cart-button" style="color: #1b1e21"><strong>
                                <span class="add-to-cart">Adicionar ao Carrinho</span>
                                <span class="added">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                </i></strong>
                        </button>
                        <div style="text-align: center"> <button type="button" class="btn btn-danger" style=""><i class="fa fa-close"> </i></button>
                            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button> </div>
                        <script>
                            const cartButtons5=document.querySelectorAll('.cart-button');
                            cartButtons5.forEach(button => {
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





            <div class="col-lg-4 col-md-3">
                <div class="card" style="width: 280px; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">
                    <img src="img/jogos/demonsouls.png" class="card-img-top" alt="...">
                    <div class="card-body">

                        <h5 class="card-title">Demon Soul's</h5>
                        <p class="card-text" style="font-size: 18px"><strong>69,90€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <button class="btn btn-danger  cart-button" style="color: #1b1e21"><strong>
                                <span class="add-to-cart">Adicionar ao Carrinho</span>
                                <span class="added">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                </i></strong>
                        </button>
                        <div style="text-align: center"> <button type="button" class="btn btn-danger" style=""><i class="fa fa-close"> </i></button>
                            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button> </div>
                        <script>
                            const cartButtons6=document.querySelectorAll('.cart-button');
                            cartButtons6.forEach(button => {
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



            <div class="col-lg-4 col-md-3">
                <div class="card" style="width: 280px; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">
                    <img src="img/jogos/deathstranding.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Death Stranding</h5>
                        <p class="card-text" style="font-size: 18px"><strong>69,90€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <button class="btn btn-danger  cart-button" style="color: #1b1e21"><strong>
                                <span class="add-to-cart">Adicionar ao Carrinho</span>
                                <span class="added">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                </i></strong>
                        </button>
                        <div style="text-align: center"> <button type="button" class="btn btn-danger" style=""><i class="fa fa-close"> </i></button>
                            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button> </div>
                        <script>
                            const cartButtons7=document.querySelectorAll('.cart-button');
                            cartButtons7.forEach(button => {
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



            <div class="col-lg-4 col-md-3">
                <div class="card" style="width: 280px; padding-left: 10px; padding-right: 10px; margin-top: 30px; background-color: black">

                    <img src="img/jogos/cyberpunk2077.png" class="card-img-top" alt="...">

                    <div class="card-body">
                        <h5 class="card-title">Cyberpunk 2077</h5>
                        <p class="card-text" style="font-size: 18px"><strong>69,90€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <button class="btn btn-danger  cart-button" style="color: #1b1e21"><strong>
                                <span class="add-to-cart">Adicionar ao Carrinho</span>
                                <span class="added">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                </i></strong>
                        </button>
                        <div style="text-align: center"> <button type="button" class="btn btn-danger" style=""><i class="fa fa-close"> </i></button>
                            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button> </div>
                        <script>
                            const cartButtons8=document.querySelectorAll('.cart-button');
                            cartButtons8.forEach(button => {
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



        </div>



    </section>

<?php
bottom();
?>