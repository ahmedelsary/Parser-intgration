$(document).ready(function(){
    $(".rat").click(function(event) {
        event.preventDefault();
        var id = $("input#id").val();
        var rate = $("input#rate").val();
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/Movies/" + "index.php/Home/ajax_rate",
            dataType: 'json',
            data: {id1: id, rate1: rate},
            success: function(res) {
            }
        });
    });


    $('textarea').click(function(){
        $(this).text('');
    });

    $('#sub').click(function(){
        if($('.comm_text').text()==' Your Comment Here ! '){
            event.preventDefault();
        }

    });


});
