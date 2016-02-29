$(function() {
    $.backstretch(["assets/images/gallery/login4.jpg", "assets/images/gallery/login3.jpg", "assets/images/gallery/login2.jpg", "assets/images/gallery/login.jpg"], {
        fade: 600,
        duration: 4000
    });
    /* Creation of the Circle Progress */
    var circle = new ProgressBar.Circle('#loader', {
        color: '#aaa',
        strokeWidth: 3,
        trailWidth: 3,
        trailColor: 'rgba(255,255,255,0.1)',
        easing: 'easeInOut',
        duration: 2000,
        from: {
            color: '#319DB5',
            width: 3
        },
        to: {
            color: '#319DB5',
            width: 3
        },
        // Set default step function for all animate calls
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);
        }
    });

    /*$('.btn-primary').click(function (e) {
        e.preventDefault();
        circle.animate(1);
        setTimeout(function () {
            $('.loader-overlay').removeClass('loaded').fadeIn(150);
            setTimeout(function () {
                window.location = "dashboard.html";
            }, 1000);
        }, 2000);
    });*/

    $('.form-signin').on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        data = form.serializeArray();
        form.find('button').html("Chargement...");

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "json",
            success: function(jqxhr){
                console.log(jqxhr.responseText);
                /*if(data == 1){
                    circle.animate(1);
                    setTimeout(function(){
                        $('.loader-overlay').removeClass('loaded').fadeIn(150);
                        setTimeout(function(){
                            window.location = "index.php?view=dashboard";
                        }, 1000)
                    }, 2000)
                }else{
                    $('#probleme').replaceWith('<i class="fa fa-warning fa-5x text-warning"></i>');
                }*/
            },
            error: function(jqxhr){
                console.log(jqxhr.responseText);
            }
        })

    })
});



