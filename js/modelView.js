define(["jquery", "jquery-ui", "datatables",
    "bootstrap", "datatables.bootstrap"], function () {
    $(function () {

        $('#tableContent').dataTable({
            "bProcessing": true,
            "language":{
               //baseUrl is define in application/views/templates/footer.php 
               "url": baseUrl+"assets/datatables-plugins/i18n/French.lang"
            }
        });
    });
});