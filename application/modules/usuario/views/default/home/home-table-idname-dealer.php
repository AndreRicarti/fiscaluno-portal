<?php
/**
 * Created by PhpStorm.
 * User: André Felipe Ricarti
 * Date: 11/05/2017
 * Time: 13:03
 */ ?>

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
            <th data-field='id'>Id</th>
            <th data-field='name'>Nome</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($apuracoes as $apuracao) {
        $dataApuracao = $apuracao['Data_Criacao'];
        $dataApuracao = formatartarDataExibicao($dataApuracao);
        ?>
        <tr>
            <td><?php echo $apuracao['Id_Apuracao']; ?></td>
            <td><?php echo $apuracao['Nome_Arquivo'] . ".csv"; ?></td>
            <td><?php echo $dataApuracao; ?></td>
            <td><?php echo formatartarStatusExibicao($apuracao['Status_Apuracao']); ?></td>
            <td class="table-actions">
                <a href="<?php echo base_url(); ?>apuracao/apuracao/getSangria/<?php echo $apuracao['Id_Apuracao'] ?>">
                    <button class='btn btn-default glyphicon glyphicon-eye-open btn-xs' title="Detalhes"></button>
                </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
