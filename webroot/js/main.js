$(document).ready(function(){
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
