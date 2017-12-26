

$(function(){

        setTimeout(function(){
            $('#message').fadeOut(300);
        },3000);

         
$('a.btn.btn-default').hover(function(e) {
    $('a.btn.dropdown-toggle').trigger(e.type);
    });
    
                    
    
    $(".display-fade").delay(25).animate({"opacity": "1"}, 800);
    $(".table-fade").delay(25).animate({"opacity": "1"}, 800);
    
    
    var def="black";
    function showNotification(color)
    {
        $( "#notification" ).removeClass(def);
        $( "#notification" ).addClass(color);
        def=color;
        $( "#notification" ).fadeIn( "slow" );
        //alert('hi');
        $(".win8-notif-button").click(function()
        {
        //alert('hi');
        $(".notification").fadeOut("slow");
        });
    
    }   

});

        

    