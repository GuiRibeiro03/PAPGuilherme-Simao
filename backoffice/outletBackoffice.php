<?php
include_once("includes/body.inc.php");
top();

?>



        <table class="table-striped" style=" color: #FFFFFF; font-weight: bold; font-size: 20px; width: 100%; height: 100%; margin-left: 20px; margin-bottom: 30px; margin-right: 20px">

        <tr>
        <td colspan="3" style="margin-bottom: 30px">
        <a href="Adiciona/AdicionaAnuncio.php" style="color: #FFFFFF"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Adicionar</button></a>
        </td>
        </tr>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Imagem</th>
            <th>Preço</th>
            <th colspan="2">Opções</th>
        </tr>

        <tr >
        <td>#1</td>

        <td>Nome do Produto</td>
        <td><img src="img/Telemoveis/iphone8.jpg" style="width: 220px; height: 210px"></td>
        <td>249,99€</td>

            <td><a href="EditaAnuncio.php" style="color: #FFFFFF"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i>Editar</button></a></td>
        <td><a href="#" onclick="confirmaElimina(1)" style="color: #FFFFFF"><button type="button" class="btn btn-danger"><i class="fa fa-close"></i>Remover</button></a></td>



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