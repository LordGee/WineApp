
$(document).ready(function(){

    $("#small").click(function(event){
        event.preventDefault();
        $("h1").animate({"font-size":"26px"});
        $("h2").animate({"font-size":"18px"});
        $("p").animate({"font-size":"12px"});

    });

    $("#medium").click(function(event){
        event.preventDefault();
        $("h1").animate({"font-size":"32px"});
        $("h2").animate({"font-size":"24px"});
        $("p").animate({"font-size":"18px"});

    });

    $("#large").click(function(event){
        event.preventDefault();
        $("h1").animate({"font-size":"38px"});
        $("h2").animate({"font-size":"30px"});
        $("p").animate({"font-size":"24px"});

    });

    $( "#control a" ).click(function() {
        $("#control a").removeClass("selected");
        $(this).addClass("selected");
    });

});
