$(function () {
    $('.cadastro').on('click', function () {
        let dados = $("#formCadastroMusica").serializeArray();
        $.ajax({
            url: '/musica/cadastro',
            type: 'POST',
            data: dados,
            success: function (data) {

            },
            error: function (data) {

            }
        });
    })
})
