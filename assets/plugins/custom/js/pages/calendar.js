/**
 * Created by Maxime on 03/03/2016.
 */
(function($){
    $('#today2').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });
    $('#week2').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });
    $('.btn-danger').on('click', function(e){
        e.preventDefault();
        var a = $(this);
        var url
    })
})(jQuery);