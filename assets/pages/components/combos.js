(function() {

    departmentCombo = function(target, newCombo, filter, fn) {
        filter = false;
        target.empty();
        $("<p id='carregando' style='margin-top: 7px'>Carregando...</p>").appendTo(target);
        $.ajax({
            url: '/portalqiwi/administrativo/grupos/getGrupos',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione um departamento'>";
                $(grupoCombo).appendTo(target);

                switch (filter) {
                    case 1:
                        $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                        break;
                    case 2:
                        $("<option value=''>Selecione um departamento</option>").appendTo("#" + newCombo);
                }

                $.each(data, function(i, item) {
                    $("<option value='" + item.groupID + "'>" + item.groupName + "</option>").appendTo("#" + newCombo);
                });

                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    estruturaCombo = function(target, newCombo, filter, fn) {
        filter = true;

        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/estrutura/get',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var estruturaCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione a Estrutura'>";
                $(estruturaCombo).appendTo(target);
                //OPCAO VER TODOS - PARA FILTRO É POSSIVEL BUSCAR POR TODOS. PARA CADASTRO É OBRIGATORIO.
                if (filter == true)
                    $("<option value=''>Todas</option>").appendTo("#" + newCombo);
                else
                    $("<option value=''>Selecione uma estrutura...</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    };

    estadoCombo = function(target, newCombo, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/estado/getbydealer',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var estadoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o Estado'>";
                $(estadoCombo).appendTo(target);
                //OPCAO VER TODOS
                $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    cidadeCombo = function(target, newCombo, estadoId, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/cidade/getbystate',
            type: 'POST',
            data: {
                "state": estadoId
            },
            dataType: 'json',
            success: function(data) {
                target.empty();
                var cidadeCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione a Cidade'>";
                $(cidadeCombo).appendTo(target);
                //OPCAO VER TODOS
                $("<option value=''>Todas</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    todasCidadesCombo = function(target, newCombo, estadoId, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/cidade/get',
            type: 'POST',
            data: {
                "state": estadoId
            },
            dataType: 'json',
            success: function(data) {
                target.empty();
                var cidadeCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione a Cidade'>";
                $(cidadeCombo).appendTo(target);
                //OPCAO VER TODOS
                $("<option value=''>Todas</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    tipoLogradouroCombo = function(target, newCombo, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/logradouro/gettype',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var logradouroCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o Tipo'>";
                $(logradouroCombo).appendTo(target);
                //OPCAO VER TODOS
                $("<option value=''>Digite o CEP</option>").appendTo("#" + newCombo);
                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    financialBlockAgenteCombo = function(target, newCombo, type, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/agente/getfinancialblockreason',
            type: 'POST',
            data: {
                "type": type
            },
            dataType: 'json',
            success: function(data) {
                target.empty();
                var financialBlockCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o motivo'>";
                $(financialBlockCombo).appendTo(target);
                //OPCAO VER TODOS
                $("<option value=''>Todas</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    gruposTarifaCombo = function(target, newCombo, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/grupotarifa/get',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoTarifaCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o grupo de tarifa'>";
                $(grupoTarifaCombo).appendTo(target);
                //OPCAO VER TODOS
                $("<option value=''>Todas</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    tipoTerminalCombo = function(target, newCombo, filter, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/point/gettype',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var pointTypeCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o Tipo'>";
                $(pointTypeCombo).appendTo(target);

                if (filter == true)
                    $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                else
                    $("<option value=''>Selecione o Tipo</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    agenteCombo = function(target, newCombo, filter, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/agente/getcombo',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var agenteCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o AvaliacoesAlunos'>";
                $(agenteCombo).appendTo(target);

                if (filter == true)
                    $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                else
                    $("<option value=''>Selecione o AvaliacoesAlunos</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.id + ' - ' + item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    grupoServicoCombo = function(target, newCombo, filter, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/servico/getservicegroup',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o Grupo'>";
                $(grupoCombo).appendTo(target);

                if (filter == true)
                    $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                else
                    $("<option value=''>Selecione o Grupo</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.id + ' - ' + item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    subCategoriaServicoCombo = function(target, newCombo, filter, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/servico/getsubcategoria',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione a SubCategoria'>";
                $(grupoCombo).appendTo(target);

                if (filter == true)
                    $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                else
                    $("<option value=''>Selecione a SubCategoria</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.id + ' - ' + item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    provedorServicoCombo = function(target, newCombo, filter, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/servico/getprovedor',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o Provedor'>";
                $(grupoCombo).appendTo(target);

                if (filter == true)
                    $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                else
                    $("<option value=''>Selecione o Provedor</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.id + ' - ' + item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    gateServicoCombo = function(target, newCombo, filter, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/servico/getgate',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o Gate'>";
                $(grupoCombo).appendTo(target);

                if (filter == true)
                    $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                else
                    $("<option value=''>Selecione o Gate</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.id + ' - ' + item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    servicoCombo = function(target, newCombo, filter, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/servico/getservicecombo',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o Serviço'>";
                $(grupoCombo).appendTo(target);

                if (filter == true)
                    $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                else
                    $("<option value=''>Selecione o Serviço</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.id + ' - ' + item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    tipoContratoCombo = function(target, newCombo, filter, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/agente/getcontracttype',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o Tipo de Contrato'>";
                $(grupoCombo).appendTo(target);

                if (filter == true)
                    $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                else
                    $("<option value=''>Selecione o Tipo de Contrato</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.id + ' - ' + item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    tipoSangriaCombo = function(target, newCombo, filter, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/cadastro/agente/getcashouttype',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o Tipo de Sangria'>";
                $(grupoCombo).appendTo(target);

                if (filter == true)
                    $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                else
                    $("<option value=''>Selecione o Tipo de Sangria</option>").appendTo("#" + newCombo);

                var frag = document.createDocumentFragment();
                $.each(data, function(i, item) {
                    frag.appendChild($('<option>').text(item.id + ' - ' + item.name).attr('value', item.id)[0]);
                });
                $("#" + newCombo).append(frag);
                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    userIdNameCombo = function (target, newCombo, filter, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/administrativo/usuario/getidname',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Todos' aria-describedby='access-newuser-help-block'>";
                $(grupoCombo).appendTo(target);

                if (filter == true)
                    $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                else
                    $("<option value=''>Selecione o Usuário</option>").appendTo("#" + newCombo);

                $.each(data, function(i, item) {
                    $("<option value='" + item.id + "'>" + item.name + "</option>").appendTo("#" + newCombo);
                });

                $(".select2").select2();

                if (fn != undefined)
                    fn();

                $('#access-search-btn').prop('disabled', false);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    applicationsCombo = function (target, newCombo, filter, fn) {
        target.empty();
        $("<p id='carregando' style='margin-top: 7px'>Carregando...</p>").appendTo(target);
        $.ajax({
            url: '/portalqiwi/administrativo/aplicacao/getApplicationsList',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione a Aplicaçao'>";
                $(grupoCombo).appendTo(target);

                switch (filter) {
                    case 1:
                        $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                        break;
                    case 2:
                        $("<option value=''>Selecione a Aplicação</option>").appendTo("#" + newCombo);
                }

                $.each(data, function(i, item) {
                    $("<option value='" + item.applicationID + "'>" + item.applicationName + "</option>").appendTo("#" + newCombo);
                });

                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    profileComboApplication = function (target, newCombo, filter, applicationId, fn) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/administrativo/perfil/getProfilesList',
            type: 'POST',
            data: {
                'applicationId': applicationId,
            },
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o Perfil'>";
                $(grupoCombo).appendTo(target);

                switch (filter){
                    case 1:
                        $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                        break;
                    case 2:
                        $("<option value=''>Selecione o Perfil</option>").appendTo("#" + newCombo);
                }

                $.each(data, function (i, item) {
                    $("<option value='" + item.profileID + "'>" + item.profileName + "</option>").appendTo("#" + newCombo);
                });

                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    profilesCombo = function (target, newCombo, filter, fn) {
        target.empty();
        $("<p id='carregando' style='margin-top: 7px'>Carregando...</p>").appendTo(target);
        $.ajax({
            url: '/portalqiwi/administrativo/perfil/getProfilesCombo',
            dataType: 'json',
            success: function (data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione a Aplicaçao'>";
                $(grupoCombo).appendTo(target);

                switch (filter) {
                    case 1:
                        $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                        break;
                    case 2:
                        $("<option value=''>Selecione o Perfil</option>").appendTo("#" + newCombo);
                }

                $.each(data, function (i, item) {
                    $("<option value='" + item.profileID + "'>" + item.profileName + "</option>").appendTo("#" + newCombo);
                });

                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    actionsCombo = function (target, newCombo, filter, fn) {
        target.empty();
        $("<p id='carregando' style='margin-top: 7px'>Carregando...</p>").appendTo(target);
        $.ajax({
            url: '/portalqiwi/administrativo/permissaoperfil/getActionsCombo',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione a Aplicaçao'>";
                $(grupoCombo).appendTo(target);

                switch (filter) {
                    case 1:
                        $("<option value=''>Todos</option>").appendTo("#" + newCombo);
                        break;
                    case 2:
                        $("<option value=''>Selecione a Ação</option>").appendTo("#" + newCombo);
                }

                $.each(data, function (i, item) {
                    $("<option value='" + item.actionID + "'>" + item.actionID + " - " + item.actionName + "</option>").appendTo("#" + newCombo);
                });

                $(".select2").select2();

                if (fn != undefined)
                    fn();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    agenteAcordoCombo = function(target, newCombo) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/financeiro/acordo/getdealer',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o AvaliacoesAlunos'>";
                $(grupoCombo).appendTo(target);

                $("<option value=''>Selecione o AvaliacoesAlunos</option>").appendTo("#" + newCombo);

                $.each(data, function(i, item) {
                    $("<option value='" + item.id + "'>" + item.id + ' - ' + item.name + "</option>").appendTo("#" + newCombo);
                });

                $(".select2").select2();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }

    statusAcordoCombo = function(target, newCombo) {
        target.empty();
        target.html("Carregando...");

        $.ajax({
            url: '/portalqiwi/financeiro/acordo/getstatus',
            dataType: 'json',
            success: function(data) {
                target.empty();
                var grupoCombo = "<select id='" + newCombo + "' class='select2' style='width: 100%;' placeholder='Selecione o Status'>";
                $(grupoCombo).appendTo(target);

                $("<option value=''>Selecione o Status</option>").appendTo("#" + newCombo);

                $.each(data, function(i, item) {
                    $("<option value='" + item.id + "'>" + item.name + "</option>").appendTo("#" + newCombo);
                });

                $(".select2").select2();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                target.empty();
                target.html("Por favor recarregue a página.");
            }
        });
    }
})();