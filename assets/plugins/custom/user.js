/**
 * Created by SWD on 29/02/2016.
 */
$(document).ready(function(){
    count_message();
    count_notif();
    check_message();
    check_notif();
    setInterval(function(){
        ajax()
    }, 300000);
})(jQuery);
