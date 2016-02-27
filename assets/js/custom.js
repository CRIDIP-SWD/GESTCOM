//****************** YOUR CUSTOMIZED JAVASCRIPT **********************//

(function($){
    $('#connector').on('click', function(e){
        e.preventDefault();
        var a = $(this);
        var url = a.attr('href');
        var data = url;
        data = $(this).serializeArray(data);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: url,
            data: data,
            success: function(data, jqxhr){
                alert(jqxhr);
            },
            error: function(jqxhr){
                alert(jqxhr);
            }
        })
    })
})(jQuery);