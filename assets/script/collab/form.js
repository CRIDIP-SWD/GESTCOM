/**
 * Created by SWD on 24/02/2016.
 */
$('#form-edit-password').on('submit', function(e){
    var $form = $(this);
    /*Validation State*/
    $form.validate({
        doNotHideMessage: true,
        errorElement: "span",
        errorClass: "help-block help-block-error",
        focusInvalid: false,
        rules:{
            new_pass: {
                minlength: 5,
                required: true
            },
            confirm_new_pass: {
                minlength: 5,
                required: true,
                equalTo: "#password"
            }
        }
    })
});
