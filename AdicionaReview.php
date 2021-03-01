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
    <link rel="shortcut icon" href="onbutton.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <script type='text/javascript'>
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



    </script>


</head>

<body  style="background-color: #0d0d0d; height: 100%" >
<!-- Page Preloder -->


<header class="header-section">
    <div class="ht-options">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-8">
                    <div class="ht-widget">
                        <ul class="float-right">
                            <li class="signup-switch signup-open"><i class="fa fa-sign-out"></i> Login / Sign up
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-12 col-md-8">
                    <div class="ht-widget">
                        <ul class="float-right">
                            <li><i class="fa fa-shopping-cart"></i>Carrinho &nbsp;<span class="badge badge-danger">0</span></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logo">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="./index.html"><img src="gameOn.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</header>
<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Adicionar Nova Notícia</span></div>

<section class="store" style="padding:50px">

    <a href="reviews.html"><button type="button" class="btn btn-danger">Voltar</button></a>

<form action="ConfirmaNovaNoticia.php" method="post" enctype="multipart/form-data" style="color: #FFFFFF; font-size: 18px">
    <label style="color:white; width: 5%;">Titulo:</label>
    <input type="text" name="noticiaNome" style="width: 20%; font-weight: bold">
    <br>
    <br>


    <div id="wrapper" style="color: #FFFFFF">
        <input type="file" accept="image/*" onchange="preview_image(event)">
        <div style="height: 20px"></div>
        <img style="border: 2px white" id="output_image"/>
    </div>
    <br>

    <span >Review:</span>
    <div class="row" style="color:white">

    <br>
        <textarea name="texto1"  rows="8"  cols="100" placeholder="Write your review here"></textarea>

    </div>

    <div class="row" style="color: #FFFFFF; padding-top: 40px;">
        <span>Pontos Positivos:</span>
   <textarea name="bons"  rows="8" cols="40"></textarea>
<div style="width: 50px"></div>

       <span>Pontos Negativos:</span>
        <textarea name="maus"  rows="8" cols="40"></textarea>

    </div>


<br>

    <input type="checkbox" name="tagProduto"><span style="color:white"> PlayStation</span> <input type="checkbox" name="tagProduto"><span style="color:white"> Computador</span> <input type="checkbox" name="tagProduto"><span style="color:white"> Gaming</span> <br>
    <br>
    <input type="Submit" value="Adicionar" style="width: 100px; height: 50px">



</section>



</body>
</html>
<?php



