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
                if(data == 0){$('#connector').html('<i class="busy"></i><span>Hors Ligne</span><i class="fa fa-angle-down"></i>')}
                if(data == 2){$('#connector').html('<i class="online"></i><span>En Ligne</span><i class="fa fa-angle-down"></i>')}

            },
            error: function(jqxhr){
                alert(jqxhr);
            }
        })
    })
})(jQuery);