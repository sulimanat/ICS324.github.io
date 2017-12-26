
$(document).ready(function() {

    $("#search-1").click(function(){
        var course = document.getElementById("course").value;
        var from = document.getElementById("term1").value;
        var to = document.getElementById("term2").value;

        $.ajax({
            type: 'post',
            url: 'src/search-course-term',
            dataType: 'json',
            data: {'course' : course,'from' : from,'to' : to},
            success: function( response ) {
                if(response == "error"){

                    $('#body-1').empty();
                }else {
                    $('#body-1').empty();
                    for (var key in response) {
                        $('#body-1').append(
                            '<TR>' +
                            '<TD>' + response[key][0] + '</TD>' +
                            '<TD>' + response[key][1] +" " +response[key][2]+ '</TD>' +
                            '</TR>'
                        );
                    }
                }

            },
            error: function(response){
                
               
            }

        });
        
    });

    $("#search-2").click(function(){
        var instructor = document.getElementById("instructor").value;
        var from = document.getElementById("term3").value;
        var to = document.getElementById("term4").value;

        $.ajax({
            type: 'post',
            url: 'src/search-instructor-term',
            dataType: 'json',
            data: {'instructor' : instructor,'from' : from,'to' : to},
            success: function( response ) {
                if(response == "error"){

                    $('#body-2').empty();
                }else {
                    $('#body-2').empty();
                    for (var key in response) {
                        $('#body-2').append(
                            '<TR>' +
                            '<TD>' + response[key][0] + '</TD>' +
                            '<TD>' + response[key][1]+ '</TD>' +
                            '</TR>'
                        );
                    }
                }

            },
            error: function(response){


            }

        });

    });

    $("#search-3").click(function(){
        var course = document.getElementById("course2").value;
        $.ajax({
            type: 'post',
            url: 'src/search-course-eligibility',
            dataType: 'json',
            data: {'course' : course},
            success: function( response ) {
                if(response == "error"){

                    $('#body-3').empty();
                }else {
                    $('#body-3').empty();
                    for (var key in response) {
                        $('#body-3').append(
                            '<TR>' +
                            '<TD>' + response[key][0] + '</TD>' +
                            '<TD>' + response[key][1] + '</TD>' +
                            '</TR>'
                        );
                    }
                }

            },
            error: function(response){


            }

        });

    });

    $("#search-4").click(function(){
        var course = document.getElementById("course3").value;
        $.ajax({
            type: 'post',
            url: 'src/search-course-instructor',
            dataType: 'json',
            data: {'course' : course},
            success: function( response ) {
                if(response == "error"){

                    $('#body-4').empty();
                }else {
                    $('#body-4').empty();
                    for (var key in response) {
                        $('#body-4').append(
                            '<TR>' +
                            '<TD>' + response[key][0] + '</TD>' +
                            '<TD>' + response[key][1] + '</TD>' +
                            '</TR>'
                        );
                    }
                }

            },
            error: function(response){


            }

        });

    });

});   
 