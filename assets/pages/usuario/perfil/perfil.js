$(document).ready(function() {

    loadFormInfo();

    $("#user-changepass").unbind('change').change(function() {
        if ($(this).is(":checked") == true) {
            $("#divgroup-newpass-confirm").show();
            $("#divgroup-newpass").show();
        } else {
            $("#divgroup-newpass-confirm").hide();
            $("#divgroup-newpass").hide();
        }
    });

    $(".newpassword").unbind('blur').blur(function() {
        var newPassword = $("#user-newpass").val();
        var newPasswordConfirm = $("#user-newpass-confirm").val();

        if (newPassword != newPasswordConfirm) {
            $("#divgroup-newpass").attr('class', 'form-group has-error');
            $("#divgroup-newpass-confirm").attr('class', 'form-group has-error');
            $("#div-newpass-message").show();
        } else {
            $("#divgroup-newpass").attr('class', 'form-group');
            $("#divgroup-newpass-confirm").attr('class', 'form-group');
            $("#div-newpass-message").hide();
        }
    });

    $("#save-btn").unbind('click').click(function() {
        var newPassword = $("#user-newpass").val();
        var newPasswordConfirm = $("#user-newpass-confirm").val();
        if (newPassword == newPasswordConfirm) {
            $("#loading-container-div").empty();
            $("#loading-container-div").html("<div class='row' style='text-align: center'>Salvando alterações...</div>");
            $("#loadingModal").modal({ backdrop: 'static', keyboard: false });
            changeProfile();
        }
    });

});


function loadFormInfo() {

    $.ajax({
        url: '/portalqiwi/usuario/perfil/getprofileinfo',
        dataType: 'json',
        success: function(data) {
            $("#user-name").val(data[0].PersonName);
            $("#user-email").val(data[0].PersonEmail);
            $("#user-login").val(data[0].PersonLogin);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#user-name").val("Erro ao carregar informação.");
            $("#user-email").val("Erro ao carregar informação.");
            $("#user-login").val("Erro ao carregar informação.");
        }
    });
}


function changeProfile() {
    var newName = $("#user-name").val();
    var changePass = $("#user-changepass").is(":checked");
    if (changePass == true) {
        var newPassword = $("#user-newpass").val();
        var newPasswordConfirm = $("#user-newpass-confirm").val();
    } else {
        var newPassword = null;
        var newPasswordConfirm = null;
    }

    $.ajax({
        url: '/portalqiwi/usuario/perfil/editprofile',
        type: 'POST',
        dataType: 'json',
        data: {
            newName: newName,
            changePass: changePass,
            newPassword: newPassword
        },
        success: function(data) {
            $("#loading-container-div").html("<div class='row' style='text-align: center'>" + data.message + "</div>");
            setTimeout(function() {
                $("#loadingModal").modal('toggle');
            }, 4000);
            window.location.replace("/portalqiwi/usuario/home");
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#loading-container-div").html("<div class='row' style='text-align: center'>Erro ao salvar alterações. Tente novamente.</div>");
            setTimeout(function() {
                $("#loadingModal").modal('toggle');
            }, 4000);
        }
    });

}