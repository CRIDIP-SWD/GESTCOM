/**
 * Created by SWD on 08/03/2016.
 */
(function($){
    //DATATABLE
    $('#client').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });
    $('#document_client').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });
    $('#devis_cours').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });
    $('#commande_cours').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });
    $('#facture_cours').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });

    $('#correspondance').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });

    //AJAX
    $('.table').on('click', '#supp-client', function(e){
        e.preventDefault();
        var a = $(this);
        var url = a.attr('href');
        a.html('<i class="fa fa-spinner fa-spin"></i>');
        $.ajax(url)
            .done(function(data){
                a.parents('tr').fadeOut();
                if(data == 1){toastr.success("Le client à bien été supprimer");}
                if(data == 2){toastr.warning("La fiche du salarié à bien été supprimer mais l'utilisateur affilier est toujours actif !");}
                if(data == 3){toastr.warning("L'utilisateur à été supprimer mais la fiche du salarié est toujours active !");}
                if(data == 4){toastr.error("Une erreur à eu lieu lors de la suppression du client ! Veuillez consulter les logs serveurs...");}
            })
            .fail(function(jqxhr){
                toastr.error("Une erreur à eu lieu lors de l'envoie des paramètres de la requète !");
                console.log(jqxhr.responseText);
            })
            .always(function(){
                a.html('<i class="fa fa-trash"></i>');
            })
    });

    $("#add-courrier").on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        form.find('button').html("<i class='fa fa-spinner fa-spin'></i> Chargement...");
        $.post(form.attr('action'), form.serializeArray())
            .done(function(data, jqxhr){
                $('table tbody').prepend(jqxhr.responseText);
                form.find('input').val('');
                toastr.success("Le courrier à été créer avec succès", "Courrier");
            })
            .fail(function(jqxhr){
                console.log(jqxhr.responseText);
            })
    })
})(jQuery);