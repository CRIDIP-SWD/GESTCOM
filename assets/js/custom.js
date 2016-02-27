//****************** YOUR CUSTOMIZED JAVASCRIPT **********************//

(function($){
    $('#connector').on('click', function(e){
        e.preventDefault();
        var a = $(this);
        var url = a.attr('href');
        $.ajax(url)
            .done(function(jqxhr){
                alert(jqxhr);
            })
            .fail(function(jqxhr){
                alert(jqxhr);
            })
            .always(function(){

            });
    })
})(jQuery);