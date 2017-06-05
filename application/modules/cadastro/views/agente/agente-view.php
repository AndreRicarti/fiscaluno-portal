<section class="content-header">
    <h1>
        Avaliações Alunos
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros</h3>
                </div>
                <form class="form-horizontal" action="">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="input-estrutura-filtro" class="col-sm-4 control-label">Avaliações:</label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                    <option value="volvo">Todas</option>
                                    <option value="saab">Avaliações Boas</option>
                                    <option value="mercedes">Avaliações Negativas</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-ativado-filtro" class="col-sm-4 control-label">Ativado:</label>
                            <div class="col-sm-8" style="margin-top: 7px">
                                <input id="input-ativado-filtro" type="checkbox" checked>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" id="search-btn" class="btn btn-info pull-right glyphicon glyphicon-search"
                                title="Buscar"/>
                        <button type="button" id="export-btn"
                                class="btn btn-success pull-right glyphicon glyphicon-download-alt"
                                style="margin-right: 3px" title="Exportar"/>
                        <button type="button" id="new-dealer-btn"
                                class="btn btn-primary pull-right glyphicon glyphicon-plus" style="margin-right: 3px"
                                title="Novo Agente"/>
                    </div>
                </form>
            </div>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Reclamações</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="dealerCityChart" style="height:250px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-9 no-padding-col">
            <div id="dealer-list-div" hidden>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lista</h3>
                    </div>
                    <div id="div-dealer-table" class="box-body">
                    </div>
                </div>
            </div>

            <div id="dealer-new-edit-div" hidden>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 id="dealer-new-edit-title" class="box-title"></h3>
                    </div>
                    <form class="form-horizontal" action="javascript:void(0);">
                        <div id="div-new-edit-form-div" class="box-body">
                            <div class="callout callout-info">
                                <h4>Informação Geral</h4>
                            </div>
                            <input id="form-dealer-id" style="display: none"/>
                            <div class="form-group">
                                <label for="form-dealer-structure" class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="0" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-dealer-name" class="col-sm-2 control-label">Aluno</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="1" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-dealer-uname" class="col-sm-2 control-label">Campus</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="4" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-dealer-uname" class="col-sm-2 control-label">Avaliacão</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="2"
                                           value="Positiva">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-dealer-uname" class="col-sm-2 control-label">Descrição</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="3"
                                           value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-dealer-enabled" class="col-sm-2 control-label">Ativado</label>
                                <div class="col-sm-10" style="margin-top: 7px">
                                    <input id="form-dealer-enabled" type="checkbox" checked>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="box-footer with-border">
                        <div id="form-btn-div"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src=<?php echo base_url() . "assets/pages/components/combos.js" ?>></script>
<script src=<?php echo base_url() . "assets/pages/cadastro/agente/agente-main.js" ?>></script>
<script src=<?php echo base_url() . "assets/pages/cadastro/agente/agente-filtros.js" ?>></script>
<script src=<?php echo base_url() . "assets/pages/cadastro/agente/agente-chart.js" ?>></script>