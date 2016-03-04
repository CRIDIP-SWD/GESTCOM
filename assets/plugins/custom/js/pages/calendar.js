/**
 * Created by Maxime on 03/03/2016.
 */
(function($){
    $('#today').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });
    $('#week').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });
})(jQuery);