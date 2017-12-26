
 

$(function() {
    
        $('#student-form-link').click(function(e) {
            $("#student-form").delay(100).fadeIn(100);
             $("#faculty-form").fadeOut(100);
            $('#faculty-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#faculty-form-link').click(function(e) {
            $("#faculty-form").delay(100).fadeIn(100);
             $("#student-form").fadeOut(100);
            $('#student-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
    
    });

$("#request").click(function(){

        var course = document.forms["request-form"]["course"].value;

        $.ajax({
            type: 'post',
            url: 'src/request_teaching',
            dataType: 'json',
            data: {'course' : course},
            success: function( response ) {
                if(response == 'already'){
                    $("div.message").text('You Are Already Registered');
                    $("div.message").removeClass('hide');
                    $("div.message").removeClass('alert-danger');
                    $("div.message").addClass('alert-info');
                    setTimeout(function() {
                        $("div.message").addClass('hide');
                    }, 2000);

                }else{
                    $("div.message").text('Registration Successful');
                    $("div.message").removeClass('hide');
                    $("div.message").removeClass('alert-danger');
                    $("div.message").addClass('alert-success');
                    setTimeout(function() {
                        $("div.message").addClass('hide');
                    }, 2000);

                }
            },
            error: function(response){
                $("div.message").text('Error In Registration');
                $("div.message").removeClass('hide');
                $("div.message").addClass('alert-danger');
            }


        });

});
