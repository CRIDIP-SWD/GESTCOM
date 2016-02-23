/**
 Custom module for you to write your own javascript functions
 **/
var General = function () {


    $.ajax("../../../core/collab/ajax/message.php?iduser="+$iduser)
        .done(function(jqxhr){
            if(jqxhr != 0)
            {
                toastr.info("Vous avez "+jqxhr+" Nouveaux messages", "Messagerie Interne")
            }
        })
        .fail(function(jqxhr){
            alert("ECHEC !!");
        })

}();

jQuery(document).ready(function() {
    General.init();
});