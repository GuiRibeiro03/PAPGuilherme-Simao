

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

function fillReviewsBackoffice(txt = ''){
    $.ajax({
        url:"../AJAX/AJAXfillReviews.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}

function fillNoticiasBackoffice(txt = ''){
    $.ajax({
        url:"../AJAX/AJAXfillNoticias.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}

function fillProdutoBackoffice(txt = ''){
    $.ajax({
        url:"../AJAX/AJAXfillProduto.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}

function fillEmpresasBackoffice(txt = ''){
    $.ajax({
        url:"../AJAX/AJAXfillEmpresas.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}

function fillGenerosBackoffice(txt = ''){
    $.ajax({
        url:"../AJAX/AJAXfillGeneros.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}

function fillPlataformasBackoffice(txt = ''){
    $.ajax({
        url:"../AJAX/AJAXfillPlataformas.php",
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

function confirmaEliminaReview(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaReview?id=" + id;
}

function confirmaEliminaNoticia(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaNoticia?id=" + id;
}

function confirmaEliminaProduto(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaProduto?id=" + id;
}

function confirmaEliminaEmpresa(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaEmpresa?id=" + id;
}

function confirmaEliminaGenero(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaGenero?id=" + id;
}

function confirmaEliminaPlataforma(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaPlataforma?id=" + id;
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