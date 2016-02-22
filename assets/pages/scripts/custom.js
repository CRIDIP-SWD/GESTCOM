/**
Custom module for you to write your own javascript functions
**/
var Custom = function () {

    // private functions & variables

    var myFunc = function(text) {
        alert(text);
    }

    $("#login-form").submit(function(){
       var pseudo   = $(this).find("input[name=username]").val();
       var password = $(this).find("input[name=password]").val();
       var action   = $(this).find("button[name=action]").val();
        $.post("../../../core/general/user.php", {pseudo: pseudo, password: password, action: action}, function(data){
           alert(data);
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