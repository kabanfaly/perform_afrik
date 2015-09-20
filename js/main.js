//baseUrl is define in application/views/templates/footer.php 
requirejs.config({
    "baseUrl": baseUrl+"assets",
    "urlArgs": "bust=" + (new Date()).getTime(),
    shim : {
        "bootstrap" : { "deps" :['jquery'] },
        "datetimepicker" : { "deps" :['jquery'] },
        "datatables.buttons.print" : { "deps" :['jquery'] },
        "datatables.buttons.flash" : { "deps" :['jquery'] },
        "datatables.buttons.html5" : { "deps" :['jquery'] }
    },
    "paths": {
        "modelView" : "../js/modelView",
        "jquery": "jquery/dist/jquery.min",
        "jquery-ui": "jquery-ui/jquery-ui.min",
        "datetimepicker": "datetimepicker/jquery.datetimepicker",
        "angular": "angular/angular.min",
        "bootstrap": "bootstrap/dist/js/bootstrap.min",
        "datatables" : "datatables/media/js/jquery.dataTables.min",
        "datatables.bootstrap" : "datatables-bootstrap3/BS3/assets/js/datatables",
        
        "datatables.buttons" : "datatables/extensions/Buttons/js/dataTables.buttons.min",
        "datatables.buttons.flash" : "datatables/extensions/Buttons/js/buttons.flash.min",
        "datatables.buttons.html5" : "datatables/extensions/Buttons/js/buttons.html5.min",
        "datatables.buttons.print" : "datatables/extensions/Buttons/js/buttons.print.min"
    }
});
require(["modelView"]);
