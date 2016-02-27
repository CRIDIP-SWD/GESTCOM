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
})(jQuery);