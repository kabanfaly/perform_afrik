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
                "url": baseUrl + "assets/datatables-plugins/i18n/French.lang"
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