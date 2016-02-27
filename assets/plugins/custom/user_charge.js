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
            toastr.info("Vous avez "+data+" Message non lu !", "MESSAGERIE");
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
                toastr.info("Vous avez une nouvelle notification !");
            }else{
                $('#count_notif').remove();
            }
        },
        error: function(jqxhr){
            console.log(jqxhr.responseText);
        }
    })
})(jQuery);