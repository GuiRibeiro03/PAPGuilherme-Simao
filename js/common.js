
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


//******************************************EliminaFunções****************************************


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
                window.location="AJAX/AJAXRemoverProdutosDoCarrinho?id=" + id;
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
            if(confirm('Confirma que deseja eliminar o produto:'+nomeJogo+'?'))
                window.location="AJAX/AJAXRemoverProdutosDoCarrinho?id=" + idJogo;
        }
    });
}


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