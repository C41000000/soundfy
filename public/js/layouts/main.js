$(function (){
    setInterval(function (){
        $("[id^=message]").each(function (){
            $(this).remove();
        })
        sessionStorage.setItem('message-danger', false);
        sessionStorage.setItem('message-success', false);
    }, 500000000)

})
