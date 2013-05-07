$(document).ready(function(){
        $('#search_form').keyup(function(){

                var search_term = $(this).attr('value');
                $.post('lib/search.php', {search_term:search_term}, function(data){


            });
        });

    });