<script>

    function confirmaElimina(id) {
        if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
            window.location="../Elimina/eliminaJogo?id=" + id;
    }
</script>

<?php
include_once("../includes/body.inc.php");
top();

?>

<script>
        function confirmaElimina(id) {
        $.ajax({
            url:"AJAX/AJAXGetNameJogo.php",
            type:"post",
            data:{
                jogoId:id
            },
            success:function (result){
                if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
                    window.location="../Elimina/eliminaJogo?id=" + id;
            }
        })
    };


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

    $('document').ready(function (){
        $('#search').keyup(function (){
            fillJogosBackofficeTeste(this.value);
        });
        fillJogosBackofficeTeste();
    })

</script>
<input type="text" id="search" placeholder="procure o jogo..." style="width: 25%; margin-left: 40%">
<div id="Content">

</div>



<?php
bottom();
?>
