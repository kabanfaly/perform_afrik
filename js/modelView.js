define(["jquery", "jquery-ui", "datetimepicker", "datatables",
    "datatables.buttons", "datatables.buttons.flash", "datatables.buttons.html5", "datatables.buttons.print",
    "bootstrap", "datatables.bootstrap"], function () {
    $(function () {

        $('#tableContent').dataTable({
            "bProcessing": true,
            "language": {
                buttons: {
                    print: 'Imprimer'
                },
                //baseUrl is define in application/views/templates/footer.php 
                //"url": baseUrl + "assets/datatables-plugins/i18n/French.lang",
                "sProcessing": "Traitement en cours...",
                "sSearch": "Rechercher&nbsp;:",
                "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix": "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sPrevious": "Pr&eacute;c&eacute;dent",
                    "sNext": "Suivant",
                    "sLast": "Dernier"
                },
                "oAria": {
                    "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                }
            },
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
        });
    });
});

/**
 *  delete element
 * @param {type} link
 * @returns {Boolean}
 */

function confirmDeletion() {
    return confirm('Voulez vous supprimer cet élément ?');
}