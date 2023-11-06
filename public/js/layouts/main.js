$(function (){
    setInterval(function (){
        $("[id^=message]").each(function (){
            $(this).remove();
        })
        sessionStorage.setItem('message', null);
    }, 5000)

})
