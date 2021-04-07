function fillJogos(txt = ''){
    $.ajax({
        url: "../jogos.php",
        type: "post",
        data: {
        txt: txt
        },
        success: function (result) {
        $('#content').html(result)
        }
    });
    }