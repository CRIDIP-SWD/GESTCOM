/**
 * Created by Maxime on 06/03/2016.
 */
(function($){
    $('.page-content').addClass('page-app mailbox');

    function count_new_mail(){
        var url = "../../../../controller/mailbox.ajax.php";
        var data = {action: "count_new_mail"};
        $.ajax({
            url: url,
            data: data,
            dataType: "json",
            type: "GET",
            success: function(data){
                console.log(data);
                if(data >= 1){
                    $('.badge-primary').text(data);
                    $('#titre_mailbox').html('<strong> BOITE DE RECEPTION ('+data+')</strong>');
                }else{
                    $('.badge-primary').text();
                    $('#titre_mailbox').html('<strong> BOITE DE RECEPTION (0)</strong>');
                }
            },
            error: function (jqxhr) {
                console.log(jqxhr.responseText);
            }
        })
    }

    $('#mailbox').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    })

})(jQuery);