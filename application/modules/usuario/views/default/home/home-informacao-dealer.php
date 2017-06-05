<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Informações do Dealer</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <?php
            if ($dealers == null) { ?>
                <p>Nenhum valor encontrado!</p>
                <?php
            } else { ?>
            <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="nav-tab-geral active"><a href="#tab_1_dealer" data-toggle="tab">Geral</a></li>
                        <li class="nav-tab-endereco"><a href="#tab_2_dealer" data-toggle="tab">Endereço</a>
                        </li>
                        <li class="nav-tab-contato"><a href="#tab_3_dealer" data-toggle="tab">Contato</a></li>
                        <li class="nav-tab-financeiro"><a href="#tab_4_dealer" data-toggle="tab">Financeiro</a></li>
                        <!--<li class="nav-tab-detalhes"><a href="#tab_5_dealer" data-toggle="tab">Detalhes</a></li>-->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_dealer">
                            <table class='table table-bordered table-geral'
                                   data-toggle='table'
                                   data-show-export='false'
                                   data-page-size="5"
                                   data-pagination='false'
                                   data-page-list="[5, 20, 50, 100, 200]"
                                   data-show-pagination-switch='false'
                                   data-click-to-select='false'
                                   data-show-refresh='false'
                                   data-show-toggle='false'
                                   data-show-columns='false'
                                   data-query-params='queryParams'
                                   data-search='false'
                                   data-flat='false'>
                                <thead>
                                <tr>
                                    <th data-field='id'>ID</th>
                                    <th data-field='estrutura'>Estrutura</th>
                                    <th data-field='nome'>Nome</th>
                                    <th data-field='razao-social'>Razão Social</th>
                                    <th data-field='cpf-cnpj'>CPF/CNPJ</th>
                                    <th data-field='resposavel'>Responsável</th>
                                    <th data-field='status'>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="style-row-table">
                                    <td><?php echo $dealers['DealerID'] ?></td>
                                    <td><?php if (empty($dealers['StructureName'])) {
                                            echo '--';
                                        } else {
                                            echo $dealers['StructureName'];
                                        }
                                        ?></td>
                                    <td><?php echo $dealers['DealerName'] ?></td>
                                    <td><?php if (empty($dealers['DealerUName'])) {
                                            echo '--';
                                        } else {
                                            echo $dealers['DealerUName'];
                                        } ?></td>
                                    <td><?php
                                        if (empty($dealers['INN'])) {
                                            echo '--';
                                        } else {
                                            $value = $this->utils->formataCpfCnpj($dealers['INN']);

                                            if ($value == false) {
                                                echo 'CPF/CNPJ Inválido';
                                            } else {
                                                echo $value;
                                            }
                                        }
                                        ?> </td>
                                    <td><?php echo empty($dealers['BossName']) ? '--' : $dealers['BossName']; ?></td>
                                    <td><?php echo ($dealers['Enabled'] == 1) ? 'Ativado' : 'Desativado' ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_2_dealer">
                            <table class='table table-bordered table-endereco'
                                   data-toggle='table'
                                   data-show-export='false'
                                   data-page-size="5"
                                   data-pagination='false'
                                   data-page-list="[5, 20, 50, 100, 200]"
                                   data-show-pagination-switch='false'
                                   data-click-to-select='false'
                                   data-show-refresh='false'
                                   data-show-toggle='false'
                                   data-show-columns='false'
                                   data-query-params='queryParams'
                                   data-search='false'
                                   data-flat='false'>
                                <thead>
                                <tr>
                                    <th data-field='cep'>CEP</th>
                                    <th data-field='endereco'>Endereço</th>
                                    <th data-field='numero-endereco'>Número</th>
                                    <th data-field='complemento-endereco'>Complemento</th>
                                    <th data-field='bairro'>Bairro</th>
                                    <th data-field='cidade'>Cidade</th>
                                    <th data-field='estado'>Estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php
                                        if (empty($dealers['AddressCode'])) {
                                            echo '--';
                                        } else {
                                            $cep = $this->utils->formataCep($dealers['AddressCode']);
                                            if ($cep == false) {
                                                echo 'Cep Inválido!';
                                            } else {
                                                echo $cep;
                                            }
                                        } ?> </td>
                                    <td><?php echo empty($dealers['AddressName']) ? $dealers['TipoEndereco'] : $dealers['TipoEndereco'] . " " . $dealers['AddressName']; ?></td>
                                    <td><?php echo empty($dealers['AddressNumber']) ? '--' : $dealers['AddressNumber']; ?></td>
                                    <td><?php echo empty($dealers['AddressComplement']) ? '--' : $dealers['AddressComplement']; ?></td>
                                    <td><?php echo empty($dealers['AddressNeighborhood']) ? '--' : $dealers['AddressNeighborhood']; ?></td>
                                    <td><?php echo empty($dealers['CityName']) ? '--' : $dealers['CityName']; ?></td>
                                    <td><?php echo empty($dealers['AreaName']) ? '--' : $dealers['AreaName']; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_3_dealer">
                            <table class='table table-bordered table-contato'
                                   data-toggle='table'
                                   data-show-export='false'
                                   data-page-size="5"
                                   data-pagination='false'
                                   data-page-list="[5, 20, 50, 100, 200]"
                                   data-show-pagination-switch='false'
                                   data-click-to-select='false'
                                   data-show-refresh='false'
                                   data-show-toggle='false'
                                   data-show-columns='false'
                                   data-query-params='queryParams'
                                   data-search='false'
                                   data-flat='false'>
                                <thead>
                                <tr>
                                    <th data-field='nome-contato'>Nome do Contato</th>
                                    <th data-field='telefone1'>Telefone 1</th>
                                    <th data-field='telefone2'>Telefone 2</th>
                                    <th data-field='telefone3'>Telefone 3</th>
                                    <th data-field='email'>E-mail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php echo empty($dealers['ContactName']) ? '--' : $dealers['ContactName']; ?></td>
                                    <td><?php echo empty($dealers['ContactPhone']) ? '--' : $dealers['ContactPhone']; ?></td>
                                    <td><?php echo empty($dealers['ContactPhone2']) ? '--' : $dealers['ContactPhone2']; ?></td>
                                    <td><?php echo empty($dealers['ContactPhone3']) ? '--' : $dealers['ContactPhone3']; ?></td>
                                    <td><?php echo empty($dealers['ContactEMail']) ? '--' : $dealers['ContactEMail']; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_4_dealer">
                            <table class='table table-bordered table-financeiro'
                                   data-toggle='table'
                                   data-show-export='false'
                                   data-page-size="5"
                                   data-pagination='false'
                                   data-page-list="[5, 20, 50, 100, 200]"
                                   data-show-pagination-switch='false'
                                   data-click-to-select='false'
                                   data-show-refresh='false'
                                   data-show-toggle='false'
                                   data-show-columns='false'
                                   data-query-params='queryParams'
                                   data-search='false'
                                   data-flat='false'>
                                <thead>
                                <tr>
                                    <th data-field='auto-compensa'>Auto Compensa</th>
                                    <th data-field='bloqueio-financeiro'>Bloqueio Financeiro</th>
                                    <th data-field='limite-credito-cadastrado'>Limite de crédito cadastrado</th>
                                    <th data-field='limite-credito-disponivel'>Limite de crédito disponível</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php if (empty($dealers['AutoCompensa'])) {
                                            echo '--';
                                        } else {
                                            echo ($dealers['AutoCompensa'] == 1) ? 'Ativado' : 'Desativado';
                                        } ?>
                                    </td>
                                    <td><?php echo ($dealers['FinancialBlockEnabled'] == 1) ? 'Ativado' : 'Desativado' ?></td>
                                    <td><?php echo 'R$ ' . number_format($dealers['Overdraft'], 2, ',', '.') ?></td>
                                    <td><?php if (empty($dealers['BalanceRounded'])) {
                                            echo '--';
                                        } else {
                                            echo 'R$ ' . number_format($dealers['BalanceRounded'], 2, ',', '.');
                                        }
                                        ?></td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="tab-pane" id="tab_5_dealer">
                            <table class='table table-bordered table-detalhes'
                                   data-toggle='table'
                                   data-show-export='false'
                                   data-page-size="5"
                                   data-pagination='false'
                                   data-page-list="[5, 20, 50, 100, 200]"
                                   data-show-pagination-switch='false'
                                   data-click-to-select='false'
                                   data-show-refresh='false'
                                   data-show-toggle='false'
                                   data-show-columns='false'
                                   data-query-params='queryParams'
                                   data-search='false'
                                   data-flat='false'>
                                <thead>
                                <tr>
                                    <th data-field='status-boas-vindas'>Boas-Vindas Realizada</th>
                                    <th data-field='data-boas-vindas'>Data Boas-Vindas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php /*if (empty($dealers['StatusWellcomeName'])) {
                                            echo '--';
                                        } else {
                                            echo $dealers['StatusWellcomeName'];
                                        } ?></td>
                                    <td><?php if (empty($dealers['WellcomeDate'])) {
                                            echo '--';
                                        } else {
                                            echo $dealers['WellcomeDate'];
                                        } */?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>-->
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
