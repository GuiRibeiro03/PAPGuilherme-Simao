<?php
include_once("config.inc.php");
$con=mysqli_connect(HOST,USER, PASSWORD,DATABASE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

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
                                <ul class="float-right">
                                    <li> <span onclick="document.getElementById('id01').style.display='block'"><a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 17px;">
                            <span class="badge badge-light" style="color: black; font-size: 16px">Login</span></a></span>

                                    </li>

                                    <li>|</li>

                                    <li><span onclick="document.getElementById('id02').style.display='block'"><a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 17px;">
                            <span class="badge badge-danger" style="font-size: 16px">Register</span></a></span></li>
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
                                            </span><a href="perfilUser.php?id=<?php echo $dados["perfilId"] ?>" ><button class="dropdown-toggle" style="background-color: transparent"><img src="<?php echo $dados["perfilAvatarURL"] ?>" style="width: 60px; height: 60px; border-radius: 50%; float: left;"><span style="margin-left: 10px"></span></button></a>
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
                                                    <li ><a href="backoffice/Backoffice.php"><button type="button" class="btn btn-danger">Backoffice</button></a></li>
                                                    <li ><a href="adiciona/AdicionaPerfil.php"><button type="button" class="btn btn-info">Add Perfil</button></a></li>
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

            <div style="50%; text-align: left">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="ht-widget">
                            <div class="button-dropdown" >
                                <div id="mySidenav" class="sidenav" style="color: #0b0b0b!important; margin-left: 3px">
                                    <h3 style="color: #0d0d0d; font-family: 'Arial Black'"><strong>Carrinho:</strong></h3>
                                    <hr>
                                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                                    <?php
                                    if(isset($_SESSION['id'])){

                                        ?>

                                        <?php
                                        $con=mysqli_connect("localhost","root","","pap2021gameon");
                                        $sqlprod="select * from produtos where produtoTipo='consola' ";
                                        $resultprod=mysqli_query($con, $sqlprod);
                                        $i=0;
                                        $k=0;
                                        while($dadosprod=mysqli_fetch_array($resultprod)){

                                            ?>
                                            <div >
                                                <span style="color: #000000!important; font-size: 20px"> <img src="img/<?php echo $dadosprod["produtoImagemURL"] ?>" style="height: 60px; width: 70px;" > <?php echo $dadosprod["produtoNome"] ?>: &nbsp;<span id="preco" style="color: #0b0b0b; font-size: 20px"><strong><?php echo $dadosprod["produtoPreco"] ?>€</strong> </span>
                                                    <button style="float: right; background-color: transparent;color: #FFF"><i class="fa fa-trash" style="color: red; background-color: transparent; margin-top: 40px; font-size: 20px"></i></button></span>
                                                <p style="color: #000000!important;"><input type="number" value="1" min="1" style="width: 50px; text-align: center">&nbsp;&nbsp;<button type="submit" class="btn btn-primary" style="width: 100px; height: 30px">Atualizar</button></p>
                                                <hr>
                                            </div>
                                            <?php
                                            $k++;
                                            $i+=$dadosprod["produtoPreco"];
                                        }?>
                                        <span style="color: #000000!important; font-size: 20px; font-weight: 400">Total: <?php echo $i ?>&nbsp;€</span> <a href="checkout.php"><button type="button" class="btn btn-danger" style="float: right">Checkout</button></a>

                                        <?php
                                    }else{
                                        $k=0;
                                        ?>

                                        <div class="row"><span>Para adicionar produtos ao carrinho,</span><span onclick="document.getElementById('id01').style.display='block'"><a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 14px;"><span class="badge badge-light" style="color: black; font-size: 16px">Login</span></a></span></div>

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


                                <span id="bdg1" class="badge badge-danger" style="font-size: 15px; color: #FFFFFF!important;"><?php echo $k ?></span>

                            </div>
                            <!--************************************** FIM CARRINHO*******************************************-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>






        <div class="nav-options" style="width: available; height: 120px">
            <div class="container">

                <!-- <div class="nav-search search-switch">
                     <i class="fa fa-search"></i>
                 </div> -->
                <div class="nav-menu" style="font-size: 20px; color: #fff; ">
                    <ul>
                        <li><a href="./index.php"><span ><strong>Home</strong></span></a></li>
                        <li><a href="#"><span style="font-size: 20px; color: #fff; "><strong>Loja</strong><i class="fa fa-angle-down"></i></span></a>
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

        <form class="modal-content animate" action="confirmaLogin.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="img/Game.png">
            </div>
            <div class="container">
                <select name="utilizador" >
                    <option value="-1">Utilizador...</option>
                    <?php
                    $con=mysqli_connect("localhost","root","","pap2021gameon");
                    $sql="select * from users";
                    $res = mysqli_query($con,$sql);
                    while ($dados=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $dados['userId'] ?>"><?php echo $dados['userName'] ?></option>

                        <?php
                    }
                    ?>
                </select>
                <input type="submit" class="btn btn-danger" value="Entrar">
                  <hr>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
                <span class="password">Esqueces-te da <a href="#" style="color: #00aff1">&nbsp;password?</a></span>
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