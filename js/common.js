function fillJogos(txt = ''){
    $.ajax({
        url:"jogos.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#content').html(result);
        }
    });
}

function fillJogosBackoffice(txt = ''){
    $.ajax({
        url:"backoffice/jogosBackofficeTeste.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#content').html(result);
        }
    });
}
