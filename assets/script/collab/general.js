/**
 Custom module for you to write your own javascript functions
 **/
var General = function () {


    $.ajax("../../../core/collab/ajax/message.php?iduser="+$iduser)
        .done(function(jqxhr, data){
            alert(data);
        })
        .fail(function(jqxhr){
            alert("ECHEC !!");
        })

}();

jQuery(document).ready(function() {
    General.init();
});