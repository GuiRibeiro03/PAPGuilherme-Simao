<?php

include_once ("includes/body.inc.php");
top();
?>
<form action="confirmaEditaAcessorio.php" method="post" enctype="multipart/form-data" style="color: #FFFFFF; margin-left: 30px">
    <a href="acessoriosBackoffice.php"><button type="button" class="btn btn-primary">Voltar</button></a>
<h2>Editar Acessório</h2>
<hr>
    <div><img id="output_image" src="img/acessorios/dualshock4.png" style="margin-left: 20px; margin-bottom: 20px"/></div>
<input type="file" name="acessorioImagemURL" accept="image/*" onchange="preview_image(event)">
  <div style="margin-top: 20px">
      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Nome:</label>
    <input type="text" name="acessorioNome">
      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Preço: </label>
    <input type="number" name="acessorioPreco">
      <hr>

    </div>
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
