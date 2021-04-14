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


function confirmaElimina(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../elimina/eliminaCanais.php?id=" + id;
}


function fillJogosBackoffice(txt = ''){
    $.ajax({
        url:"../AJAX/AJAXFillJogos.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}

function fillJogosBackofficeTeste(txt = ''){

    $.ajax({
        url:"backoffice/jogosBackofficeTeste.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result) {
            $('#tableContent').html(result);

        }
    });
}

