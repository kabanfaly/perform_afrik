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


function checkPassword(pwd, pwd2) {
    if ($('#' + pwd).val() !== $('#' + pwd2).val()) {
        alert('Les mots de passe doivent être idendiques');
        return false;
    }
    return true;
}

/**
 * load form modal 
 * @param {string} link controller link to set form content
 * @returns {undefined}
 */
function loadForm(link) {
    $.ajax({
        url: link,
        success: function (result) {
            $(".modal-content").html(result);
        }
    });
}

function updateRefractedWeight() {

    var goodBags = parseFloat($('#bon_sac').val());
    var tornBags = parseFloat($('#sac_dechire').val());
    var netWeight = parseFloat($('#poids_net').val());

    goodBags = isNaN(goodBags) ? 0 : goodBags;
    tornBags = isNaN(tornBags) ? 0 : tornBags;
    netWeight = isNaN(netWeight) ? 0 : netWeight;

    var refractedWeight = Math.abs((goodBags + tornBags * 8) - netWeight);
    console.log(refractedWeight);
    $('#poids_refracte').val(refractedWeight);
}