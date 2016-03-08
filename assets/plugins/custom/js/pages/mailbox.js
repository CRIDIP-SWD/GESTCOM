/**
 * Created by Maxime on 06/03/2016.
 */
(function($){
    $('.page-content').addClass('page-app mailbox');

    function count_new_mail(){
        var url = "../../../../controller/mailbox.ajax.php";
        var data = {action: "count_new_mail"};
        $.ajax({
            url: url,
            data: data,
            dataType: "json",
            type: "GET",
            success: function(data){
                console.log(data);
                if(data >= 1){
                    $('.badge-primary').text(data);
                    $('#titre_mailbox').html('<strong> BOITE DE RECEPTION ('+data+')</strong>');
                }else{
                    $('.badge-primary').text();
                    $('#titre_mailbox').html('<strong> BOITE DE RECEPTION (0)</strong>');
                }
            },
            error: function (jqxhr) {
                console.log(jqxhr.responseText);
            }
        })
    }
    count_new_mail();

    $('#mailbox').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });

    $('#supp-mail').on('click', function(e){
        e.preventDefault();
        var a = $(this);
        var url = a.attr('href');
        a.html('<i class="fa fa-spinner fa-spin"></i> Supression en cours...');
        $.ajax(url)
            .done(function(data){
                a.parents('tr').fadeOut();
                toastr.success("Message Supprimer");
            })
            .fail(function(jqxhr){
                console.log(jqxhr.responseText);
            })
            .always(function(){
                a.html('<i class="fa fa-trash-o"></i>');
            })
    });

    $('#form-sent-mail').on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        form.find('button').html("<i class='fa fa-spinner fa-spin'></i> Chargement...");
        $.post(form.attr('action'), form.serializeArray())
            .done(function(jqxhr){
                console.log(jqxhr.responseText);
                if(jqxhr.responseText == 200){toastr.success("Le mail est bien envoyer"); window.location='index.php?view=mailbox';}
                if(jqxhr.responseText == 201){toastr.warning("Le mail à bien été envoyer mais le support de sentbox à rencontrer une erreur");window.location='index.php?view=mailbox';}
                if(jqxhr.responseText == 202){toastr.warning("Le mail à bien été enregistrer dans le support sentbox mais sont envoie à rencontrer une erreur");window.location='index.php?view=mailbox';}
                if(jqxhr.responseText == 500){toastr.error("Le mail n'à pas été envoyer veuillez vérifier les logs d'envoie de la console.");window.location='index.php?view=mailbox';}
            })
            .fail(function(jqxhr){
                console.log(jqxhr.responseText);
            })
            .always(function(){
                form.find('button').html('Envoyer <i class="fa fa-arrow-circle-right"></i>');
            })
    });

})(jQuery);