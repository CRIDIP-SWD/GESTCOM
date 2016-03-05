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
            },
            error: function (jqxhr) {
                console.log(jqxhr.responseText);
            }
        })
    }

    count_new_mail();

})(jQuery);