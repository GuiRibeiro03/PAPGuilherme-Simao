

function fillJogosBackoffice(txt = ''){
    $.ajax({
        url:"backoffice/jogosBackoffice.php",
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

