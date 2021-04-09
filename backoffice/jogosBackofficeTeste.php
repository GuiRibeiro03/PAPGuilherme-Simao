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
<div id="tableContent">


</div>


<?php
Bottom();
?>








