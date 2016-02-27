/**
 * Created by Maxime on 27/02/2016.
 */
(function($){
    /** VERIFICATION A LA CONNEXION DE L'UTILISATEUR **/
    $.ajax({
        url: "../../../controller/user.ajax.php?action=check-message",
        dataType: "json",
        type: "GET",
        success:function(data){
            if(data >= 1){
                toastr.info("Vous avez "+data+" Message non lu !", "MESSAGERIE");
            }else{
                return false;
            }
        },
        error:function(jqxhr){
            console.log(jqxhr.responseText);
        }
    });
    $.ajax({
        url: "../../../controller/user.ajax.php?action=check-notif",
        dataType: "json",
        type: "GET",
        success: function(data){
            if(data >= 1){
                $('#count_notif').replaceWith('<span id="count_notif" class="badge badge-danger badge-header">'+data+'</span>');
                $('#count_notif_title').replaceWith('<p class="pull-left" id="count_notif_title">'+data+' Notification en attente</p>');
                toastr.info("Vous avez une nouvelle notification !");
            }else{
                $('#count_notif').remove();
                $('#count_notif_title').replaceWith('<p class="pull-left" id="count_notif_title">'+data+' Notification en attente</p>');

            }
        },
        error: function(jqxhr){
            console.log(jqxhr.responseText);
        }
    });

})(jQuery);