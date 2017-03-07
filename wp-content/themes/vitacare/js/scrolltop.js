$(document).ready(function(){
    
    var nav = $('#masthead');
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 10) {
            nav.addClass('f-nav');
            $(".bluecart").css("display","block");
            $(".bluetop").css("display","none");
            $(".logohome").css("width","110");
            $(".logohome").css("margin-right","20px");
            $(".logohome > span").css("font-size","10px");
        } else {
            nav.removeClass('f-nav');
            $(".bluecart").css("display","none");
            $(".bluetop").css("display","block");
            $(".logohome").css("width","160");
            $(".logohome").css("margin-right","35px");
            $(".logohome > span").css("font-size","14px");
        }
    });

});