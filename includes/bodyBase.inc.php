<?php
include_once("config.inc.php");
$con=mysqli_connect(HOST,USER, PASSWORD,DATABASE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$_SESSION['carrinho'][0]=-1;

if(isset($_GET['message'])){

if($_GET['message'] == 2) {
    alertMsg("Username ou password incorretas!");
}

}

function alertMsg($message)
{
    echo "<script type='text/javascript'>alert('$message');</script>";
}





function top($menu=HOME){

?>


    <!DOCTYPE html>
    <html lang="pt">

    <head>
        <meta charset="UTF-8">


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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="sweetalert2.all.min.js"></script>

        <script src="js/jquery.min.js"></script>
        <script src="js/common.js"></script>

        <script>
            $('document').ready(function (){
                <?php
                if($menu==GAMES){
                ?>
                $('#search').keyup(function (){
                    fillJogosBackoffice(this.value);
                });
                fillJogosBackoffice();
                <?php
                } elseif($menu==REVIEWS){
                ?>
                $('#search').keyup(function (){
                    fillReviewsBackoffice(this.value);
                });
                fillReviewsBackoffice();
                <?php
                } elseif($menu==NEWS){
                ?>
                $('#search').keyup(function (){
                    fillNoticiasBackoffice(this.value);
                });
                fillNoticiasBackoffice();
                <?php
                } elseif($menu==PRODUCT){
                ?>
                $('#search').keyup(function (){
                    fillProdutoBackoffice(this.value);
                });
                fillProdutoBackoffice();
                <?php
                } elseif($menu==COMPANIES){
                ?>
                $('#search').keyup(function (){
                    fillEmpresasBackoffice(this.value);
                });
                fillEmpresasBackoffice();
                <?php
                } elseif($menu==GENRES){
                ?>
                $('#search').keyup(function (){
                    fillGenerosBackoffice(this.value);
                });
                fillGenerosBackoffice();
                <?php
                } elseif($menu==PLATFORMS){
                ?>
                $('#search').keyup(function (){
                    fillPlataformasBackoffice(this.value);
                });
                fillPlataformasBackoffice();
                <?php
                } elseif($menu==GAMESFRONT){
                ?>
                $('#search').keyup(function (){
                    fillJogosFrontoffice(this.value);
                });
                fillJogosFrontoffice();
                <?php
                } elseif($menu==REVIEWSFRONT){
                ?>
                $('#search').keyup(function (){
                    fillReviewsFrontoffice(this.value);
                });
                fillReviewsFrontoffice();
                <?php
                } elseif($menu==OUTLETFRONT){
                ?>
                $('#search').keyup(function (){
                    fillOutletFrontoffice(this.value);
                });
                fillOutletFrontoffice();
                <?php
                } elseif($menu==NOTICIASFRONT){
                ?>
                $('#search').keyup(function (){
                    fillBlogFrontOffice(this.value);
                });
                fillBlogFrontOffice();
                <?php
                } elseif($menu==CONSOLASFRONT){
                ?>
                $('#search').keyup(function (){
                    fillConsolasFrontOffice(this.value);
                });
                fillConsolasFrontOffice();
                <?php
                } elseif($menu==ACESSORIOSFRONT){
                ?>
                $('#search').keyup(function (){
                    fillAcessoriosFrontOffice(this.value);
                });
                fillAcessoriosFrontOffice();
                <?php
                }
                ?>
            })

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

    <header class="header-section" >

        <div class="logo" style="width: 100%;">
                <div class="text-center">
                    <a href="index.php"><img src="img/gameOn.png" alt="LOGO"></a>
                </div>

        </div>



            <!--************************************** CARRINHO*******************************************-->


        <div style="width: 20%; float: right; ">
            <div class="col-lg-12" >
                <div class="ht-options">
                    <div class="row">
                        <div class="ht-widget">
                            <?php
                            if(!isset($_SESSION['id'])){
                                ?>
                                <ul class="float-right" style="margin-top: 15px">
                                    <li> <span onclick="document.getElementById('id01').style.display='block'">
                            <a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 17px;"><span class="badge badge-light" style="color: black; font-size: 16px">Login</span></a></span> </li>

                                    <li><span onclick="document.getElementById('id02').style.display='block'">
                                            <a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 17px;"> <span class="badge badge-danger" style="font-size: 16px">Register</span></a></span></li>
                                </ul>
                                <?php
                            }else{
                            $con=mysqli_connect("localhost","root","","pap2021gameon");
                            $sql="select * from users inner join perfis on userId=perfilUserId where userId=".$_SESSION['id'];
                            $result=mysqli_query($con, $sql);
                            $dados=mysqli_fetch_array($result);
                            ?>
                            <ul>
                                <li style="float: right"><div class="ht-widget"">
                                    <ul class="float-right">
                                        <div class="dropdown">
                                            </span><a href="#" ><button class="dropdown-toggle" style="background-color: transparent"><a href="perfilUser.php?id=<?php echo $dados["perfilId"] ?>" ><img src="<?php echo $dados["perfilAvatarURL"] ?>" style="width: 60px; height: 60px; border-radius: 50%; float: left;"></a><span style="margin-left: 10px"></span></button></a>
                                            <div class="dropdown-content" style="background-color: #202020; color: #FFF">

                                                <span><?php echo $dados["perfilNome"]?></span>
                                                <hr>
                                                <?php
                                                $con=mysqli_connect("localhost","root","","pap2021gameon");
                                                $sql="select * from users inner join perfis on userId=perfilUserId where userId=".$_SESSION['id'];
                                                $result=mysqli_query($con, $sql);
                                                $dados=mysqli_fetch_array($result);
                                                if($dados["userType"]=="admin"){
                                                    ?>
                                                    <li ><a href="backoffice/Backoffice.php"><button type="button" class="btn btn-danger" style="fp"> Backoffice</button></a></li>
                                                    <li ><a href="logout.php"><button class="btn btn-primary"><span  style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 17px;"><i class="fa fa-sign-out"></i>Sign out</span></button></a></li>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <li ><a href="logout.php"><button class="btn btn-primary"><span  style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 17px;"><i class="fa fa-sign-out"></i>Sign out</span></button></a></li>
                                                    <?php
                                                }
                                                ?>


                                            </div>
                                        </div>
                                    </ul>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!--************************************** FIM PERFIL*******************************************-->
            
            <div style=" text-align: left">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="ht-widget">
                            <div class="button-dropdown" style="margin-bottom:10%">
                                <div id="mySidenav" class="sidenav" style="color: #0b0b0b!important; margin-left: 3px">
                                    <div style="width: 100%; text-align: center"><h3 style="color: #0d0d0d; font-family: 'Lato',sans-serif;">Carrinho:</h3></div>
                                    <hr>
                                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                                    <?php
                                    if(isset($_SESSION['id'])){

                                        ?>

                                        <?php
                                        $lista="(0";
                                        if(isset($_SESSION['carrinho'])){
                                            foreach ($_SESSION['carrinho'] as $produto){
                                                $lista.=",".$produto;
                                            }
                                        }
                                        $lista.=")";

                                        $sql1="select * from produtos where produtoId in ".$lista;



                                        $result1=mysqli_query($con,$sql1);
                                        $precoTotal=0;
                                        $k=0;
                                        while($dados2=mysqli_fetch_array($result1)){

                                            ?>
                                            <div style="margin-right: 20px; margin-left: 20px">
                                                <?php  $k++; ?> <img src="img/<?php echo $dados2["produtoImagemURL"] ?>" style="height: 60px; width: 70px;" > <?php echo $dados2["produtoNome"] ?>:</a> &nbsp;<span id="preco" style="color: #0b0b0b; font-size: 20px"><strong><?php echo $dados2["produtoPreco"] ?>€</strong> </span>
                                                    <button onclick="confirmaEliminaCarrinhoProduto(<?php echo $dados2["produtoId"]?>)" style="float: right; background-color: transparent;color: #FFF"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px; font-size: 20px"></i></button></span>
                                                <p style="color: #000000!important;"><input type="number" name="quantidade" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>
                                                <hr>
                                            </div>



                                            <?php
                                            $precoTotal+=$dados2["produtoPreco"];
                                        }?>



                                        <?php
                                        $lista="(0";
                                        if(isset($_SESSION['carrinho'])){
                                            foreach ($_SESSION['carrinho'] as $jogo){
                                                $lista.=",".$jogo;
                                            }
                                        }
                                        $lista.=")";

                                        $sql2="select * from jogos where jogoId in $lista";


                                        $result2=mysqli_query($con,$sql2);

                                        while($dados3=mysqli_fetch_array($result2)){

                                                ?>
                                                <div style="margin-right: 20px; margin-left: 20px">
                                                 <?php  $k++; ?> <img src="img/<?php echo $dados3["jogoImagemURL"] ?>" style="height: 60px; width: 70px;" > <?php echo $dados3["jogoNome"] ?>:</a>
                                                    &nbsp;<span id="preco" style="color: #0b0b0b; font-size: 20px"><strong><?php echo $dados3["jogoPreco"] ?>€</strong> </span>
                                            <button onclick="confirmaEliminaCarrinhoJogo(<?php echo $dados3["jogoId"]?>)" style="float: right; background-color: transparent;color: #FFF"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px; font-size: 20px"></i></button></span>
                                            <p style="color: #000000!important;"><input type="number" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>
                                            <hr>
                                            </div>
                                            <?php

                                            $precoTotal+=$dados3["jogoPreco"];
                                        }?>

                                          <?php
                                        if($k!=0){
                                            ?>
                                        <span style="color: #000000!important; font-size: 20px; font-weight: 500;margin-left: 20px">Total (<?php echo $k; ?>): <?php echo $precoTotal ?>&nbsp;€</span>
                                        <div style="float: right">
                                        <button onclick="confirmaEliminaCarrinho()" class="btn btn-warning" style="color: #0b0b0b; ">Remover Todos</button>
                                        <a href="checkout.php"><button type="button" class="btn btn-danger" style="float: right">Checkout</button></a>
                                        </div>

                                        <?php
                                        }else{
                                        ?>
                                            <span style="color: #000000!important; font-size: 20px; font-weight: 500; ">Total : <?php echo $precoTotal; ?>&nbsp;€</span>
                                        <?php
                                         }
                                        ?>


                                        <?php
                                    }else{
                                        $k=0;
                                        ?>

                                        <div style="text-align: center"><span>Para adicionar produtos ao carrinho faça</span><span onclick="document.getElementById('id01').style.display='block', closeNav();">
                                                <a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 14px;"><span class="badge badge-light" style="color: black; font-size: 16px">Login</span></a></span></div>

                                        <?php
                                    }
                                    ?>
                                </div>


                                <span style="font-size:30px; cursor:pointer" onclick="openNav()"><i class="fa fa-shopping-cart" style="font-size: 1em"></i></span>

                                <script>
                                    function openNav() {
                                        document.getElementById("mySidenav").style.width = "450px";
                                    }

                                    function closeNav() {
                                        document.getElementById("mySidenav").style.width = "0";
                                    }
                                </script>


                                <?php
                                if(isset($_SESSION['id'])){
                                ?>
                                <span id="bdg1" class="badge badge-dark" style="font-size: 15px; color: #FFFFFF!important;"><?php echo $k ?></span>
                                <span id="bdg2" class="badge badge-dark" style="font-size: 15px; color: #FFFFFF!important;"><?php echo $precoTotal."€"; ?></span>
    <?php
                                }else{
    ?>

    <?php
                                }
    ?>



                            </div>
                            <!--************************************** FIM CARRINHO*******************************************-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>






        <div class="nav-options" style="width: available; height: 140px; text-align: center">
            <div class="container">

                <!-- <div class="nav-search search-switch">
                     <i class="fa fa-search"></i>
                 </div> -->
                <div class="nav-menu" style="font-size: 20px; color: #fff; margin-top: 15px; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000; ">
                    <ul>
                        <li><a href="./index.php"><span ><strong>Home</strong></span></a></li>
                        <li><a href="#"><span style="font-size: 20px; color: #fff; "><strong>Loja</strong><i class="fa fa-angle-down"></i></span></a>
                            <div class="dropdown">
                                <ul >
                                    <li ><a href="consolas.php" >Consolas</a></li>
                                    <li><a href="jogos.php" >Jogos</a></li>
                                    <li><a href="acessorios.php" >Acessórios</a></li>
                                    <li><a href="outlet.php" >Outlet</a></li>
                                </ul>
                            </div>
                        </li>



                        <li><a href="reviews.php"><span><strong>Reviews</strong> </span></a></li>

                        <li><a href="blog.php"><span><strong>Blog</strong> </span></a></li>



                    </ul>

                </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--************************************** PERFIL*******************************************-->

        </div>
    </header>

<?php
}
?>


    <?php
function bottom(){
    ?>


    <footer class="footer-section">
        <div class="container">

            <div class="footer-about">
                <div class="fa-logo">
                    <a href="index.php"><img src="img/gameOn.png">
                        <p>Podes nos seguir na nossa Redes Sociais para seguires</p>
                        <p> as novidades da loja e do mundo do gaming à tua volta.</p></a>
                    <a href="https://www.igdb.com/discover" style="margin-left: 20%;"><img src="img/igdb2.png" style="width: 200px; height: 200px"><p>The data was freely <pro></pro>vided by </p><a href="https://www.igdb.com/discover">IGDB.com</a></a>
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
        <div class="copyright-area"  style="text-align: center" >
            <div class="row">
                <div class="col-lg-6">

                    <div class="ca-text" style="margin-left: 25px"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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

<div id="id02" class="modal">
    <form  class="modal-content animate" action="confirmaRegistar.php" method="post" enctype="multipart/form-data" >
        <div class="imgcontainer">
            <div style="width: 100%; text-align: center"><img src="img/Game.png" style="width: 30%"></div>
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="container" style="margin-top: 5%;margin-bottom: 2%">

            <div class="form-floating mb-3">
                <label for="floatingInput"  id="userName" style="color: #FFF; background-color: #0d0d0d; border-radius: 4px;width: 180px; text-align: center"><b>Nome de Utilizador:</b></label>
                <input type="text" class="form-control" id="floatingInput" name="userName" placeholder="Introduza o seu nome.."  required> <!-- PerfilNome -->
            </div>

            <div class="form-floating mb-3">
                <label id="password" for="floatingInput" style="color: #FFF; background-color: #0d0d0d; border-radius: 4px; width: 130px; text-align: center"><b>Palavra-passe:</b></label>
                <input type="password" class="form-control" id="floatingInput"  name="password" placeholder="Introduza uma password que se lembre.."  required> <!-- Password -->
            </div>



            <div class="form-floating mb-3">
                <label id="password" for="floatingInput" style="color: #FFF; background-color: #0d0d0d; border-radius: 4px; width: 130px; text-align: center"><b>Email:</b></label>
                <input type="email" class="form-control" id="floatingInput"  name="email" placeholder="ex: teste@gmail.com" required> <!-- Password -->
            </div>


            <div class="form-floating mb-3">
                <label id="imagem" for="floatingInput" style="color: #FFF; background-color: #0d0d0d; padding: 5px 10px 5px 10px; border-radius: 4px; width: auto; text-align: center"><b>Imagem de Perfil:</b></label> <!-- Imagem -->
            </div>
            <input type="file" accept="image/*" name="perfilAvatarURL" onchange="preview_image(event)" style="color: darkgray">


            <div style="float: right"> <button type="submit" style=" border-radius: 10px;background-color: #FF0000; height: 45px; width: 100px"><strong>Registar</strong></button></div>
        </div>

    </form>

    </div>


    <!--*********** Modal Login ************** -->

    <div id="id01" class="modal">

        <form class="modal-content animate" action="confirmaLogin2.php" method="post"  id="frmConfirma" >
            <div class="imgcontainer">
                <img src="img/Game.png">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
                <h4>Entrar:</h4>
                <br>
                <div class="form-floating mb-3">
                    <label for="floatingInput"  id="userName" style="color: #FFF; background-color: #0d0d0d; border-radius: 4px;width: 180px; text-align: center"><b>Nome de Utilizador:</b><span id="NoName"></span></label>
                    <input type="text" class="form-control"  name="nome"  id="nome" required>
                </div>

                <div class="form-floating mb-3">
                    <label id="password" for="floatingInput" style="color: #FFF; background-color: #0d0d0d; border-radius: 4px; width: 130px; text-align: center"><b>Palavra-passe:</b> <span id="NoPass"></span></label>
                    <input type="password" class="form-control"  id="password"  name="password" required>
                </div>
                <button onclick="entrar()" type="submit" style="background-color: #FF0000; height: 45px; width: 100px"><strong>Login</strong></button>
                <hr>

            </div>

            <div class="container" style="background-color:#f1f1f1; color: #0d0d0d">
                <span class="password">Esqueci-me da <a href="editaPassword.php" style="color: #00aff1">palavra-passe?</a></span>
            </div>
        </form>
    </div>








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