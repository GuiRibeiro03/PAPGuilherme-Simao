<?php
include_once("includes/bodyBase.inc.php");
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Amin Template">
    <meta name="keywords" content="gameOn, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game On</title>

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
    <link rel="stylesheet" href="css/adressForm.css" type="text/css">

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
                                        <span> <img src="img/ps4.png" height="60px" width="70px"> Playstation 4 Slim 500Gb: &nbsp;<span id="preco"><strong>399,90€</strong></span>  <button style="float: right"><i class="fa fa-close" style="color: red"></i></button></span>
                                        <p><input type="number" value="1" min="1" style="width: 50px; text-align: center"></p>
                                        <hr>
                                        <span> <img src="img/ps4.png" height="60px" width="70px"> Playstation 4 Slim 500Gb: &nbsp;<span id="preco2"><strong>399,90€</strong></span>    <button style="float: right"><i class="fa fa-close" style="color: red"></i></button></span>
                                        <p><input type="number" value="1" min="1" style="width: 50px; text-align: center"></p>
                                        <hr>

                                        <span></spam><strong>Total: 799,80€</strong></span> <a href="#"><button type="button" class="btn btn-danger" style="float: right">Checkout</button></a>
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
                    <a href="./index.php"><img src="img/gameOn.png" alt=""></a>
                </div>
            </div>
        </div>
        </div>




        <div class="nav-options">
            <div class="container" >

                <!-- <div class="nav-search search-switch">
                     <i class="fa fa-search"></i>
                 </div> -->
                <div class="nav-menu" >
                    <ul>
                        <li class="active"><a href="./index.php"><span style="font-size: 20px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;"><strong>Home</strong></span></a></li>
                        <li><a href="#"><span style="font-size: 20px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;"><strong>Loja</strong><i class="fa fa-angle-down"></i></span></a>
                            <div class="dropdown">
                                <ul>
                                    <li><a href="consolas.php">Consolas</a></li>
                                    <li><a href="jogos.php">Jogos</a></li>
                                    <li><a href="acessorios.php">Acessórios</a></li>
                                </ul>
                            </div>
                        </li>



                        <li><a href="reviews.php"><span style="font-size: 20px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;"><strong>Reviews</strong> </span></a></li>

                        <li><a href="blog.php"><span style="font-size: 20px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;"><strong>Blog</strong> </span></a></li>


                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Criticas -->
    <section class="latest-preview-section" style="height: 100%; width: 100%">
        <div class="row">
        <div class="col-8">
            <div class="container" style="background-color: #e7e7e7">
                <form action="/action_page.php">
                    <span style="color: Black; font-size: 45px;"><strong>Endereço de Entrega   &nbsp;|&nbsp;&nbsp;   Pagamento</strong></span>
                    <hr>
                    <div class="row">
                        <div class="col-50">
                            <label for="fname"><i class="fa fa-user"></i> Nome completo</label>
                            <input type="text" id="fname" name="firstname" placeholder="O seu nome">
                            <label for="email"> Email</label>
                            <input type="text" id="email" name="email" placeholder="O seu email">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Morada</label>
                            <input type="text" id="adr" name="address" placeholder="O seu endereço">
                            <label for="city"><i class="fa fa-institution"></i> Cidade</label>
                            <input type="text" id="city" name="city" placeholder="A sua cidade">

                            <div class="row">
                                <div class="col-50">
                                    <label for="zip"><i class="fa fa-envelope"></i> Código Postal</label>
                                    <input type="text" id="zip" name="zip" placeholder="0000">
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <label for="fname"><i class="fa fa-credit-card"></i> Cartões Aceites</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname"><i class="fa fa-pencil" aria-hidden="true"></i> Nome no cartão</label>
                            <input type="text" id="cname" name="cardname" placeholder="O nome no seu cartão">
                            <label for="ccnum"><i class="fa fa-credit-card"></i> Número do cartão</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="0000-0000-0000-0000" maxlength="19">
                            <label for="expmonth">Data de Expiração</label>
                            <input type="date" min="27-02-2021" id="expmonth" name="expmonth">

                                <div class="col-50" style="padding-top: 10px">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="000" style="width: 100px" min="000" max="999" maxlength="3">
                                </div>
                        </div>

                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Endereço de entrega igual ao de pagamento
                    </label>
                    <input type="submit" value="Aplicar" class="btn btn-danger" style="width: 100%; height: 50px">
                </form>
            </div>
            </div>
        <div class="col-4">

            <div class="container" style="background-color: #e7e7e7; ">
                <span style="color: black; font-size: 45px; font-weight: bold">Finalizar:</span>
                <hr>
                <ul style="background-color: #e7e7e7; padding: 10px 20px;">
                    <span> <img src="img/ps4.png" height="60px" width="70px"> Playstation 4 Slim 500Gb: &nbsp;<span id="preco"><strong>399,90€</strong></span>  <button style="float: right"><i class="fa fa-close" style="color: red"></i></button></span>
                    <p><input type="number" value="1" min="1" style="width: 50px; text-align: center"></p>
                    <hr>
                    <span> <img src="img/ps4.png" height="60px" width="70px"> Playstation 4 Slim 500Gb: &nbsp;<span id="preco2"><strong>399,90€</strong></span>    <button style="float: right"><i class="fa fa-close" style="color: red"></i></button></span>
                    <p><input type="number" value="1" min="1" style="width: 50px; text-align: center"></p>
                    <hr>
                    <span> Número de produtos: <strong>2</strong></span>
                </ul>
                <input type="text" style="width: 40%; font-size: 18px; padding-top: 5px; font-weight: bold" placeholder="Código Promocional">&nbsp;<a href="#"><button type="submit" class="btn btn-danger" style="height: 49px; width: 100px;"> Aplicar</button></a> <br>
                <span style="color: black; font-size: 30px; font-weight: bold">Total a pagar:&NonBreakingSpace;799.80€</span>
                <br>
                <a href="#"><button class="btn btn-danger" style="height: 50px; width: 80%; font-size: 20px">Finalizar Compra</button></a>
            </div>
        </div>
        </div>
    </section>






    <!-- Footer Section Begin -->
    <footer class="footer-section" style="padding-top: 100%">
        <div class="container">

                    <div class="footer-about">
                        <div class="fa-logo">
                            <a href="#"><img src="img/gameOn.png" alt=""></a>
                        </div>
                        <p>Podes nos seguir na nossa Redes Sociais para seguires as novidades da loja e do mundo do gaming à tua volta.</p>
                        <div class="fa-social">
                            <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/igndotcom/"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
            </div>
            <div class="copyright-area">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ca-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ca-links">
                            <a href="#">About</a>
                            <a href="#">Subscribe</a>
                            <a href="#">Contact</a>
                            <a href="#">Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <div class="signup-section">
        <div class="signup-close"><i class="fa fa-close"></i></div>
        <div class="signup-text">
            <div class="container">
                <div class="signup-title">
                    <h2>Sign up</h2>
                    <p>Fill out the form below to recieve a free and confidential</p>
                </div>
                <form action="#" class="signup-form">
                    <div class="sf-input-list">
                        <input type="text" class="input-value" placeholder="User Name*">
                        <input type="text" class="input-value" placeholder="Password">
                        <input type="text" class="input-value" placeholder="Confirm Password">
                        <input type="text" class="input-value" placeholder="Email Address">
                        <input type="text" class="input-value" placeholder="Full Name">
                    </div>
                    <div class="radio-check">
                        <label for="rc-agree">I agree with the term & conditions
                            <input type="checkbox" id="rc-agree">
                            <span class="checkbox"></span>
                        </label>
                    </div>
                    <button type="submit"><span>REGISTER NOW</span></button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Section End -->

    <!-- Sign Up Section Begin -->

    <!-- Sign Up Section End -->

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