/**
 * Created by Maxime on 03/03/2016.
 */
(function($){
    var oTable = $('#calendar').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        "aaSorting": [
            [1, 'asc']
        ]
    });
})(jQuery);