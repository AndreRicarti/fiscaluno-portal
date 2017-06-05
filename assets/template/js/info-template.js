$(document).ready(function() {

    getSessionInfo();

});


function getSessionInfo() {
    $.ajax({
        url: '/portalqiwi/usuario/perfil/getsessioninfo',
        dataType: 'json',
        success: function(data) {
            setTemplateNames(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#topmenu-username").html("<font style='color: black'>Indefinido</font>");
            $("#sidemenu-username").html("Indefinido");
        }
    });
}


function setTemplateNames(data) {
    $("#topmenu-username").html("<font style='color: black'>" + data.name + " <i class='fa fa-caret-down'></i></font>");
    $("#sidemenu-username").html(data.name);
}