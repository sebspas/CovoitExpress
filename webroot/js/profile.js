$(document).ready(function() {

    $("#btn-add-pref").click(function() {

        var idpref = $("#id-pref-add").val();

        if (idpref != null){
            $.ajax({
                type: 'GET',
                url: './app/model/addUserPref.php',
                data: { 'idpref' : idpref },
                
                success: function(result){
                    refresh_pref();
                }
            });
        }
        else{
            alert("No preference selected");
        }
    });

    $( "#modal-tab-pref tr" ).on( "click", "a#btn-delete-pref", function(){
        delete_pref();
    });

    function delete_pref() {

        var idpref = $("#btn-delete-pref").data('pref');

        $.ajax({
            type: 'GET',
            url: './app/model/deleteUserPref.php',
            data: { 'idpref' : idpref },
            
            success: function(result){
                refresh_pref();
            }
        });
    }

    function refresh_pref() {
        $.ajax({
            type: 'GET',
            url: './app/model/getUserPref.php',
            success: function(result){
                var result = $.parseJSON(result);

                $("#tab-pref").html(" ");
                $("#modal-tab-pref").html(" ");
                
                $.each(result, function(i, item) {
                    showPref(item.name, item.img, item.idpreferences);
                })
            }
        }); 
    }

    function showPref(prefname, prefimg, prefid) {
        $("#modal-tab-pref").append(
            $("<tr>").append(
                $("<td>").append(
                    $("<img>").attr({'class':"size-sign center",'src':prefimg})
                ),
                $("<td>").html(
                    prefname
                ),
                $("<td>").append(
                    $("<a>").attr(
                        {
                            'class':"btn-floating btn-medium waves-effect waves-light red",
                            'value':prefid, 'id':"btn-delete-pref"
                        }
                    ).append(
                        $("<i>").attr(
                            {'class':"material-icons"}
                        )
                        .html("delete")
                    )
                )
            )
        );

        $("#tab-pref").append(
            $("<tr>").append(
                $("<td>").append(
                    $("<img>").attr({'class':"size-sign center",'src':prefimg})
                ),
                $("<td>").html(
                    prefname
                )
            )
        );
    }
    
});