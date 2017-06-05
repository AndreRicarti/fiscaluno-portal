<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Informações do Point</h3>
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
                        <li class="nav-tab-geral active"><a href="#tab_1_point" data-toggle="tab">Geral</a></li>
                        <li class="nav-tab-endereco"><a href="#tab_2_point" data-toggle="tab">Endereço</a></li>
                        <li class="nav-tab-detalhes"><a href="#tab_3_point" data-toggle="tab">Detalhes</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_point">
                            <table class='table table-bordered table-geral'
                                   data-toggle='table'
                                   data-show-export='false'
                                   data-page-size="5"
                                   data-pagination='true'
                                   data-page-list="[5, 20, 50, 100, 200]"
                                   data-show-pagination-switch='false'
                                   data-click-to-select='false'
                                   data-show-refresh='false'
                                   data-show-toggle='false'
                                   data-show-columns='false'
                                   data-query-params='queryParams'
                                   data-search='false'
                                   data-flat='false'
                                   data-row-style='homeDashboardRowStyle'>
                                <thead>
                                <tr>
                                    <th data-field='point-id'>Point ID</th>
                                    <th data-field='pointName' data-cell-style='cellStyle'>Point Name</th>
                                    <th data-field='point-type-name'>Estrutura</th>
                                    <th data-field='enabled'>Situação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($points as $pointGeral) { ?>
                                    <tr class="style-row-table">
                                        <td><?php echo $pointGeral['PointID'] ?></td>
                                        <td><?php echo $pointGeral['PointName']; ?></td>
                                        <td><?php if (empty($pointGeral['PointTypeName'])) {
                                                echo '--';
                                            } else {
                                                echo $pointGeral['PointTypeName'];
                                            } ?></td>
                                        <td><?php
                                            if ($pointGeral['Enabled'] == 0) {
                                                echo 'Desativado';
                                            } else {
                                                echo 'Ativado';
                                            }
                                            ?> </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_2_point">
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
                                    <th data-field='address-code'>CEP</th>
                                    <th data-field='endereco'>Endereço</th>
                                    <th data-field='address-number'>Número</th>
                                    <th data-field='address-complement'>Complemento</th>
                                    <th data-field='adress-neighborhood'>Bairro</th>
                                    <th data-field='city-name'>Cidade</th>
                                    <th data-field='area-name'>Estado</th>
                                    <th data-field='point-latitude'>Latitude</th>
                                    <th data-field='point-longitude'>Logintude</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($points as $key => $pointEndereco) { ?>
                                    <tr class="style-row-table">
                                        <td><?php
                                            if (empty($pointEndereco['AddressCode'])) {
                                                echo '--';
                                            } else {
                                                $cep = $this->utils->formataCep($pointEndereco['AddressCode']);
                                                if ($cep == false) {
                                                    echo 'Cep Inválido!';
                                                } else {
                                                    echo $cep;
                                                }
                                            } ?> </td>
                                        <td><?php if (empty($pointEndereco['TipoEndereco']) AND empty($pointEndereco['AddressName'])) {
                                                echo '--';
                                            } else {
                                                echo $pointEndereco['TipoEndereco'] . " " . $pointEndereco['AddressName'];
                                            }
                                            ?></td>
                                        <td><?php if (empty($pointEndereco['AddressNumber'])) {
                                                echo '--';
                                            } else {
                                                echo $pointEndereco['AddressNumber'];
                                            }
                                            ?></td>
                                        <td><?php
                                            if (empty($pointEndereco['AddressComplement'])) {
                                                echo '--';
                                            } else {
                                                echo $pointEndereco['AddressComplement'];
                                            };
                                            ?></td>
                                        <td><?php if (empty($pointEndereco['AddressNeighborhood'])) {
                                                echo '--';
                                            } else {
                                                echo $pointEndereco['AddressNeighborhood'];
                                            }; ?></td>
                                        <td><?php echo $pointEndereco['CityName']; ?></td>
                                        <td><?php echo $pointEndereco['AreaName']; ?></td>
                                        <td><?php if (empty($pointEndereco['PointLatitude'])) {
                                                echo '--';
                                            } else {
                                                echo $pointEndereco['PointLatitude'];
                                            } ?></td>
                                        <td><?php if (empty($pointEndereco['PointLongitude'])) {
                                                echo '--';
                                            } else {
                                                echo $pointEndereco['PointLongitude'];
                                            } ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_3_point">
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
                                   data-flat='false'
                                   data-row-style='homeInformacaoAgenteRowStyle'>
                                <thead>
                                <tr>
                                    <th data-field='serial'>Serial</th>
                                    <th data-field='install'>Instalado</th>
                                    <th data-field='install-date'>Data Instalação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($points as $key => $pointDetalhes) { ?>
                                <tr class="style-row-table">
                                    <td><?php if (empty($pointDetalhes['Serial'])) {
                                            echo '--';
                                        } else {
                                            echo $pointDetalhes['Serial'];
                                        } ?></td>
                                    <td><?php if (empty($pointDetalhes['Install'])) {
                                            echo '--';
                                        } else {
                                            echo $pointDetalhes['Install'];
                                        } ?></td>
                                    <td><?php if (empty($pointDetalhes['InstallDate'])) {
                                            echo '--';
                                        } else {
                                            echo $pointDetalhes['InstallDate'];
                                        } ?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>