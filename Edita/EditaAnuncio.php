<?php

include_once("includes/body.inc.php");
top();
?>
<form action="confirmaEditaAnuncio.php" method="post" enctype="multipart/form-data" style="color: #FFFFFF; margin-left: 30px">
    <a href="outletBackoffice.php"><button type="button" class="btn btn-primary">Voltar</button></a>
<h2>Editar Anuncio</h2>
<hr>
    <div><img id="output_image" src="../img/Telemoveis/iphone8.jpg" style="margin-left: 20px; margin-bottom: 20px"/></div>
<input type="file" name="produtoImagemPrincipalURL" accept="image/*" onchange="preview_image(event)">
  <div style="margin-top: 20px">
      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Nome do Produto:</label>
    <input type="text" name="produtoNome">
      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Preço original: </label>
    <input type="number" name="produtoPrecoOriginal">
      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Seu preço: </label>
      <input type="number" name="produtoPrecoVenda">
      <hr>
      <div style="margin-top: 20px">
          <label style="color:white; font-size: 15px" class="badge badge-dark">Descrição do produto:</label>
          <textarea cols="50" rows="10" name="produtoDescricao"></textarea>
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
    </div>
<hr>
    <input type="Submit" class="btn btn-danger" value="Edita"><br>
</form>
<br>
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

<?php
bottom();
?>
