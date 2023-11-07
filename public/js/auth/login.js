$(document).ready(function (){
    $("#email").val('').trigger('keydown');
    $("#password").val('').css("background-color", '#fff');
});


$(function (){
    $("#signup").click(function (){
        $("#first").hide();
        $("#second").show();
    });
    $("#signin").click(function (){
        $("#second").hide();
        $("#first").show();
    });

    $("#auth").click(function (){
        $("[name=registration]").submit();
    })
})
$(function() {
           $("form[name='login']").validate({
             rules: {

               email: {
                 required: true,
                 email: true
               },
               password: {
                 required: true,

               }
             },
              messages: {
               email: "Email inválido",

               password: {
                 required: "Senha obrigatória!",

               }

             },
             submitHandler: function(form) {
               form.submit();
             }
           });
});



$(function() {

  $("form[name='registration']").validate({
    rules: {
      firstname: "required",
      nome_usuario: "required",
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 8
      }
    },

    messages: {
      firstname: "Primeiro nome obrigatório",
      nome_usuario: "O nome de usuário é obrigatório",
      password: {
        required: "Favor digitar uma senha",
        minlength: "Sua senha deve ter no mínimo 8 caractéres."
      },
      email: "Informe um email válido"
    },

    submitHandler: function(form) {
      form.submit();
    }
  });
});
