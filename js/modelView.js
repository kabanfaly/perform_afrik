define(["jquery", "jquery-ui", "datetimepicker", "datatables",
    "datatables.buttons", "datatables.buttons.flash", "datatables.buttons.html5", "datatables.buttons.print",
    "bootstrap", "datatables.bootstrap"], function () {
    $(function () {

        initContent();
    });
});

function initContent() {
      $('#tableContent').dataTable({
            "bProcessing": true,
            "language": {
                buttons: {
                    print: 'Imprimer',
                    copy: 'Copier'
                },
               //baseUrl is define in application/views/templates/footer.php 
                "url": baseUrl + "assets/datatables-plugins/i18n/French.lang?",
            },
            dom: 'lBfrtip', // each element of this string is an option (B for button ...)
            buttons: {}
        });   

    // For use profil management
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    }).on('hidden.bs.collapse', function () {
        $(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
    });
}
/**
 *  delete element  * @param {type} link
 * @returns {Boolean}
 */

function confirmDeletion() {
    return confirm('Voulez vous supprimer cet élément ?');
}

/**
 * check if password and confirmed password are identicals
 * @param {string} pwd
 * @param {string} pwd2
 * @returns {Boolean}
 */
function checkPassword(pwd, pwd2) {

    var userId = $("#id_utilisateur").val();

    // in case of update
    if (userId !== '' && $('#' + pwd2).val() === '') {
        return true;
    } else
    if ($('#' + pwd).val() !== $('#' + pwd2).val()) {
        alert('Les mots de passe doivent être idendiques');
        return false;
    }
    return true;
}
function myAccountcheckPassword(pwd, pwd2) {

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

/**
 * compute refrated weight (usage: dechargement form)
 * @returns void
 */
function updateRefractedWeight() {

    var goodBags = parseFloat($('#bon_sac').val());
    var tornBags = parseFloat($('#sac_dechire').val());
    var netWeight = parseFloat($('#poids_net').val());

    goodBags = isNaN(goodBags) ? 0 : goodBags;
    tornBags = isNaN(tornBags) ? 0 : tornBags;
    netWeight = isNaN(netWeight) ? 0 : netWeight;

    var refractedWeight = Math.abs((goodBags + tornBags * 8) - netWeight);
    
    $('#poids_refracte').val(refractedWeight);
}

/**
 * compute total price
 * @returns void
 */
function computeTotal(){
    var price = parseFloat($('#prix').val());
    var refractedWeight = parseFloat($('#poids_refracte').val());
    
    var total = price * refractedWeight;
    $('#total').val(total);
}

/**
 * Request http request with given link an update target content
 * @param {type} link
 * @param {type} target
 * @returns {undefined}
 */
function doAjax(link, target) {
    $.ajax({
        url: link,
        success: function (result) {
            $(target).html(result);
            initContent();
        }
    });
}

/**
 * Check or uncheck all checkboxes identified by name
 * @param {type} name
 * @returns {undefined}
 */
function checkUncheckAll(name) {

    var checkedLength = $('input[name*="' + name + '"]:checked').length;

    if (checkedLength == 0) {
        $('input[name*="' + name + '"]').removeAttr('checked');
    } else {
        $('input[name*="' + name + '"]').attr('checked', true);
    }
}