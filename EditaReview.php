<?php
include_once ("includes/body.inc.php");
top();
?>

<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Edita Review</span></div>

<section class="store" style="margin-top: 100px; margin-left: 50px">
    <a href="reviews.php"><button type="button" class="btn btn-danger">Voltar</button></a>





    <form action="ConfirmaEditaReview.php" method="post" enctype="multipart/form-data" style="color: #FFFFFF; font-size: 18px; width: 100%">


        <div id="wrapper" style="color: #FFFFFF">
            <input type="file" accept="image/*" name="reviewImagemURL" onchange="preview_image(event)">
            <div style="height: 50px">
            <img id="output_image"/></div>
        </div>
        <br>


        <div class="mb-3">
            <label  class="form-label">Titulo</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Titulo" name="reviewNome" style="width: 40%" autofocus>
        </div>


        <div class="mb-3">
            <label  class="form-label">Review</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="20" name="reviewSinopse" style="width: 70%"></textarea>
        </div>



        <div class="mb-3" style="width: 300px">
            <label  class="form-label">Pontos Positivos:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"  rows="5" name="reviewPontosPositivos" ></textarea>
            <label  class="form-label">Pontos Negativos:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"  rows="5" ame="reviewPontosNegativos"  ></textarea>

        </div>

        </div>


        <br>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" >
            <label class="form-check-label" >
                Review
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" >
            <label class="form-check-label" >
                Jogo
            </label>

        </div>
        <input type="Submit" value="Adicionar" style="width: 100px; height: 50px">



    </form>
</section>



<?php
bottom();
?>



