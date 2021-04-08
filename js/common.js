function fillJogosBackoffice(txt = ''){
    $.ajax({
        url:"backoffiec/jogosBackoffice.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result){
            $('#Content').html(result);
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
        success:function (result){
            $('#Content').html(result);
        }
    });
}

function fillJogosBackofficeTeste(txt=''){
    $.ajax({
        url:"AJAX/AJAXFillOperadoras.php",
        type:"post",
        data:{
            txt:txt
        },
        success:function (result) {
            $('#tableContent').html(result);

        }
    });


}