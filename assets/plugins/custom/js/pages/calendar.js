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
        },
        businessHours: {
            start: '09:00',
            end: '19:00'
        },
        lang: 'fr',
        timeFormat: 'h:mm',
        hiddenDays: [0,6],
        slotDuration: '00:15:00',
        editable: true,
        droppable: true,
        eventLimit: true,
        events: '../../../controller/calendar.ajax.php'
    })
})(jQuery);