
//**********************************Funções Fill*****************************************
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

function fillJogosFrontoffice(txt = ''){
    $.ajax({
        url:"AJAX/AJAXFillJogosFront.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}


function fillReviewsFrontoffice(txt = ''){
    $.ajax({
        url:"AJAX/AJAXFillFrontReviews.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}


function fillOutletFrontoffice(txt = ''){
    $.ajax({
        url:"AJAX/AJAXFrontOutlet.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}


function fillBlogFrontOffice(txt = ''){
    $.ajax({
        url:"AJAX/AJAXFillFrontBlog.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}

function fillConsolasFrontOffice(txt = ''){
    $.ajax({
        url:"AJAX/AJAXFillFrontConsolas.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}

function fillAcessoriosFrontOffice(txt = ''){
    $.ajax({
        url:"AJAX/AJAXFillFrontAcessorios.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#tableContent').html(result);
        }
    });
}

//******************************************EliminaFunções****************************************


function confirmaElimina(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaJogo.php?id=" + id;
}

function confirmaEliminaReview(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaReview.php?id=" + id;
}

function confirmaEliminaNoticia(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaNoticia.php?id=" + id;
}

function confirmaEliminaProduto(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaProduto.php?id=" + id;
}

function confirmaEliminaEmpresa(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaEmpresa.php?id=" + id;
}

function confirmaEliminaGenero(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaGenero.php?id=" + id;
}

function confirmaEliminaPlataforma(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="../Elimina/eliminaPlataforma.php?id=" + id;
}

function confirmaEliminaOutlet(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="Elimina/eliminaProduto.php?id=" + id;
}

function confirmaEliminaMorada(id) {
    if(confirm('Confirma que deseja eliminar o registo com o ID #'+id+"?"))
        window.location="eliminaMorada.php?id=" + id;
}



//***********FunçõesPreviewImagem***********************
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

//*************************ClickFunção****************************

localStorage.clickCount = localStorage.clickCount || 0;

function countClicks() {
    localStorage.clickCount++;
    document.getElementById("btnLike").innerHTML = "&nbsp;&nbsp;" + localStorage.clickCount ;
}



localStorage.clickCountDislike = localStorage.clickCountDislike || 0;

function countClicks2() {
    localStorage.clickCountDislike++;
    document.getElementById("btnDislike").innerHTML = "&nbsp;&nbsp;" + localStorage.clickCountDislike ;
}


/*
//***********************************Adicionar ao Carrinho******************************
function adicionaCarrinho(id){
    $.ajax({
        url:"AJAX/AJAXNovoProdutoCarrinho.php",
        type:"post",
        data: {
            id:id
        },
        success:function(){
            location.reload();
        }
    });
}

function adicionaCarrinhoJogo(id){

    $.ajax({
        url:"AJAX/AJAXNovoProdutoCarrinho.php",
        type:"post",
        data: {
            id:id,
        },
        success:function(){
            location.reload();
        }
    });
}
//*************************************Elimina Carrinho**************************************
function confirmaEliminaCarrinho() {

    $.ajax({
        url:"AJAX/AJAXGetNameProduto.php",
        type:"post",
        success:function (){
            if(confirm('Confirma que deseja eliminar todos os produtos do carrinho ?'))
                window.location="AJAX/AJAXRemoverProdutoCarrinho.php";
        }
    });
}

//**********************Elimina Produto Carrinho********************
function confirmaEliminaCarrinhoProduto(id) {
    var nomeProduto;
    $.ajax({
        url:"AJAX/AJAXGetNameProduto.php",
        type:"post",
        data:{
            id:id
        },
        success:function (result){
            nomeProduto=result;
            if(confirm('Confirma que deseja eliminar o produto:'+nomeProduto+'?'))
                window.location="AJAX/AJAXEliminaProdutoCarrinho.php?id=" + id;
        }
    });
}

//**********************Elimina JOGO Carrinho********************
function confirmaEliminaCarrinhoJogo(idJogo) {
    var nomeJogo;
    $.ajax({
        url:"AJAX/AJAXGetNameJogo.php",
        type:"post",
        data:{
            idJogo:idJogo
        },
        success:function (result){
            nomeJogo=result;
            if(confirm('Confirma que deseja eliminar o produto:'+nomeJogo+'?'))
                window.location="AJAX/AJAXEliminaProdutoCarrinho.php?id=" + idJogo;
        }
    });
}
*/

//**************************Filtros Função Dropdown*****************************
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}


// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}




function entrar() {
    let utilizador = $('#nome').val();
    let password = $('#password').val();
    let erro = false;

    if ($('#utilizador').val() == '') {
        erro = true;
        $('#NoName').html('Introduza o seu nome');
    }
    if ($('#password').val() == '') {
        erro = true;
        $('#NoPass').html('Introduza a sua Password');

    } else {
        $.ajax({
            url: "AJAXUSER/AJAXConfirmaLogin.php",
            type: "post",
            data: {
                nome: utilizador,
                password: password
            },
            success: function (result) {
                if ((result) == 1) {
                    erro = true;
                    $('#frmConfirma').submit();

                } else if (!erro) {
                    alert('Dados Mal Inseridos');
                }
            }
        });
    }
}




function eliminaCarrinhoTodo(){
    if(confirm('Confirma que deseja eliminar todos os produtos do carrinho ?'))
        window.location="AJAX/AJAXRemoverProdutoCarrinho.php";
}



function adicionaCarrinho(id){

    $.ajax({
        url:"AJAX/AJAXNovoProdutoCarrinho.php",
        type:"post",
        data: {
            idPrd:id
        },
        success:function(result){
            location.reload();
        }
    });
}


function confirmaEliminaCarrinhoProduto(idProduto) {
    var nomeProduto;
    $.ajax({
        url:"AJAX/AJAXGetNameProduto.php",
        type:"post",
        data:{
            idProduto:idProduto
        },
        success:function (result){
            nomeProduto=result;
            if(confirm('Confirma que deseja eliminar o produto:'+nomeProduto+'?')){
                $.ajax({
                    url:"AJAX/AJAXEliminaProdutoCarrinho.php",
                    type:"post",
                    data: {
                        idPrd:idProduto
                    },
                    success:function(){
                        location.reload();
                    }
                });
            }
        }
    });
}

function confirmaEliminaCarrinhoJogo(idJogo) {
    var nomeJogo;
    $.ajax({
        url:"AJAX/AJAXGetNameJogo.php",
        type:"post",
        data:{
            idJogo:idJogo
        },
        success:function (result){
            nomeJogo=result;
            if(confirm('Confirma que deseja eliminar o produto:'+nomeJogo+'?')){
                $.ajax({
                    url:"AJAX/AJAXEliminaProdutoCarrinho.php",
                    type:"post",
                    data: {
                        idPrd:idJogo
                    },
                    success:function(result){
                        location.reload();
                    },
                });
            }
        }
    });
}




function atualizaCarrinho(valor,idProduto){
    if(valor>0){
        $.ajax({
            url:"AJAX/AJAXAtualizaProdutoCarrinho.php",
            type:"post",
            data:{
                quant:valor,
                idPrd:idProduto
            },
            success:function (result){
                location.reload();
            }
        });
    }


}