/**
 Custom module for you to write your own javascript functions
 **/
var General = function () {

    /*Inclusion AJAX */
    $.ajax("../../../core/collab/ajax/message.php?iduser="+$iduser)
        .done(function(jqxhr){
            if(jqxhr != 0)
            {
                toastr.info("Vous avez "+jqxhr+" Nouveaux messages", "Messagerie Interne")
            }
        })
        .fail(function(jqxhr){
            alert("ECHEC !!");
        });



    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.
        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
        }

    };

}();

jQuery(document).ready(function() {
    General.init();
});