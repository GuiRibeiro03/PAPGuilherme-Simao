<?php
include_once ("../includes/body.inc.php");
top();


?>

<script>
    function confirmaElimina(id) {
        $.ajax({
            url:"AJAX/AJAXGetNamejogo.php",
            type:"post",
            data:{
                operadoraId:id
            },
            success:function (result){
                if(confirm('Confirma que deseja eliminar o jogo:' + result + "?"))
                    window.location="../Elimina/eliminaJogo.php?id=" + id;
            }
        })
    };

    function preview_image(event){

        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    };

    $('document').ready(function (){
        $('#search').keyup(function (){
            fillJogosBackofficeTeste(this.value);
        });
        fillJogosBackofficeTeste();
    })
</script>



<input type="text" id="search"  style="width: 30%; margin-left: 30%" placeholder="procurar...">
<a href="../backoffice/Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>
<br>
<section class="store" >
    <div style="margin-left: 35%">
        <div class="btn-group" >
            <a href="../backoffice/jogosBackoffice.php"><button type="button" class="btn btn-light">Jogos</button></a>
            <a href="../backoffice/jogosBackofficeTeste.php"><button type="button" class="btn btn-primary">Jogos Teste</button></a>
            <a href="../backoffice/reviewsBackoffice.php"><button type="button" class="btn btn-light">Reviews</button></a>
            <a href="../backoffice/NoticiasBackoffice.php"><button type="button" class="btn btn-light">Noticias</button></a>
            <a href="../backoffice/produtoBackoffice.php"><button type="button" class="btn btn-light">Produto</button></a>
            <a href="../backoffice/tagGenerosBackoffice.php"><button type="button" class="btn btn-light">Géneros</button></a>
            <a href="../backoffice/tagEmpresasBackoffice.php"><button type="button" class="btn btn-light">Empresas</button></a>
            <a href="../backoffice/tagPlataformaBackoffice.php"><button type="button" class="btn btn-light">Plataformas</button></a>
        </div>
    </div>
</section>
<div id="tableContent">




</div>


<?php
Bottom();
?>








