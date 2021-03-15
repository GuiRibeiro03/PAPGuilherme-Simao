<?php
include_once("includes/body.inc.php");
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
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="shortcut icon" href="../onbutton.ico">




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

        function preview_image2(event)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image2');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function preview_image3(event)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image3');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function preview_image4(event)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image4');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

    </script>

</head>

<body>
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
                    <a href="../index.php"><img src="../gameOn.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</header>
<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Adicionar Novo Produto</span></div>

<section class="store" style="padding:50px">

    <a href="../outletBackoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>

<form action="ConfirmaNovoAnuncio.php" method="post" enctype="multipart/form-data">
    <label style="color:white; font-size: 15px" class="badge badge-dark">Nome do Produto:</label>
    <input type="text" name="produtoNome" style="width: 20%"><hr>





    <label style="color:white; font-size: 15px" class="badge badge-dark">Preço original:</label>
    <input type="number" name="originalPreco"><hr>


<div style="margin-top: 20px">
    <label style="color:white; font-size: 15px" class="badge badge-dark">Descrição do produto:</label>
    <textarea cols="50" rows="10" name="produtoDescricao"></textarea>
    </div>
    <hr>

    <div style="margin-top:20px; margin-bottom: 20px; color:white">
        <label style="color:white; font-size: 15px" class="badge badge-dark">Imagem principal:</label>
    <input type="file" accept="image/*" onchange="preview_image(event)">
            <img id="output_image"/>
    </div>
    <hr>

    <label style="color:white; font-size: 15px" class="badge badge-dark">Imagens de apresentação:</label>
    <div class="row" style="margin-top: 30px; margin-bottom: 30px; margin-left: 5px; color: white">
        <div>
            <input type="file" accept="image/*" onchange="preview_image2(event)">
            <img id="output_image2"/>
         </div>

        <div>
            <input type="file" accept="image/*" onchange="preview_image3(event)">
            <img id="output_image3"/>
        </div>

        <div>
            <input type="file" accept="image/*" onchange="preview_image4(event)">
            <img id="output_image4"/>
        </div>


    </div>

    <label style="color:white; font-size: 15px" class="badge badge-dark">Seu preço:</label>
    <input type="number" name="produtoPreco" style="margin-bottom: 20px"><hr>
    <input type="Submit" class="btn btn-danger" style="width: 100px;">

</form>

</section>


</body>
</html>




