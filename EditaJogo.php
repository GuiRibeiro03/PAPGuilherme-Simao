<?php

include_once ("includes/body.inc.php");
top();
?>
<form action="confirmaEditaJogo.php" method="post" enctype="multipart/form-data" style="color: #FFFFFF; margin-left: 30px">
    <a href="jogosBackoffice.php"><button type="button" class="btn btn-primary">Voltar</button></a>
<h2>Editar Jogo</h2>
<hr>
    <div><img id="output_image" src="img/jogos/cyberpunk2077.png" style="margin-left: 20px; margin-bottom: 20px"/></div>
<input type="file" name="jogoImagemURL" accept="image/*" onchange="preview_image(event)">
  <div style="margin-top: 20px">
      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Nome:</label>
    <input type="text" name="jogoNome">
      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Preço: </label>
    <input type="number" name="jogoPreco">
      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Sinopse:</label>
      <input type="text" name="jogoSinopse">
      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Trailer:</label>
      <input type="url" name="jogoTrailer">
      <hr>
    <div style="font-size: 20px;">
    <div class="badge badge-dark"><input type="checkbox" name="Tags">Playstation</div>
    <div class="badge badge-dark"><input type="checkbox" name="Tags">Computador</div>
    <div class="badge badge-dark"><input type="checkbox" name="Tags">CD Projekt Red</div>
      </div>
    </div>
<hr>
    <input type="Submit" class="btn btn-danger" value="Edita"><br>
</form>
<br>
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
</script>

<?php
bottom();
?>
