$(document).ready(function()
{
    $(".categories").click(function () { 
        $(".category").slideToggle();
        $(".setting_hidden").hide("fast");;
    });

    $(".setting .button_setting").click(function()
    {
        $(".category").hide("fast");;
        $(".setting_hidden").slideToggle();
    });
    $(".btn_down").click(function(){
        $(this).fadeOut(2000);
        $(".btn_up").fadeIn(2000);
        $(".slider").fadeIn(2000);
        $(".LeftNav").css("top","110px");
        let l1 = window.outerWidth;
        console.log(l1);
        $(".slider").css("width", l1)
        if(l1 > "400" && l1 <= "767"){
            $(".RightNav").css("right","60%");
        }else if(l1 <= "400"){
            $(".RightNav").css("right","65%");
        }
    });
    $(".btn_up").click(function(){
        $(this).fadeOut(2000);
        $(".btn_down").fadeIn(2000);
        $(".slider").fadeOut(2000,function(){
            $(".LeftNav").css("top","10px");
            let l1 = window.outerWidth;
            if(l1 > "400" && l1 <= "767"){
                $(".RightNav").css("right","-14%");
            }else if(l1 <= "400"){
                $(".RightNav").css("right","-7%");
            }
        });
    });
});

