$(document).ready(function () {
    function validationRadioId() {
        $("input[rel='campo-input']").prop('required', true);
        $("input[rel='campo-input']").attr('pattern', '^[_0-9]{1,}$');
        $("input[rel='campo-input']").val("");
        $("input[rel='campo-input']").focus();
    }

    function validationRadioName() {
        $("input[rel='campo-input']").prop('required', true);
        $("input[rel='campo-input']").removeAttr('pattern');
        $("input[rel='campo-input']").val("");
        $("input[rel='campo-input']").focus();
    }

    $("input[rel*='id-dealer-radio']").change(function () {
        $("input[rel='campo-input']").prop('required', false);
        validationRadioId();
    });

    $("input[rel*='nome-dealer-radio']").change(function () {
        $("input[rel='campo-input']").prop('required', false);
        validationRadioName();
    });

    $("input[rel*='id-point-radio']").change(function () {
        $("input[rel='campo-input']").prop('required', false);
        validationRadioId();
    });

    $("input[rel*='nome-point-radio']").change(function () {
        $("input[rel='campo-input']").prop('required', false);
        validationRadioName();
    });

    $("input[rel*='id-terminal-radio']").change(function () {
        $("input[rel='campo-input']").prop('required', false);
        validationRadioId();
    });
});

$(document).on("click", "#pesquisar-button", function () {
    $('form').validator('validate');

    if (!$('form').find('.has-error, .has-danger').length > 0) {
        if ($("input[name=searchType]:checked").val() == 2) {
            /*bootbox.confirm({
                title: "Escolha o Dealer.",
                message: getDealerTable(),
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function (result) {
                    console.log('This was logged in the callback: ' + result);
                }
            });*/

            getDealerTable();

        } else {
            $("#loading-modal").modal({backdrop: 'static', keyboard: false});

            var parametros = {};

            parametros.radioValue = $("input[name=searchType]:checked").val();
            parametros.inputValue = $("input[rel='campo-input']").val();

            getHomeData(parametros);
        }
    } else {
        console.log("Novo Dia")
    }
});

/**
 * @function getDealerTable() = Ajax para retornar a tabela em html com id e nome do dealer.
 */
function getDealerTable() {
    var jqxhr = $.ajax({
        url: '/portalqiwi/usuario/home/getIdNameDealer',
        type: 'POST',
        dataType: 'html',
        data: {
            'idName': $("input[rel='campo-input']").val()
        }
    });
    jqxhr.done(function () {
        console.log("Funionou");
    });
    jqxhr.fail(function (jqXHR, exception) {
        // Our error logic here
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        alert(msg);
    });
    jqxhr.always(function () {
        console.log("complete");
    });
}

function getHomeData(parametros, dialog) {
    $("#home-panel-div-dealer").empty();
    $("#home-panel-div-point").empty();
    $("#home-panel-div-terminal").empty();

    $.ajax({
        url: '/portalqiwi/usuario/home/search',
        type: 'POST',
        dataType: 'json',
        data: parametros,
        success: function (data) {
            $("#home-panel-div-dealer").html(data.dealers);
            $("#home-panel-div-point").html(data.points);
            $("#home-panel-div-terminal").html(data.terminals);

            $("#loading-modal").modal('toggle');
        },
        error: function (jqXHR, textStatus, errorThrown) {
        }
    });
}



