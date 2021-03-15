<?php
include_once("../includes/body.inc.php");
top();
?>
<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Adicionar Review</span></div>



<section class="store" style="margin-top: 100px; margin-left: 50px">

    <a href="../backoffice/reviewsBackoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>






    <form action="ConfirmaNovaNoticia.php" method="post" enctype="multipart/form-data" style="color: #FFFFFF; font-size: 18px; width: 100%">


        <div id="wrapper" style="color: #FFFFFF">
            <input type="file" accept="image/*" onchange="preview_image(event)">
            <div style="height: 20px"></div>
            <img id="output_image"/>
        </div>
        <br>


        <div class="mb-3">
            <label  class="form-label">Titulo</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Titulo" style="width: 40%" autofocus>
        </div>
        <div class="mb-3">
            <label  class="form-label">Review</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="20" style="width: 70%"></textarea>
        </div>





        <div class="mb-3" style="width: 300px">
            <label  class="form-label">Pontos Positivos:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"  rows="5" ></textarea>
            <label  class="form-label">Pontos Negativos:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"  rows="5"  ></textarea>

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
            <input class="form-check-input" type="checkbox" value=""  >
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



