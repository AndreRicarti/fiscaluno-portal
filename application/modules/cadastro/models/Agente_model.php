<?php
/*  Created By Rodrigo De Caro
 *  Date: 13/12/2016
 */

class Agente_model extends CI_Model {

    private $id;
    private $name;
    private $uName; //RAZÃO SOCIAL
    private $bossName;
    private $contractNum; //ActNumber
    private $contractDate; //ActDate
    private $estruturaId;
    private $estrutura;
    private $state;
    private $cidade;
    private $cidadeId;
    private $bairro;
    private $endereco;
    private $enderecoTipo;
    private $enderecoNome;
    private $enderecoNum;
    private $enderecoComp;
    private $cep;
    private $inn; //CPF/CNPJ
    private $contactName;
    private $contactPhone;
    private $contactPhone2;
    private $contactPhone3;
    private $email;
    private $status;
    private $financialBlock;
    private $financialBlockReason;
    private $tipoContrato;
    private $tipoSangria;
    private $valorContrato;
    private $autoCompensa;

    public function __construct() {
        $this->load->model('cadastro/DAO/AgenteDAO','agentedao');
        $this->load->model('usuario/User_model','usermodel');
    }
	
	public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setUName($uName)
    {
        $this->uName = $uName;
    }

    public function getUName()
    {
        return $this->uName;
    }

    public function setBossName($bossName)
    {
        $this->bossName = $bossName;
    }

    public function getBossName()
    {
        return $this->bossName;
    }

    public function setContractNum($contractNum)
    {
        $this->contractNum = $contractNum;
    }

    public function getContractNum()
    {
        return $this->contractNum;
    }

    public function setContractDate($contractDate)
    {
        $date = date_create($contractDate);
        $this->contractDate = date_format($date,"d/m/Y H:i");
    }

    public function getContractDate()
    {
        return $this->contractDate;
    }

    public function setEstrutura($estrutura)
    {
        $this->estrutura = $estrutura;
    }

    public function getEstrutura()
    {
        return $this->estrutura;
    }

    public function setEstruturaId($estruturaId)
    {
        $this->estruturaId = $estruturaId;
    }

    public function getEstruturaId()
    {
        return $this->estruturaId;
    }

    public function setCidade($cidade)
    {        
        $this->cidade = $cidade;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidadeId($cidadeId)
    {        
        $this->cidadeId = $cidadeId;
    }

    public function getCidadeId()
    {
        return $this->cidadeId;
    }

    public function setState($state)
    {        
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setBairro($bairro)
    {        
        $this->bairro = $bairro;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setEndereco($endereco)
    {        
        $this->endereco = $endereco;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEnderecoTipo($enderecoTipo)
    {        
        $this->enderecoTipo = $enderecoTipo;
    }

    public function getEnderecoTipo()
    {
        return $this->enderecoTipo;
    }

    public function setEnderecoNome($enderecoNome)
    {        
        $this->enderecoNome = $enderecoNome;
    }

    public function getEnderecoNome()
    {
        return $this->enderecoNome;
    }

    public function setEnderecoNum($enderecoNum)
    {        
        $this->enderecoNum = $enderecoNum;
    }

    public function getEnderecoNum()
    {
        return $this->enderecoNum;
    }

    public function setEnderecoComp($enderecoComp)
    {        
        $this->enderecoComp = $enderecoComp;
    }

    public function getEnderecoComp()
    {
        return $this->enderecoComp;
    }
    
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setInn($inn)
    {
        ($inn == 'null') ? $newInn = '-' : $newInn = $inn;
        $this->inn = $newInn;
    }

    public function getInn()
    {
        return $this->inn;
    }

    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
    }

    public function getContactName()
    {
        return $this->contactName;
    }

    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;
    }

    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    public function setContactPhone2($contactPhone2)
    {
        $this->contactPhone2 = $contactPhone2;
    }

    public function getContactPhone2()
    {
        return $this->contactPhone2;
    }

    public function setContactPhone3($contactPhone3)
    {
        $this->contactPhone3 = $contactPhone3;
    }

    public function getContactPhone3()
    {
        return $this->contactPhone3;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setGrupoTarifaId($grupoTarifaId)
    {
        $this->grupoTarifaId = $grupoTarifaId;
    }

    public function getGrupoTarifaId()
    {
        return $this->grupoTarifaId;
    }

    public function setStatus($status)
    {
        ($status == 1) ? $statusStr = 'Ativado' : $statusStr = 'Desativado';        
        $this->status = $statusStr;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setFinancialBlock($financialBlock)
    {
        $this->financialBlock = $financialBlock;
    }

    public function getFinancialBlock()
    {
        return $this->financialBlock;
    }

    public function setFinancialBlockReason($financialBlockReason)
    {
        $this->financialBlockReason = $financialBlockReason;
    }

    public function getFinancialBlockReason()
    {
        return $this->financialBlockReason;
    }

    public function setTipoContrato($tipoContrato)
    {
        $this->tipoContrato = $tipoContrato;
    }

    public function getTipoContrato()
    {
        return $this->tipoContrato;
    }

    public function setTipoSangria($tipoSangria)
    {
        $this->tipoSangria = $tipoSangria;
    }

    public function getTipoSangria()
    {
        return $this->tipoSangria;
    }

    public function setValorContrato($valorContrato)
    {
        $this->valorContrato = $valorContrato;
    }

    public function getValorContrato()
    {
        return $this->valorContrato;
    }

    public function setAutoCompensa($autoCompensa)
    {
        $this->autoCompensa = $autoCompensa;
    }

    public function getAutoCompensa()
    {
        return $this->autoCompensa;
    }


    public function buildComboArray(){
        $combo = array(
             "id" => $this->id
            ,"name" => $this->name
        );
        return $combo;     
    }


    public function getDealerList($estrutura, $estado, $cidade, $enabled){        
        $dao = new AgenteDAO();
        $result = $dao->getDealerList($estrutura, $estado, $cidade, $enabled);

        $list = array();

        foreach ($result as $i){
            $obj = new Agente_model();
            $obj->setId($i->DealerID);
            $obj->setName($i->DealerName);
            $obj->setUName($i->DealerUName);
            $obj->setBossName($i->BossName);
            $obj->setEstrutura($i->DealerPai);
            $obj->setEndereco($i->Address);
            $obj->setCep($i->AddressCode);
            $obj->setCidade($i->CityName);
            $obj->setInn($i->INN);
            $obj->setContactName($i->ContactName);
            $obj->setContactPhone($i->ContactPhone);
            $obj->setEmail($i->ContactEMail);
            $obj->setStatus($i->Enabled);

            array_push($list, get_object_vars($obj));
        }

        return $list;
    }


    public function getDealerCombo($filter){
        $dao = new AgenteDAO();
        $result = $dao->getDealerCombo($filter);

        $list = array();

        foreach ($result as $i){
            $obj = new Agente_model();
            $obj->setId($i->DealerID);
            $obj->setName($i->DealerName);            

            array_push($list, $obj->buildComboArray());
        }

        return $list;       
    }


    public function getDealerInfo($dealerId){
        $dao = new AgenteDAO();
        $result = $dao->getDealerInfo($dealerId);

        $info = array();

        foreach ($result as $i){
            $obj = new Agente_model();
            $obj->setId($i->DealerID);
            $obj->setName($i->DealerName);
            $obj->setUName($i->DealerUName);
            $obj->setBossName($i->BossName);
            $obj->setContractNum($i->ActNumber);
            $obj->setContractDate($i->ActDate);
            $obj->setEstruturaId($i->DealerPaiID);
            $obj->setEstrutura($i->DealerPai);
            $obj->setEndereco($i->Address);
            $obj->setEnderecoTipo($i->AddressTypeID);
            $obj->setEnderecoNome($i->AddressName);
            $obj->setCep($i->AddressCode);
            $obj->setBairro($i->AddressNeighborhood);
            $obj->setEnderecoNum($i->AddressNumber);
            $obj->setEnderecoComp($i->AddressComplement);
            $obj->setCidade($i->CityName);
            $obj->setCidadeId($i->CityID);
            $obj->setInn($i->INN);
            $obj->setContactName($i->ContactName);
            $obj->setContactPhone($i->ContactPhone);
            $obj->setContactPhone2($i->ContactPhone2);
            $obj->setContactPhone3($i->ContactPhone3);
            $obj->setEmail($i->ContactEMail);
            $obj->setStatus($i->Enabled);               
            $obj->setFinancialBlock($i->FinancialBlockEnabled);            
            $obj->setFinancialBlockReason($i->FinancialBlockReasonId);            
            $obj->setTipoContrato($i->ContractTypeID);            
            $obj->setTipoSangria($i->CashOutTypeID);            
            $obj->setValorContrato($i->ContractValue);            
            $obj->setAutoCompensa($i->AutoCompensa);            

            array_push($info, get_object_vars($obj));
        }

        return $info;
    }


    public function getDealersByCity(){
        $dao = new AgenteDAO();
        $result = $dao->getDealersByCity();

        return $result;
    }

    
    public function buildFullAddress($tipo, $endereco, $numero, $complemento, $bairro, $cidade, $cep){

        $numero = $numero + ",";        
        $bairro = "- " + $bairro;

        $fullAddress = "$tipo $endereco, $numero $complemento $bairro - $cidade - $cep";
        return $fullAddress;
    }

    public function createDealer($params){
        $userObj = new User_model();
        $session = $userObj->getSession();
        $params['login'] = $session['login'];      
        $dao = new AgenteDAO();        
        $result = $dao->createDealer($params);
        $newDealer = $dao->getDealerByInn($params['inn']);

        if($params['autocompensa'] == 1)
            $boletoSettings = $dao->enableAutoCompensaSettings($newDealer[0]->DealerID,$session['id']);

        return $result;
    }

    public function updateDealer($params){
        $userObj = new User_model();
        $session = $userObj->getSession();                
        $dao = new AgenteDAO();        
        $autoCompensaResult = $dao->verifyAutoCompensa($params['id']);
        $autoCompensa = $autoCompensaResult[0]->AutoCompensa;
        $params['usuario'] = $session['id'];

        $result = $dao->updateDealer($params);        

        if($params['autocompensa'] != $autoCompensa){            
            if($params['autocompensa'] == TRUE)
                $boletoSettings = $dao->enableAutoCompensaSettings($params['id'],$session['id']);
            else
                $boletoSettings = $dao->disableAutoCompensaSettings($params['id'],$session['id']);
        }      

        return $result;
    }

    public function getFinancialBlockReasonCombo($type){
        $dao = new AgenteDAO();        
        $result = $dao->getFinancialBlockReason($type);
        return $result;
    }

    public function getContractType(){
        $dao = new AgenteDAO();        
        $result = $dao->getContractType();
        return $result;
    }

    public function getCashOutType(){
        $dao = new AgenteDAO();        
        $result = $dao->getCashOutType();
        return $result;
    }

    public function searchDealerByName($name)
    {
        $dao = new AgenteDAO();
        $dealerList = $dao->searchDealerByName($name);
        return $dealerList;
    }

    public function searchDealerByPoint($pointId)
    {
        $dao = new AgenteDAO();
        $dealerId = $dao->searchDealerByPoint($pointId);
        return $dealerId;
    }

    public function dealerInfoHome($dealerId){
        $dao = new AgenteDAO();
        return $dao->dealerInfoHome($dealerId);
    }

}
