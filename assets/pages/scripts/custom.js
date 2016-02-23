/**
Custom module for you to write your own javascript functions
**/
var Custom = function () {

    // private functions & variables

    var myFunc = function(text) {
        alert(text);
    }

    $('#login-form').on('submit', function(e){
        e.preventDefault();
        var $form = $(this);
        $form.find('button').html("<i class='fa fa-spinner fa-spin'></i> Connexion en cours");
        $.post($form.attr('action'), $form.serializeArray(), "json")
            .done(function(jqxhr){
                document.location.href(jqxhr.responseText);
            })
            .fail(function(jqxhr, data){
                if(data.error == 'no'){

                }
            })
            .always(function(){
                $form.find('button').text("Connexion")
            });
        return false;
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
   Custom.init(); 
});

/***
Usage
***/
//Custom.doSomeStuff();