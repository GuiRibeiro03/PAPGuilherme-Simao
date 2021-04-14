

function fillJogosBackoffice(txt = ''){
    $.ajax({
        url:"../AJAX/AJAXfillJogos.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}



function confirmaElimina(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaJogo?id=" + id;
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