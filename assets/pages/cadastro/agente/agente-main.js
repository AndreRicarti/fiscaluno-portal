$(document).ready(function() {

    $("#search-btn").unbind('click').click(function() {
        $("#dealer-new-edit-div").hide();
        $("#dealer-list-div").show();

        /*var estruturaID = $("#input-estrutura-filtro").val();
        var estadoID = $("#input-estado-filtro").val();
        var cidadeID = $("#input-cidade-filtro").val();
        var dealerEnabled = $("#input-ativado-filtro").is(":checked");*/

        $("#0").val("2");
        $("#1").val("Julio Cesar");
        $("#2").val("Negativa");
        $("#3").val("Uma faculdade que me ajudou a me tornar um profissional qualificado.");
        $("#4").val("Barra Funda");

        //getDealerData(estruturaID, estadoID, cidadeID, dealerEnabled);
    });

    $("#new-dealer-btn").unbind('click').click(function() {
        buildFormButtons("create");
        $("#dealer-new-edit-title").html("Novo");

        $("#dealer-list-div").hide();
        $("#dealer-new-edit-div").show();

        $("#0").val("");
        $("#1").val("");
        $("#2").val("");
        $("#3").val("");
        $("#4").val("");
    });

});

/* ===============================================================
 * ============= INICIO EVENTOS TELA DE LISTA ====================
 * =============================================================== */
function getDealerData(estruturaID, estadoID, cidadeID, dealerEnabled) {
    $("#div-dealer-table").empty();
    $("#div-dealer-table").html("Carregando...");

    $.ajax({
        url: '/fiscaluno/cadastro/avaliacoesalunos/get',
        type: 'POST',
        dataType: 'json',
        data: {
        },
        success: function(data) {
            buildDealerTable(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
}

function buildDealerTable(data) {
    $("#div-dealer-table").empty();

    var table = "<table id='dealer-table'" +
        " data-toggle='table'" +
        " data-show-export='false'" +
        " data-pagination='true'" +
        " data-show-pagination-switch='false'" +
        " data-click-to-select='false'" +
        " data-show-refresh='false'" +
        " data-show-toggle='false'" +
        " data-show-columns='false'" +
        " data-query-params='queryParams'" +
        " data-search='true'" +
        " data-flat='false'>" +
        " <thead style='background: #7fc1ff;'>" +
        " <tr>" +
        " <th data-field='dealerid' data-sortable='false'>ID</th>" +
        " <th data-field='dealername' data-sortable='false'>Aluno</th>" +
        " <th data-field='estrutura' data-sortable='false'>Campus</th>" +
        " <th data-field='cityname' data-sortable='false'>Avaliação</th>" +
        " </tr>" +
        " </thead>" +
        " <tbody>";

    $.each(data, function(i, item) {
        table = table +
            " <tr>" +
            "<td><a class='edit-dealer' style='cursor:pointer'>" + item.ID + "</a></td>" +
            "<td>" + item.Aluno + "</td>" +
            "<td>" + item.Campus + "</td>" +
            "<td>" + item.Avaliação + "</td>" +
            "</tr>";

    });

    table = table + "</tbody></table>";

    $(table).appendTo("#div-dealer-table");

    $('#dealer-table').bootstrapTable({
        columns: [{
            field: 'dealerid',
            title: 'ID'
        }, {
            field: 'dealername',
            title: 'Aluno'
        }, {
            field: 'estrutura',
            title: 'Campus'
        }, {
            field: 'cityname',
            title: 'Avaliação'
        }],
        exportDataType: 'all',
        exportTypes: ['excel']
    });

    $("#dealer-table").delegate(".edit-dealer", "click", function() {
        var dealerID = $(this).text();
        loadEditEvents(dealerID);
    });
}
/* ===============================================================
 * ================ FIM EVENTOS TELA DE LISTA ====================
 * =============================================================== */

//------------------------------------------------------------------------------------------

/* ===============================================================
 * ========= INICIO EVENTOS TELA DE NOVO/EDITAR ==================
 * =============================================================== */

function loadEditEvents(dealerId) {
    buildFormButtons("edit");
    loadDealerInfo(dealerId);
    $("#dealer-new-edit-title").html("Editar");
    $("#dealer-list-div").hide();
    $("#dealer-new-edit-div").show();
}

function buildFormButtons(action) {
    var html = "";
    var url = "";
    if (action == "create") {
        url = "";
        html = "<button id='form-btn-create' class='btn btn-success pull-right'>Salvar</button>";
        $("#form-btn-div").html(html);
    } else {
        url = "";
        html =
            "<button id='form-btn-edit' class='btn btn-success pull-right'>Salvar</button>" +
            "<button id='form-btn-back' class='btn btn-default pull-right' style='margin-right: 3px'>Voltar</button>";
        $("#form-btn-div").html(html);
        $("#form-btn-back").unbind("click").on("click", function() {
            $("#dealer-new-edit-div").hide();
            $("#dealer-list-div").show();
        });
    }

    $("#inn-change-btn").unbind("click").click(function() {
        var innChangeBtn = $(this);
        var innInput = $("#form-dealer-inn");
        var innBtnValue = innChangeBtn.val();
        innInput.val("");
        if (innBtnValue == "1") {
            innChangeBtn.val("2");
            innChangeBtn.text("CPF");
            innInput.mask("999.999.999-99");
        } else {
            innChangeBtn.val("1");
            innChangeBtn.text("CNPJ");
            innInput.mask("99.999.999/9999-99");
        }
    });

    $("#form-dealer-actdate").daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "timePicker": true,
            "timePicker24Hour": true,
            locale: {
                format: 'DD/MM/YYYY HH:mm',
                applyLabel: 'Ok',
                cancelLabel: 'Cancelar'
            },
            startDate: moment()
        },
        function(start, end, label) {
            $("#form-dealer-actdate-formatted").val(start.format('YYYY-MM-DD HH:mm'));
        });

    $(".phone-change-btn").unbind("click").click(function() {
        var phoneChangeBtn = $(this);
        var targetInput = $("#" + phoneChangeBtn.attr('data-target'));
        var phoneBtnValue = phoneChangeBtn.val();
        targetInput.val("");
        if (phoneBtnValue == "1") {
            phoneChangeBtn.val("2");
            phoneChangeBtn.removeClass("glyphicon-phone-alt");
            phoneChangeBtn.addClass("glyphicon-phone");
            targetInput.mask("(99)99999-9999");
        } else {
            phoneChangeBtn.val("1");
            phoneChangeBtn.removeClass("glyphicon-phone");
            phoneChangeBtn.addClass("glyphicon-phone-alt");
            targetInput.mask("(99)9999-9999");
        }
    });

}

function buildCombos() {
    var formStructureDiv = $("#form-dealer-structure-div");
    var formStructure = "form-dealer-structure";
    estruturaCombo(formStructureDiv, formStructure, false);

    var formTipoContratoDiv = $("#form-dealer-tipocontrato-div");
    var formTipoContrato = "form-dealer-tipocontrato";
    tipoContratoCombo(formTipoContratoDiv, formTipoContrato, false);

    var formTipoSangriaDiv = $("#form-dealer-tiposangria-div");
    var formTipoSangria = "form-dealer-tiposangria";
    tipoSangriaCombo(formTipoSangriaDiv, formTipoSangria, false);

    var formAddressTypeDiv = $("#form-dealer-addresstype-div");
    var formAddressType = "form-dealer-addresstype";
    tipoLogradouroCombo(formAddressTypeDiv, formAddressType, function() {
        $("#" + formAddressType).prop("disabled", true);
    });

    var formAddressCityDiv = $("#form-dealer-addresscity-div");
    var formAddressCity = "form-dealer-addresscity";
    todasCidadesCombo(formAddressCityDiv, formAddressCity, null, function() {
        $("#" + formAddressCity).prop("disabled", true);
    });
}


function buildBuscaCep() {
    $("#form-dealer-addresscode").unbind('keyup').keyup(function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    }).unbind('blur').blur(function() {
        var cep = this.value;
        if (cep.length == 8) {
            getAddressByCep(cep);
        } else {
            this.value = "";
        }
    });
}

function loadDealerInfo(dealerID) {

    $("#modal-loading-container-div").empty();
    $("#modal-loading-container-div").html("<div class='row' style='text-align: center'>Carregando...</div>");
    $("#loadingModal").modal({ backdrop: 'static', keyboard: false });

    $("#loadingModal").modal('toggle');

    /*$.ajax({
        url: '/portalqiwi/cadastro/avaliacoesalunos/getbyid',
        type: 'POST',
        dataType: 'json',
        data: {
            'dealerid': dealerID
        },
        success: function(data) {
            buildEditForm(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#modal-loading-container-div").empty();
            $("#modal-loading-container-div").html("Falha ao carregar. Tente novamente.");
            setTimeout(function() {
                $("#loadingModal").modal('toggle');
                $("#dealer-new-edit-div").hide();
                $("#dealer-list-div").show();
            }, 4000);
        }
    });*/
}

function buildEditForm(data) {

    $("#loadingModal").modal('toggle');

    $("#form-dealer-id").val(data[0].id);
    var formStructureDiv = $("#form-dealer-structure-div");
    var formStructure = "form-dealer-structure";
    estruturaCombo(formStructureDiv, formStructure, false, function() {
        $("#" + formStructure).val(data[0].estruturaId);
        $("#" + formStructure).trigger('change.se' +
            'lect2');
    });
    $("#form-dealer-name").val(data[0].name);
    $("#form-dealer-uname").val(data[0].uName);

    var innInfo = data[0].inn;
    innInfo = innInfo.replace(/[^0-9]/g, "");
    if (innInfo.length == 11) {
        $("#form-dealer-inn").mask("999.999.999-99");
        $("#inn-change-btn").val("2");
        $("#inn-change-btn").text("CPF");
    } else {
        $("#form-dealer-inn").mask("99.999.999/9999-99");
        $("#inn-change-btn").val("1");
        $("#inn-change-btn").text("CNPJ");
    }
    $("#form-dealer-inn").val(data[0].inn);
    $("#form-dealer-inn").focus();
    $("#form-dealer-inn").blur();

    $("#form-dealer-bossname").val(data[0].bossName);
    $("#form-dealer-actnumber").val(data[0].contractNum);
    $("#form-dealer-actdate").val(data[0].contractDate);

    var formTipoContratoDiv = $("#form-dealer-tipocontrato-div");
    var formTipoContrato = "form-dealer-tipocontrato";
    tipoContratoCombo(formTipoContratoDiv, formTipoContrato, false, function() {
        $("#" + formTipoContrato).val(data[0].tipoContrato);
        $("#" + formTipoContrato).trigger('change.select2');
    });

    $("#form-dealer-contractvalue").val(data[0].valorContrato);

    var formTipoSangriaDiv = $("#form-dealer-tiposangria-div");
    var formTipoSangria = "form-dealer-tiposangria";
    tipoSangriaCombo(formTipoSangriaDiv, formTipoSangria, false, function() {
        $("#" + formTipoSangria).val(data[0].tipoSangria);
        $("#" + formTipoSangria).trigger('change.select2');
    });


    $("#form-dealer-addresscode").val(data[0].cep);
    var formAddressTypeDiv = $("#form-dealer-addresstype-div");
    var formAddressType = "form-dealer-addresstype";
    tipoLogradouroCombo(formAddressTypeDiv, formAddressType, function() {
        $("#" + formAddressType).prop("disabled", true);
        $("#" + formAddressType).val(data[0].enderecoTipo);
        $("#" + formAddressType).trigger('change.select2');
    });
    $("#form-dealer-address").val(data[0].enderecoNome);
    $("#form-dealer-addressnum").val(data[0].enderecoNum);
    $("#form-dealer-addresscomp").val(data[0].enderecoComp);
    $("#form-dealer-addressneigh").val(data[0].bairro);
    var formAddressCityDiv = $("#form-dealer-addresscity-div");
    var formAddressCity = "form-dealer-addresscity";
    todasCidadesCombo(formAddressCityDiv, formAddressCity, null, function() {
        $("#" + formAddressCity).prop("disabled", true);
        $("#" + formAddressCity).val(data[0].cidadeId);
        $("#" + formAddressCity).trigger('change.select2');
    });

    var contactPhoneNumber = data[0].contactPhone;
    contactPhoneNumber = contactPhoneNumber.replace(/[^0-9]/g, "");
    var contactPhone2Number = data[0].contactPhone2;
    (contactPhone2Number != null) ? contactPhone2Number = contactPhone2Number.replace(/[^0-9]/g, "") : contactPhone2Number = '';
    var contactPhone3Number = data[0].contactPhone3;
    (contactPhone3Number != null) ? contactPhone3Number = contactPhone3Number.replace(/[^0-9]/g, ""): contactPhone3Number = '';

    if (contactPhoneNumber.length == 10) {
        $("#phone1-change-btn").val("1");
        $("#phone1-change-btn").removeClass("glyphicon-phone");
        $("#phone1-change-btn").addClass("glyphicon-phone-alt");
        $("#form-dealer-phone1").mask("(99)9999-9999");
    } else {
        $("#phone1-change-btn").val("2");
        $("#phone1-change-btn").removeClass("glyphicon-phone-alt");
        $("#phone1-change-btn").addClass("glyphicon-phone");
        $("#form-dealer-phone1").mask("(99)99999-9999");
    }

    if (contactPhone2Number.length == 11) {
        $("#phone2-change-btn").val("2");
        $("#phone2-change-btn").removeClass("glyphicon-phone-alt");
        $("#phone2-change-btn").addClass("glyphicon-phone");
        $("#form-dealer-phone2").mask("(99)99999-9999");
    } else {
        $("#phone2-change-btn").val("1");
        $("#phone2-change-btn").removeClass("glyphicon-phone");
        $("#phone2-change-btn").addClass("glyphicon-phone-alt");
        $("#form-dealer-phone2").mask("(99)9999-9999");
    }

    if (contactPhone3Number.length == 10) {
        $("#phone3-change-btn").val("1");
        $("#phone3-change-btn").removeClass("glyphicon-phone");
        $("#phone3-change-btn").addClass("glyphicon-phone-alt");
        $("#form-dealer-phone3").mask("(99)9999-9999");
    } else {
        $("#phone3-change-btn").val("2");
        $("#phone3-change-btn").removeClass("glyphicon-phone-alt");
        $("#phone3-change-btn").addClass("glyphicon-phone");
        $("#form-dealer-phone3").mask("(99)99999-9999");
    }

    $("#form-dealer-contact").val(data[0].contactName);
    $("#form-dealer-phone1").val(data[0].contactPhone);
    $("#form-dealer-phone2").val(data[0].contactPhone2);
    $("#form-dealer-phone3").val(data[0].contactPhone3);
    $("#form-dealer-email").val(data[0].email);

    $("#form-dealer-finanblock").attr('disabled', false);
    var financialBlockReasonType = 2;

    if (data[0].financialBlock == 1) {
        $("#form-dealer-finanblock").attr('checked', true);
        financialBlockReasonType = 1;
    } else {
        $("#form-dealer-finanblock").attr('checked', false);
    }

    if (data[0].autoCompensa == 1)
        $("#form-dealer-autocompensa").attr('checked', true);
    else
        $("#form-dealer-autocompensa").attr('checked', false);

    var financialBlockReasonDiv = $("#form-dealer-finanblock-reason-div");
    var financialBlockReason = "form-dealer-finanblock-reason";

    financialBlockavaliacoesalunosCombo(financialBlockReasonDiv, financialBlockReason, financialBlockReasonType, function() {
        $("#" + financialBlockReason).val(data[0].financialBlockReason);
        $("#" + financialBlockReason).trigger('change.select2');
    });

    $("#form-dealer-finanblock").unbind('change').change(function() {
        var changeValue = $(this).is(":checked");
        if (changeValue == true)
            financialBlockReasonType = 1;
        else
            financialBlockReasonType = 2;
        financialBlockavaliacoesalunosCombo(financialBlockReasonDiv, financialBlockReason, financialBlockReasonType);
    });
}

function formSubmit(url) {

    if ($("#form-dealer-structure").val().length == 0) {
        return false;
    }
    if ($("#form-dealer-name").val().length == 0) {
        $("#form-dealer-name").addClass('has-error').focus();
        return false;
    }
    if ($("#form-dealer-uname").val().length == 0) {
        $("#form-dealer-uname").addClass('has-error').focus();
        return false;
    }
    if ($("#form-dealer-inn").val().length == 0) {
        $("#form-dealer-inn").addClass('has-error').focus();
        return false;
    }
    if ($("#form-dealer-addresscode").val().length == 0) {
        $("#form-dealer-addresscode").addClass('has-error').focus();
        return false;
    }
    if ($("#form-dealer-addresstype").val().length == 0) {
        $("#form-dealer-addresstype").addClass('has-error').focus();
        return false;
    }
    if ($("#form-dealer-address").val().length == 0) {
        $("#form-dealer-address").addClass('has-error').focus();
        return false;
    }
    if ($("#form-dealer-addressneigh").val().length == 0) {
        $("#form-dealer-addressneigh").addClass('has-error').focus();
        return false;
    }
    if ($("#form-dealer-addresscity").val().length == 0) {
        $("#form-dealer-addresscity").addClass('has-error').focus();
        return false;
    }
    if ($("#form-dealer-phone1").val().length == 0) {
        $("#form-dealer-phone1").addClass('has-error').focus();
        return false;
    }
    if ($("#form-dealer-email").val().length == 0) {
        $("#form-dealer-email").addClass('has-error').focus();
        return false;
    }

    submitRequest(url);
}


function submitRequest(url) {

    $("#modal-loading-container-div").empty();
    $("#modal-loading-container-div").html("<div class='row' style='text-align: center'>Por favor aguarde...</div>");
    $("#loadingModal").modal({ backdrop: 'static', keyboard: false });

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            'id': $("#form-dealer-id").val(),
            'estrutura': $("#form-dealer-structure").val(),
            'nome': $("#form-dealer-name").val(),
            'razaoSocial': $("#form-dealer-uname").val(),
            'inn': $("#form-dealer-inn").val(),
            'status': $("#form-dealer-enabled").is(':checked') == true ? 1 : 0,
            'responsavel': $("#form-dealer-bossname").val(),
            'numContrato': $("#form-dealer-actnumber").val(),
            'dataContrato': $("#form-dealer-actdate-formatted").val(),
            'tipoContrato': $("#form-dealer-tipocontrato").val(),
            'tipoSangria': $("#form-dealer-tiposangria").val(),
            'valorContrato': $("#form-dealer-contractvalue").val(),
            'cep': $("#form-dealer-addresscode").val(),
            'tipoEndereco': $("#form-dealer-addresstype").val(),
            'tipoEnderecoNome': $("#form-dealer-addresstype :selected").text(),
            'endereco': $("#form-dealer-address").val(),
            'numEndereco': $("#form-dealer-addressnum").val(),
            'compEndereco': $("#form-dealer-addresscomp").val(),
            'bairroEndereco': $("#form-dealer-addressneigh").val(),
            'cidade': $("#form-dealer-addresscity").val(),
            'cidadeNome': $("#form-dealer-addresscity :selected").text(),
            'contato': $("#form-dealer-contact").val(),
            'telefone1': $("#form-dealer-phone1").val(),
            'telefone2': $("#form-dealer-phone2").val(),
            'telefone3': $("#form-dealer-phone3").val(),
            'email': $("#form-dealer-email").val(),
            'financialBlock': $("#form-dealer-finanblock").is(':checked') == true ? 1 : 0,
            'financialBlockReason': $("#form-dealer-finanblock-reason").val(),
            'autocompensa': $("#form-dealer-autocompensa").is(':checked') == true ? 1 : 0,
        },
        success: function(data) {
            $("#loadingModal").modal('toggle');
            bootbox.alert({
                size: "small",
                message: "Comando realizado com sucesso.",
            });

            $("#search-btn").trigger("click");
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#loadingModal").modal('toggle');
            bootbox.alert({
                size: "small",
                message: "Erro ao realizar ação! Tente novamente.",
            });
        }
    });
}



/* ===============================================================
 * ============ FIM EVENTOS TELA DE NOVO/EDITAR ==================
 * =============================================================== */