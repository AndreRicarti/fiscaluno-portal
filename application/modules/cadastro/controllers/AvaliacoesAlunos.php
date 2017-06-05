<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Sao_Paulo');

class AvaliacoesAlunos extends MX_Controller {

	public function __construct(){
        parent::__construct();
		//$this->load->model('cadastro/Agente_model');
		//$this->load->library('utils');
	}
	
	public function index()
	{
		$this->template->load('template', 'agente/agente-view.php');
        //$this->load->view('agente/agente-modals.php');
	}

	public function get() {


        $result = array
        (
            "0" => array
            (
                "ID" => "1",
                "Aluno" => "Murlo Preceruti",
                "Campus" => "Barra Funda",
                "Avaliação" => "Negativa",
            ),
            "1" => array
            (
                "ID" => "2",
                "Aluno" => "Julio Cesar",
                "Campus" => "Barra Funda",
                "Avaliação" => "Positiva",
            ),
        );

		
		echo json_encode($result);
	}

	public function getCombo(){

		$filterParam = $this->input->post('filter');
		(empty($filterParam)) ? $filter = NULL : $filter = $filterParam;

		$obj = new Agente_model();
		$result = $obj->getDealerCombo($filter);
		
		echo json_encode($result);
	}

    public function getById(){

		$dealerIdParam = $this->input->post('dealerid');
		(empty($dealerIdParam)) ? $dealerId = NULL : $dealerId = $dealerIdParam;

		$obj = new Agente_model();
		$result = $obj->getDealerInfo($dealerId);
		
		echo json_encode($result);
	}

	public function getDealersByCity(){
		
		$obj = new Agente_model();
		$result = $obj->getDealersByCity();
		
		echo json_encode($result);
	}

	public function getFinancialBlockReason(){
		
		$type = $this->input->post('type');
		if(empty($type)) die();

		$obj = new Agente_model();
		$result = $obj->getFinancialBlockReasonCombo($type);
		
		echo json_encode($result);
	}

	public function getContractType(){
		$obj = new Agente_model();
		$result = $obj->getContractType();
		
		echo json_encode($result);
	}

	public function getCashOutType(){
		$obj = new Agente_model();
		$result = $obj->getCashOutType();
		
		echo json_encode($result);
	}

	public function export(){

		ob_start();

		$estruturaParam = $this->input->post('estrutura');
		(empty($estruturaParam)) ? $estrutura = NULL : $estrutura = $estruturaParam;

		$estadoParam = $this->input->post('estado');
		(empty($estadoParam)) ? $estado = NULL : $estado = $estadoParam;

		$cidadeParam = $this->input->post('cidade');
		(empty($cidadeParam)) ? $cidade = NULL : $cidade = $cidadeParam;
		
		$enabledParam = $this->input->post('enabled');
		($enabledParam == "true") ? $enabled = 1 : $enabled = NULL;

		$obj = new Agente_model();
		$result = $obj->getDealerList($estrutura, $estado, $cidade, $enabled);
		
		$this->excel->setActiveSheetIndex(0);

		//TITULO
		$this->excel->getActiveSheet()->setCellValue('A1','Lista de Agentes');
        $this->excel->getActiveSheet()->mergeCells('A1:M1');
		//CABECALHO DA TABELA
		$this->excel->getActiveSheet()->setCellValue('A2','ID');
		$this->excel->getActiveSheet()->setCellValue('B2','Nome');
		$this->excel->getActiveSheet()->setCellValue('C2','Razão Social');
		$this->excel->getActiveSheet()->setCellValue('D2','Responsável');
		$this->excel->getActiveSheet()->setCellValue('E2','Estrutura');
		$this->excel->getActiveSheet()->setCellValue('F2','Cidade');
		$this->excel->getActiveSheet()->setCellValue('G2','Endereço');
		$this->excel->getActiveSheet()->setCellValue('H2','CEP');
		$this->excel->getActiveSheet()->setCellValue('I2','CPF/CNPJ');		
		$this->excel->getActiveSheet()->setCellValue('J2','Contato');
		$this->excel->getActiveSheet()->setCellValue('K2','Telefone do Contato');
		$this->excel->getActiveSheet()->setCellValue('L2','Email do Contato');
		$this->excel->getActiveSheet()->setCellValue('M2','Status');
				
		$rowCount = 3;

        foreach($result as $i){
            $this->excel->getActiveSheet()->setCellValue('A'.$rowCount, $i['id']);
            $this->excel->getActiveSheet()->setCellValue('B'.$rowCount, $i['name']);
            $this->excel->getActiveSheet()->setCellValue('C'.$rowCount, $i['uName']);
            $this->excel->getActiveSheet()->setCellValue('D'.$rowCount, $i['bossName']);
            $this->excel->getActiveSheet()->setCellValue('E'.$rowCount, $i['estrutura']);
            $this->excel->getActiveSheet()->setCellValue('F'.$rowCount, $i['cidade']);
            $this->excel->getActiveSheet()->setCellValue('G'.$rowCount, $i['endereco']);   
            $this->excel->getActiveSheet()->setCellValue('H'.$rowCount, $i['cep']);            
			$this->excel->getActiveSheet()->setCellValueExplicit('I'.$rowCount, $i['inn'], PHPExcel_Cell_DataType::TYPE_STRING);
            $this->excel->getActiveSheet()->setCellValue('J'.$rowCount, $i['contactName']);
            $this->excel->getActiveSheet()->setCellValue('K'.$rowCount, $i['contactPhone']);
            $this->excel->getActiveSheet()->setCellValue('L'.$rowCount, $i['email']);
            $this->excel->getActiveSheet()->setCellValue('M'.$rowCount, $i['status']);            

            $rowCount++;
        }

		$this->excel->getActiveSheet()->setTitle('AvaliacoesAlunos');

		$titleStyle = array(
            'alignment' => array(
                  'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                 ,'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
            ),
            'font'  => array(
                'bold'  => true,                
                'size'  => 12,
                'name'  => 'Arial'
            )
        );

        $headerStyle = array(
            'alignment' => array(
                  'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                 ,'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'ffbe63')
            ),
            'borders' => array(
                'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN)
            ),
            'font'  => array(
                'bold'  => true,                
                'size'  => 10,
                'name'  => 'Arial'
            )
        );

        $this->excel->getActiveSheet()->getStyle("A1:M1")->applyFromArray($titleStyle);
        $this->excel->getActiveSheet()->getStyle("A2:M2")->applyFromArray($headerStyle);

		//AJUSTES MANUAIS DE TAMANHO PARA AS CELLS
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth('10');
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth('70');
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth('70');
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth('23');
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth('21');
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth('17');
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth('100');
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth('25');
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth('24');
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth('23');
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth('17');
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth('33');
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth('13');

		$currentDate = date('YmdHis');
        $filename = "agentes_".$currentDate.".xlsx";
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        $objWriter->save("php://output");
		
		$xlsData = ob_get_contents();
		ob_end_clean();
		
		$response =  array(
			'success' => true,
			'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($xlsData)
		);

        echo json_encode($response);
	}

	public function create(){
		$obj = new Agente_model();		
		$params = array();
		(empty($this->input->post('estrutura'))) ? die() : $params['estrutura'] = $this->input->post('estrutura');		
		(empty($this->input->post('nome'))) ? die() : $params['nome'] = $this->input->post('nome');
		($params['estrutura'] == 2) ? $params['tipo'] = 8 : $params['tipo'] = 3;
		(empty($this->input->post('razaoSocial'))) ? die() : $params['razaoSocial'] = $this->input->post('razaoSocial');		
		$validarInn = $this->utils->validarInn($this->input->post('inn'));
		if($validarInn == FALSE){
			$result = array(
				 "status" => 3
				,"message" => "O CPF/CNPJ digitado é inválido."
			);
			echo json_encode($result);
			die();
		}           
		$params['inn'] = $this->input->post('inn');          
		$params['status'] = $this->input->post('status');
		(empty($this->input->post('responsavel'))) ? $params['responsavel'] = NULL : $params['responsavel'] = $this->input->post('responsavel');		
		(empty($this->input->post('numContrato'))) ? $params['numContrato'] = NULL : $params['numContrato'] = $this->input->post('numContrato');		
		(empty($this->input->post('dataContrato'))) ? $params['dataContrato'] = NULL : $params['dataContrato'] = $this->input->post('dataContrato');		
		(empty($this->input->post('tipoContrato'))) ? $params['tipoContrato'] = NULL : $params['tipoContrato'] = $this->input->post('tipoContrato');		
		(empty($this->input->post('valorContrato'))) ? $params['valorContrato'] = NULL : $params['valorContrato'] = $this->input->post('valorContrato');		
		(empty($this->input->post('tipoSangria'))) ? $params['tipoSangria'] = NULL : $params['tipoSangria'] = $this->input->post('tipoSangria');		
		(empty($this->input->post('cep'))) ? die() : $params['cep'] = $this->input->post('cep');
		(empty($this->input->post('tipoEndereco'))) ? die() : $params['tipoEndereco'] = $this->input->post('tipoEndereco');
		(empty($this->input->post('tipoEnderecoNome'))) ? die() : $params['tipoEnderecoNome'] = $this->input->post('tipoEnderecoNome');
		(empty($this->input->post('endereco'))) ? die() : $params['endereco'] = $this->input->post('endereco');
		(empty($this->input->post('numEndereco'))) ? die() : $params['numEndereco'] = $this->input->post('numEndereco');
		(empty($this->input->post('compEndereco'))) ? $params['compEndereco'] = NULL : $params['compEndereco'] = $this->input->post('compEndereco');	
		(empty($this->input->post('bairroEndereco'))) ? die() : $params['bairroEndereco'] = $this->input->post('bairroEndereco');
		(empty($this->input->post('cidade'))) ? die() : $params['cidade'] = $this->input->post('cidade');		
		(empty($this->input->post('cidadeNome'))) ? die() : $params['cidadeNome'] = $this->input->post('cidadeNome');		
		(empty($this->input->post('contato'))) ? $params['contato'] = NULL : $params['contato'] = $this->input->post('contato');
		(empty($this->input->post('telefone1'))) ? die() : $params['telefone1'] = $this->input->post('telefone1');
		(empty($this->input->post('telefone2'))) ? $params['telefone2'] = NULL : $params['telefone2'] = $this->input->post('telefone2');
		(empty($this->input->post('telefone3'))) ? $params['telefone3'] = NULL : $params['telefone3'] = $this->input->post('telefone3');		
		(empty($this->input->post('email'))) ? die() : $params['email'] = $this->input->post('email');
		(empty($this->input->post('autocompensa'))) ? $params['autocompensa'] = 0 : $params['autocompensa'] = $this->input->post('autocompensa');
	
		$params['enderecoCompleto'] = $obj->buildFullAddress(
			 $params['tipoEnderecoNome']
			,$params['endereco']
			,$params['numEndereco']
			,$params['compEndereco']
			,$params['bairroEndereco']
			,$params['cidadeNome']
			,$params['cep']
		);
		
		$result = $obj->createDealer($params);

		echo json_encode($result);		
	}

	public function update(){
		$obj = new Agente_model();		
		$params = array();		
		(empty($this->input->post('estrutura'))) ? die() : $params['estrutura'] = $this->input->post('estrutura');		
		(empty($this->input->post('nome'))) ? die() : $params['nome'] = $this->input->post('nome');		
		(empty($this->input->post('razaoSocial'))) ? die() : $params['razaoSocial'] = $this->input->post('razaoSocial');		
		$validarInn = $this->utils->validarInn($this->input->post('inn'));
		if($validarInn == FALSE){
			$result = array(
				 "status" => 3
				,"message" => "O CPF/CNPJ digitado é inválido."
			);
			echo json_encode($result);
			die();
		}           
		$params['inn'] = $this->input->post('inn');          
		$params['status'] = $this->input->post('status');
		(empty($this->input->post('responsavel'))) ? $params['responsavel'] = NULL : $params['responsavel'] = $this->input->post('responsavel');		
		(empty($this->input->post('numContrato'))) ? $params['numContrato'] = NULL : $params['numContrato'] = $this->input->post('numContrato');		
		(empty($this->input->post('dataContrato'))) ? $params['dataContrato'] = NULL : $params['dataContrato'] = $this->input->post('dataContrato');
		(empty($this->input->post('tipoContrato'))) ? $params['tipoContrato'] = NULL : $params['tipoContrato'] = $this->input->post('tipoContrato');
		(empty($this->input->post('valorContrato'))) ? $params['valorContrato'] = NULL : $params['valorContrato'] = $this->input->post('valorContrato');	
		(empty($this->input->post('tipoSangria'))) ? $params['tipoSangria'] = NULL : $params['tipoSangria'] = $this->input->post('tipoSangria');	
		(empty($this->input->post('cep'))) ? die() : $params['cep'] = $this->input->post('cep');
		(empty($this->input->post('tipoEndereco'))) ? die() : $params['tipoEndereco'] = $this->input->post('tipoEndereco');
		(empty($this->input->post('tipoEnderecoNome'))) ? die() : $params['tipoEnderecoNome'] = $this->input->post('tipoEnderecoNome');
		(empty($this->input->post('endereco'))) ? die() : $params['endereco'] = $this->input->post('endereco');
		(empty($this->input->post('numEndereco'))) ? $params['numEndereco'] = NULL : $params['numEndereco'] = $this->input->post('numEndereco');
		(empty($this->input->post('compEndereco'))) ? $params['compEndereco'] = NULL : $params['compEndereco'] = $this->input->post('compEndereco');	
		(empty($this->input->post('bairroEndereco'))) ? die() : $params['bairroEndereco'] = $this->input->post('bairroEndereco');
		(empty($this->input->post('cidade'))) ? die() : $params['cidade'] = $this->input->post('cidade');		
		(empty($this->input->post('cidadeNome'))) ? die() : $params['cidadeNome'] = $this->input->post('cidadeNome');		
		(empty($this->input->post('contato'))) ? $params['contato'] = NULL : $params['contato'] = $this->input->post('contato');
		(empty($this->input->post('telefone1'))) ? die() : $params['telefone1'] = $this->input->post('telefone1');
		(empty($this->input->post('telefone2'))) ? $params['telefone2'] = NULL : $params['telefone2'] = $this->input->post('telefone2');
		(empty($this->input->post('telefone3'))) ? $params['telefone3'] = NULL : $params['telefone3'] = $this->input->post('telefone3');		
		(empty($this->input->post('email'))) ? die() : $params['email'] = $this->input->post('email');
		$params['financialBlock'] = $this->input->post('financialBlock');
		(empty($this->input->post('financialBlockReason'))) ? $params['financialBlockReason'] = NULL : $params['financialBlockReason'] = $this->input->post('financialBlockReason');		
		(empty($this->input->post('id'))) ? die() : $params['id'] = $this->input->post('id');
		(empty($this->input->post('autocompensa'))) ? $params['autocompensa'] = 0 : $params['autocompensa'] = $this->input->post('autocompensa');

		$params['enderecoCompleto'] = $obj->buildFullAddress(
			 $params['tipoEnderecoNome']
			,$params['endereco']
			,$params['numEndereco']
			,$params['compEndereco']
			,$params['bairroEndereco']
			,$params['cidadeNome']
			,$params['cep']
		);

		$result = $obj->updateDealer($params);

		echo json_encode($result);
	} 

}
