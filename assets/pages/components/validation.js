(function () {

    validationFormRequired = function (value, group, block, message, last, fn) {

        if ($(value).val() == null || $(value).val() == "") {
            if ($('input:focus').length == 0) {
                $(value).focus();
            }

            document.getElementById(group).className += " has-error";

            var valuehelpBlock = $('#' + block).val();

            if (valuehelpBlock == null) {
                var spanMessageErro = "<span id='" + block + "' class='help-block'>Você não pode deixar este campo em branco.</span>";
                $(spanMessageErro).appendTo('#' + message);
            }

            returnValidation = 1;

        } else {
            $('#' + group).removeClass("has-error");
            $('#' + block).remove();

            if (last == true) {
                if (returnValidation == 0) {
                    if (fn != undefined)
                        fn();
                }
            }
        }
    }

    validationFormRequiredCombo = function (value, group, block, message, last, fn) {

        if ($(value).val() == null || $(value).val() == "") {

            document.getElementById(group).className += " has-error";

            var valuehelpBlock = $('#' + block).val();

            if (valuehelpBlock == null) {
                var spanMessageErro = "<span id='" + block + "' class='help-block'>Selecione um valor.</span>";
                $(spanMessageErro).appendTo('#' + message);
                $('#' + message + ' .select2-container--default .select2-selection--single').css({"border-color": "red"});
            }

            returnValidation = 1;

        } else {
            $('#' + group).removeClass("has-error");
            $('#' + block).remove();
            $('#' + message + ' .select2-container--default .select2-selection--single').css({"border-color": "#aaa"});

            if (last == true) {
                if (returnValidation == 0) {
                    if (fn != undefined)
                        fn();
                }
            }
        }
    }

    validationFormEmailRequired = function (value, group, block, message, filter, fn) {
        if ($(value).val() == null || $(value).val() == "") {
            if ($('input:focus').length == 0) {
                $(value).focus();
            }
            document.getElementById(group).className += " has-error";

            var valuehelpBlock = $('#' + block).val();

            if (valuehelpBlock == null) {
                var spanMessageErro = "<span id='" + block + "' class='help-block'>Você não pode deixar este campo em branco.</span>";
                $(spanMessageErro).appendTo('#' + message);
            } else {
                $('#' + block).text("Você não pode deixar este campo em branco.");
            }
        } else {
            getUserVerifyEmail(fn, filter);
        }
    }

    validationFormRequiredFiltro = function (value, group, block, message, fn) {

        if ($(value).val() == null || $(value).val() == "") {
            if ($('input:focus').length == 0) {
                $(value).focus();
            }

            document.getElementById(group).className += " has-error";

            var valuehelpBlock = $('#' + block).val();

            if (valuehelpBlock == null) {
                var spanMessageErro = "<span id='" + block + "' class='help-block'>Você não pode deixar este campo em branco.</span>";
                $(spanMessageErro).appendTo('#' + message);
            }

            returnValidation = 1;

        } else {
            $('#' + group).removeClass("has-error");
            $('#' + block).remove();

            if (returnValidation == 0) {
                if (fn != undefined)
                    fn();
            }
        }
    }
})();