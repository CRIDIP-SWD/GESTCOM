//****************** YOUR CUSTOMIZED JAVASCRIPT **********************//

(function($){
    $('#connector').on('click', function(e){
        e.preventDefault();
        var a = $(this);
        var url = a.attr('href');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: url,
            success: function(data){
                alert(data["connect"]);
            },
            error: function(jqxhr){
                alert(jqxhr);
            }
        })
    })
})(jQuery);