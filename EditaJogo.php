<?php
include_once ("includes/body.inc.php");
top();
?>
<form action="confirmaEditaJogo.php" method="post" enctype="multipart/form-data" style="color: #FFFFFF; margin-left: 30px">
    <a href="jogosBackoffice.php"><button type="button" class="btn btn-primary"></button></a>
<h2>Editar Jogo</h2>
<hr>
    <div><img id="output_image" src="img/jogos/cyberpunk2077.png" style="margin-left: 20px; margin-bottom: 20px"/></div>
<input type="file" name="jogoImagemURL" accept="image/*" onchange="preview_image(event)">
  <div style="margin-top: 20px">
    <label>Titulo:</label>
    <input type="text" name="jogoNome">
    <label>Preço: </label>
    <input type="number" name="jogoPreco">
    <div style="font-size: 20px;">
    <div><input type="checkbox" name="Tags">Playstation</div>
    <div><input type="checkbox" name="Tags">Computador</div>
    <div><input type="checkbox" name="Tags">CD Projekt Red</div>
    <div><input type="checkbox" name="Tags">Escandalo</div>
    <div><input type="checkbox" name="Tags">Uma xota</div>
  </div>
    </div>

    <input type="Submit" value="Edita"><br>
</form>

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
