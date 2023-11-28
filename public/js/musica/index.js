$(document).ready(function () {
    let tableLista = "";

    let datatableLista = function () {
        tableLista = $('#lista_musica').DataTable({
            ajax: {
                url: '/musica/lista',
                type: 'GET',
            },
            columns: [
                {data: 'titulo_musica', name: 'musica.titulo'},
                {data: 'compositor', name: 'users.nome'},
                {data: 'nome_genero', name: 'genero.nome'},
                {data: 'data_criacao', name: 'musica.created_at'},
                {
                    "mRender": function (data, type, full) {
                        let buttons = "";

                        buttons += '<a class="editar" title="Editar Música" href="/musica/editar/'+ full["id_musica"] + '" data-id="' + full["id"] + '" type="button"> <label>Editar</label></a>';

                        buttons += '<a class="delete" title="Deletar Música" data-id="' + full["id"] + '" type="button"> <label>Deletar</label></a>';

                        return buttons;
                    },
                    "width": "15%"
                }
            ]
        });
    };
    datatableLista();

    $('.editar').on('click', function () {
        let id = $(this).data('id');
        $.ajax({
            url: `musica/editar/${id}`,
            type: 'GET'
        })
    })
})
