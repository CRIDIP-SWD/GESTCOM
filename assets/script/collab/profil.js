/**
 Custom module for you to write your own javascript functions
 **/
var Profil = function () {

    /*Inclusion AJAX */
    $("#form-edit-profil").on('submit', function(e){
        e.preventDefault();
        var $form = $(this);
        $form.find('.dark').html("<i class='fa fa-circle-o-notch fa-spin'></i> Modification en cours...");
        $.post($form.attr('action'), $form.serializeArray())
            .done(function(jqxhr){
                modal
            })
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
    Profil.init();
});