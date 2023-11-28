$(document).ready(function (){
    $("#artistas").select2({

    });
    $("#musicas").select2({

    });
    $("#basico").validate({
        rules:{
            nome: 'required',
            descricao: 'required'
        },
        messages:{
            nome: "O nome do projeto é obrigatório!",
            descricao: "A descrição do projeto é obrigatória"
        },
        submitHandler: function(form) {
            form.submit();
        }
    })
})
