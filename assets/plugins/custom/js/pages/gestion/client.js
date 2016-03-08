/**
 * Created by SWD on 08/03/2016.
 */
(function($){
    $('#client').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        language:{
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
        }
    });
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
    })
})(jQuery);