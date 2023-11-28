$(document).ready(function (){
    $("#lista_projeto").DataTable({
        searching: false,
        info: false,
        language:{
            paginate:{
                previous: 'Anterior',
                next: "Próximo"
            }
        },
        lengthChange: false,
    });
})
