define(["jquery", "jquery-ui", "datetimepicker", "datatables",
    "bootstrap", "datatables.bootstrap"], function () {
    $(function () {

        $('#tableContent').dataTable({
            "bProcessing": true,
            "language": {
                //baseUrl is define in application/views/templates/footer.php 
                "url": baseUrl + "assets/datatables-plugins/i18n/French.lang"
            }
        });
        $('#datetimepicker').datetimepicker({
            lang: 'fr',
            format: 'd/m/Y',
            timepicker: false
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