//****************** YOUR CUSTOMIZED JAVASCRIPT **********************//

(function($){
    $('#connector').on('click', function(e){
        e.preventDefault();
        var a = $(this);
        var url = a.attr('href');
        var data = $(this).serialize() + $.param(data);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: url,
            data: data,
            success: function(data){
                if(data["connect"] == 0){toastr.info("Vous êtes Maintenant <strong>Hors Ligne</strong> !");}
                if(data["connect"] == 1){toastr.info("Vous êtes Maintenant <strong>Absent</strong> !");}
                if(data["connect"] == 2){toastr.info("Vous êtes Maintenant <strong>En Ligne</strong> !");}
            },
            error: function(jqxhr){
                alert(jqxhr);
            }
        })
    })
})(jQuery);