$(document).ready(function (){

    $("#div-foto").children().click(function (){
        window.location.href = $("#div-foto").attr('href');
    });
})
