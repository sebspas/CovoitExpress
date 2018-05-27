$(document).ready(function(){

    if (errors != null) {
        for ( var i = 0, l = errors.length; i < l; i++ ) {
            M.toast({html: errors[i], displayLength: 5000});
        }
    }

    if (messages != null) {
        for ( var i = 0, l = messages.length; i < l; i++ ) {
            M.toast({html: messages[i], displayLength: 5000});
        }
    }

    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy'
    });
    $('.timepicker').timepicker({
        twelveHour : false
    });
    $('.sidenav').sidenav();
    $('select').formSelect();

    // init for modal
    $('.modal').modal();
});
