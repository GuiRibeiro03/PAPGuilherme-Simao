<?php
include_once("../includes/body.inc.php");
top();
?>

<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Adicionar Nova Notícia</span></div>

<section class="store" style="margin:50px">

    <a href="../backoffice/Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>

<form action="../Confirma/confirmaNovaNoticia.php" method="post" enctype="multipart/form-data">
    <h4>Titulo:</h4>
    <input type="text" name="noticiaTitulo"  style="width: 50%;">
    <br>
    <br>


    <div id="wrapper" style="color: #FFFFFF">
        <span></span>
        <input type="file" accept="image/*" name="noticiaImagemFundoURL" onchange="preview_image(event)">
        <img id="output_image"/>
    </div>
    <br>
    <div id="wrapper" style="color: #FFFFFF">
        <input type="file" accept="image/*" name="noticiaImagemURL" onchange="preview_image(event)">
        <img id="output_image"/>
    </div>
    <br>


   <div style="width: 100%;">
       <h4>Desenvolvimento:</h4>
       <textarea cols="100" rows="20" name="noticiaDesenvolvimento"></textarea>
   </div>

<br>

    <div style="margin-top: 40px; margin-bottom: 40px">
        <h4>Data:</h4>
        <input type="date" name="noticiaData">

    </div>



    <input type="Submit" class="btn btn-danger" value="Adiciona"><br>

</form>
</section>

<?php
bottom();
?>



