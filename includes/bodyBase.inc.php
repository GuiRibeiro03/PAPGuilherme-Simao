<?php


function top(){

?>
    <!DOCTYPE html>
    <html lang="pt">

    <head>
        <meta charset="UTF-8">


        <meta name="google-signin-client-id" content="985368006103-kh4aclpepe73sei2u4j49n53ub6oe832.apps.googleusercontent.com">



        <meta name="description" content="Amin Template">
        <meta name="keywords" content="gameOn, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>GameOn</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700,900&display=swap" rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/barfiller.css" type="text/css">
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="shortcut icon" href="img/onbutton.ico">
        <script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="import" href="bower_components/polymer/polymer.html">
        <link rel="import" href="bower_components/iron-flex-layout/classes/iron-flex-layout.html">
        <link rel="import" href="bower_components/iron-icons/iron-icons.html">
        <link rel="import" href="bower_components/paper-drawer-panel/paper-drawer-panel.html">
        <link rel="import" href="bower_components/paper-icon-button/paper-icon-button.html">
        <link rel="import" href="bower_components/paper-item/paper-item.html">
        <link rel="import" href="bower_components/paper-button/paper-button.html">
        <link rel="import" href="bower_components/paper-menu/paper-menu.html">
        <link rel="import" href="bower_components/paper-scroll-header-panel/paper-scroll-header-panel.html">
        <link rel="import" href="bower_components/paper-styles/paper-styles-classes.html">
        <link rel="import" href="bower_components/paper-styles/paper-styles.html">
        <link rel="import" href="bower_components/paper-toast/paper-toast.html">
        <link rel="import" href="bower_components/paper-dialog/paper-dialog.html">
        <link rel="import" href="bower_components/paper-toolbar/paper-toolbar.html">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>








        <script>
            function preview_image(event)
            {
                var reader = new FileReader();
                reader.onload = function()
                {
                    var output = document.getElementById('output_image');
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }

            function confirmaElimina(id) {
                if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
                    window.location="elimina/eliminaCanais.php?id=" + id;
            }

        </script>






    </head>

    <body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Menu Begin -->




    <!-- Humberger Menu End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="ht-options">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-8">
                        <div class="ht-widget">
                            <ul class="float-right">

                                <li> <span onclick="document.getElementById('id01').style.display='block'"><a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 17px;"><i class="fa fa-sign-in"></i>Login</a></span>   |
                                    <span onclick="document.getElementById('id02').style.display='block'"><a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 17px;">Register</a></span></li>

                                <li><a href="#" onClick="signOut();"><span  style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 17px;">Sign out &nbsp;</span><i class="fa fa-sign-out"></i></a>

                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-8">
                        <div class="ht-widget">
                            <ul class="float-right">
                                <div class="dropdown">
                                    <li><i class="fa fa-shopping-cart"></i><span>Carrinho &nbsp;</span><span id="bdg1" class="badge badge-danger">0</span></li>
                                    <div class="dropdown-content" >
                                        <span> <img src="img/ps4.png" height="60px" width="70px"> Playstation 4 Slim 500Gb: &nbsp;<span id="preco"><strong>399,90€</strong></span>  <button style="float: right; background-color: transparent"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px"></i></button></span>
                                        <p><input type="number" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>
                                        <hr>
                                        <span> <img src="img/ps4.png" height="60px" width="70px"> Playstation 4 Slim 500Gb: &nbsp;<span id="preco2"><strong>399,90€</strong></span>    <button style="float: right; background-color: transparent"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px"></i></button></span>
                                        <p><input type="number" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>
                                        <hr>
                                        <span> <img src="img/ps4.png" height="60px" width="70px"> Playstation 4 Slim 500Gb: &nbsp;<span id="preco2"><strong>399,90€</strong></span>    <button style="float: right; background-color: transparent"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px"></i></button></span>
                                        <p><input type="number" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>

                                        <hr>
                                        <span></spam><strong>Total: 799,80€</strong></span> <a href="checkout.php"><button type="button" class="btn btn-danger" style="float: right">Checkout</button></a>
                                    </div>
                                </div>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>

        <div class="logo">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="./index.php"><img src="gameOn.png" alt=""></a>
                </div>
            </div>
        </div>
        </div>




        <div class="nav-options" style="width: available">
            <div class="container">

                <!-- <div class="nav-search search-switch">
                     <i class="fa fa-search"></i>
                 </div> -->
                <div class="nav-menu" style="font-size: 20px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">
                    <ul>
                        <li><a href="./index.php"><span ><strong>Home</strong></span></a></li>
                        <li><a href="#"><span style="font-size: 20px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;"><strong>Loja</strong><i class="fa fa-angle-down"></i></span></a>
                            <div class="dropdown">
                                <ul>
                                    <li><a href="consolas.php">Consolas</a></li>
                                    <li><a href="jogos.php">Jogos</a></li>
                                    <li><a href="acessorios.php">Acessórios</a></li>
                                    <li><a href="outlet.php">Outlet</a></li>
                                </ul>
                            </div>
                        </li>



                        <li><a href="reviews.php"><span><strong>Reviews</strong> </span></a></li>

                        <li><a href="blog.php"><span><strong>Blog</strong> </span></a></li>
                        <li><a href="backoffice/Backoffice.php"><span><strong>BackOffice</strong></span></a></li>


                    </ul>
                </div>
            </div>
        </div>
    </header>

<?php
}
?>


    <?php
function bottom(){
    ?>


    <footer class="footer-section" >
        <div class="container">

            <div class="footer-about">
                <div class="fa-logo">
                    <a href="index.php"><img src="img/gameOn.png">
                        <p>Podes nos seguir na nossa Redes Sociais para seguires</p>
                        <p> as novidades da loja e do mundo do gaming à tua volta.</p></a>


                    <a href="index.php" style="margin-left: 20%;"><img src="img/igdb2.png" style="width: 200px; height: 200px"><p>The data was freely provided by IGDB.com</p></a>
                </div>


            </div>
            <hr>
         <div class="footer-about">
            <div class=" footer-about fa-social">
                <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/igndotcom/"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        </div>
        <div class="copyright-area"  >
            <div class="row">
                <div class="col-lg-6">

                    <div class="ca-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                </div>
                <div class="col-lg-5">
                    <div class="ca-links">
                        <a href="#">About</a>
                        <a href="#">Contact</a>
                        <a href="#">Support</a>
                    </div>
                </div>
            </div>
        </div>

    </footer>



    <!--*********** Modal Registar **************-->

    <div id="id02" class="modal">

        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="Game.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label id="email"><b>Email</b></label>
                <input type="text" placeholder="Introduza o seu Email" name="email" required>

                <label id="userName"><b>Nome de Utilizador</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label id="password"><b>Palavra-passe</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <label id="password"><b>Repete a Palavra-passe</b></label>
                <input type="password" placeholder="Enter Password" name="pswRepeat" required>



                <button type="submit" style="background-color: #FF0000; height: 45px; width: 100px"><strong>Registar</strong></button>
                <hr>

            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancelar</button>
                <span class="password">Forgot <a href="#" style="color: #00aff1">password?</a></span>
            </div>
        </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <!--*********** Modal Registar-FIM ************** -->




    <!--*********** Modal Login-Inicio ************** -->

    <div id="id01" class="modal">

        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="Game.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label id="uname"><b>Username</b></label>
                <input type="text" placeholder="Nome de Utilizador" name="uname" required>

                <label id="psw"><b>Password</b></label>
                <input type="password" placeholder="Palavra-Passe" name="psw" required>

                <button type="submit" style="background-color: #FF0000; height: 45px; width: 100px"><strong>Registar</strong></button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>



                <hr>


            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
                <span class="password">Forgot <a href="#" style="color: #00aff1">password?</a></span>
            </div>
        </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>
    <!--*********** Modal Login-FIM ************** -->






    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



    </body>

    </html>


    <?php
}
        ?>