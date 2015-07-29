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
//    $('.left-side').on('click', function(){
//       var link = $(this).attr('href');
//       
//       $.ajax({
//            url: link,
//            type: 'GET',
//            dataType: 'html',
//            success: function (data, textStatus, jqXHR) {
//                
//            },
//            error: function (jqXHR, textStatus, errorThrown) {
//                alert(errorThrown);
//            }
//            
//       });
//    });
});