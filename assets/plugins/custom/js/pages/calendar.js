/**
 * Created by Maxime on 03/03/2016.
 */
(function($){
    $('.page-content').addClass('page-calendar');
    $('#calendar').fullCalendar({
        defaultView: 'agendaDay',
        header: {
            left: 'title',
            center: '',
            right: 'today prev,next'
        }
    })
})(jQuery);