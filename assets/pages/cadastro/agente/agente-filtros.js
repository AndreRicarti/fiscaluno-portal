//ARQUIVO DE COMPONENTS: assets/pages/

$(document).ready(function() {

    $(".select2").select2();

    var estruturaFiltroDiv = $("#div-estrutura-filtro");
    var estadoFiltroDiv = $("#div-estado-filtro");
    var cidadeFiltroDiv = $("#div-cidade-filtro");

    var estruturaComboId = "input-estrutura-filtro";
    var estadoComboId = "input-estado-filtro";
    var cidadeComboId = "input-cidade-filtro";

    estruturaCombo(estruturaFiltroDiv, estruturaComboId);

    estadoCombo(estadoFiltroDiv, estadoComboId, function() {
        $("#" + estadoComboId).change(function() {
            var stateId = $("#" + estadoComboId).val();
            cidadeCombo(cidadeFiltroDiv, cidadeComboId, stateId);
        });
    });

    cidadeCombo(cidadeFiltroDiv, cidadeComboId, null);

});