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
                $('.badge-primary').text(data);
            },
            error: function (jqxhr) {
                console.log(jqxhr.responseText);
            }
        })
    }

    $(document).ready(function(){
        setInterval(count_new_mail(), 1000);
    })



})(jQuery);