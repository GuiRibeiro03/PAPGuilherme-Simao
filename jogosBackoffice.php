<?php
include_once("includes/body.inc.php");
top();

?>



<table class="table-striped" style="color: black; background-color: #FFFFFF; font-weight: bold; width: 100%; margin-left: 20px">

<tr>
<td colspan="3" style="margin-bottom: 10px">
<a href="AdicionaJogo.php" style="color: black">Adicionar</a>
</td>
</tr>
<tr>
    <th>Id</th>
    <th>Nome</th>
    <th>Imagem</th>
    <th>Preço</th>
    <th colspan="2">Opções</th>
</tr>

<tr style="margin-top: 20px">
<td>#1</td>

<td>Nome do Jogo</td>
<td><img src="img/jogos/cyberpunk2077.png" style="width: 220px; height: 210px"></td>
<td>69,90€</td>
<td><a href="EditaJogo.php">Editar</a></td>
<td><a href="#" onclick="confirmaElimina(1)">Remover</a></td>

</tr>


</table>

<?php
bottom();
?>

<script>
    function confirmaElimina(id) {
        if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
            window.location="../elimina/eliminaCanais.php?id=" + id;
    }


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