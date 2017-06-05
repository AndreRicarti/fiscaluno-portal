<?php
/*  Created By Rodrigo De Caro
 *  Date: 13/12/2016
 */

class AgenteDAO extends CI_Model {
	
	public function getDealerList($estrutura, $estado, $cidade, $enabled){
        $query = "
            DECLARE  @Enabled BIT = ?
                    ,@Structure INT = ?
                    ,@StateID INT = ?
                    ,@CityID INT = ?

            SELECT
                 d.DealerID
                ,d.DealerName
                ,d.DealerUName
                ,d.BossName
                ,st.StructureName AS DealerPai
                ,lc.CityName
                ,d.[Address]
                ,d.AddressCode
                ,d.INN    
                ,d.[Enabled]
                ,d.ContactName
                ,d.ContactPhone
                ,d.ContactEMail
            FROM [main].dbo.Dealer d
            INNER JOIN [main].dbo.LocationCity lc
                ON lc.CityID = d.CityID
            INNER JOIN [main].dbo.LocationArea la
                ON lc.AreaID = la.AreaID
            INNER JOIN [main].dbo.Structure st
                ON d.StructureID = st.StructureID
            WHERE (d.[Enabled] = @Enabled OR @Enabled IS NULL)
            AND (d.StructureID = @Structure OR @Structure IS NULL)
            AND (la.AreaID = @StateID OR @StateID IS NULL)
            AND (d.CityID = @CityID OR @CityID IS NULL)
            ORDER BY d.DealerName
        ";

        $sql = $this->db->query($query,
            array($enabled, $estrutura, $estado, $cidade)
        )->result();

        return $sql;
    }


    public function getDealerCombo($filter){

        $query = "
            DECLARE @Filter VARCHAR(255) = ?

            SELECT
                 d.DealerID
                ,d.DealerName
            FROM [main].dbo.Dealer d
            WHERE d.Enabled = 1
            AND (d.DealerName = @Filter OR @Filter IS NULL)
            ORDER BY d.DealerName
        ";

        $sql = $this->db->query($query,array($filter))->result();

        return $sql;
    }


    public function getDealerInfo($dealerId){
        $query = "
            DECLARE @DealerID INT = ?

            SELECT
                 d.DealerID
                ,d.DealerName
                ,d.DealerUName
                ,d.BossName
                ,d.ActNumber
                ,d.ActDate
                ,d.ContractValue
                ,st.StructureID AS DealerPaiID
                ,st.StructureName AS DealerPai
                ,d.CityID
                ,lc.CityName
                ,d.[Address]
                ,d.AddressTypeID
                ,d.AddressName
                ,d.AddressCode
                ,d.AddressNeighborhood
                ,d.AddressNumber
                ,d.AddressComplement
                ,d.INN
                ,d.[Enabled]
                ,d.ContactName
                ,d.ContactPhone
                ,d.ContactPhone2
                ,d.ContactPhone3
                ,d.ContactEMail
                ,d.FinancialBlockEnabled
                ,d.FinancialBlockReasonId
                ,d.ContractTypeID
                ,d.CashOutTypeID
                ,d.AutoCompensa
            FROM [main].dbo.Dealer d
            INNER JOIN [main].dbo.LocationCity lc
                ON lc.CityID = d.CityID
            INNER JOIN [main].dbo.Structure st
                ON d.StructureID = st.StructureID
            WHERE d.DealerID = @DealerID         
        ";

        $sql = $this->db->query($query,
            array($dealerId)
        )->result();

        return $sql;
    }


    public function getDealersByCity(){
        $query = "
            SELECT TOP 5
                 lc.CityName AS city
                ,COUNT(DealerID) AS qtd
            FROM [main].dbo.Dealer d
            INNER JOIN [main].dbo.LocationCity lc
                ON lc.CityID = d.CityID
            WHERE d.[Enabled] = 1
            GROUP BY lc.CityName
            ORDER BY Qtd DESC 
        ";

        $sql = $this->db->query($query)->result();

        return $sql;
    }


    public function createDealer($params){

        $query = "
            DECLARE @DealerID int
            DECLARE @return_value int

            EXEC @return_value = [Main].[dbo].[CreateDealer] 
                 @Login = ?                
                ,@DealerName = ?
                ,@Enabled = '1'
                ,@DealerType = ?
                ,@BossName = ?
                ,@CityID = ?
                ,@Address = ?
                ,@DealerUName = ?
                ,@INN = ?
                ,@ContactName = ?
                ,@ContactPhone = ?
                ,@ContactPhone2 = ?
                ,@ContactPhone3 = ?
                ,@ContactEMail = ?
                ,@ActNumber = ?
                ,@ActDate = ?
                ,@FinancialBlockEnabled = '0'
                ,@IsOverdraftsFIFO = '0'                
                ,@UseParentInfo = '0'
                ,@Wellcome = '0'
                ,@AddressName = ?
                ,@AddressNumber = ?
                ,@AddressComplement = ?
                ,@AddressNeighborhood = ?
                ,@AddressCode = ?
                ,@AddressTypeID = ?
                ,@Rent = '0'
                ,@DealerDailyLimit = '0'                
                ,@StructureID = ?
                ,@ContractTypeID = ?
                ,@CashOutTypeID = ?
                ,@ContractValue = ?;

            SELECT @DealerID;
        ";

        $sql = $this->db->query($query,array(
             $params['login']
            ,$params['nome']
            ,$params['tipo']
            ,$params['responsavel']
            ,$params['cidade']
            ,$params['enderecoCompleto']
            ,$params['razaoSocial']
            ,$params['inn']
            ,$params['contato']
            ,$params['telefone1']
            ,$params['telefone2']
            ,$params['telefone3']
            ,$params['email']
            ,$params['numContrato']
            ,$params['dataContrato']            
            ,$params['endereco']
            ,$params['numEndereco']
            ,$params['compEndereco']
            ,$params['bairroEndereco']
            ,$params['cep']
            ,$params['tipoEndereco']            
            ,$params['estrutura']
            ,$params['tipoContrato']
            ,$params['tipoSangria']
            ,$params['valorContrato']
        ));

        if($sql){
            $result = array(
                 "status" => 1
                ,"message" => "AvaliacoesAlunos cadastrado com sucesso"
            );
        } else {
            $result = array(
                 "status" => 2
                ,"message" => "Erro ao criar agente. Tente novamente."
            );
        }

        return $result;
    }

    public function updateDealer($params){

        $query = "
            UPDATE [main].dbo.Dealer 
            SET  StructureID = ?
                ,DealerName = ?
                ,DealerUName = ?
                ,INN = ?
                ,[Enabled] = ?
                ,BossName = ?
                ,ActNumber = ?
                ,ActDate = ?
                ,[Address] = ?
                ,AddressCode = ?
                ,AddressTypeID = ?
                ,AddressName = ?
                ,AddressNumber = ?
                ,AddressComplement = ?
                ,AddressNeighborhood = ?
                ,CityID = ?
                ,ContactName = ?
                ,ContactPhone = ?
                ,ContactPhone2 = ?
                ,ContactPhone3 = ?
                ,ContactEMail = ?
                ,FinancialBlockEnabled = ?
                ,FinancialBlockReasonId = ?
                ,ContractTypeID = ?
                ,CashOutTypeID = ?
                ,hUserID = ?
                ,hDateTime = GETDATE()
                ,ContractValue = ?
                ,AutoCompensa = ?
            WHERE DealerID = ?
        ";

        $sql = $this->db->query($query,array(
             $params['estrutura']
            ,$params['nome']
            ,$params['razaoSocial']            
            ,$params['inn']            
            ,$params['status']            
            ,$params['responsavel']
            ,$params['numContrato']
            ,$params['dataContrato']
            ,$params['enderecoCompleto']
            ,$params['cep']
            ,$params['tipoEndereco']
            ,$params['endereco']
            ,$params['numEndereco']
            ,$params['compEndereco']
            ,$params['bairroEndereco']
            ,$params['cidade']
            ,$params['contato']
            ,$params['telefone1']
            ,$params['telefone2']
            ,$params['telefone3']
            ,$params['email']
            ,$params['financialBlock']
            ,$params['financialBlockReason']                    
            ,$params['tipoContrato']                    
            ,$params['tipoSangria']                    
            ,$params['usuario']                    
            ,$params['valorContrato']            
            ,$params['autocompensa']            
            ,$params['id']            
        ));

        return $sql;
    }


    public function getFinancialBlockReason($type){

        $query = "
            SELECT
                 dfbr.ReasonID AS id
                ,dfbr.ReasonTypeName AS name
            FROM [main].dbo.Dealer_FinancialBlockReason dfbr
            WHERE dfbr.ReasonTypeID = ?
            ORDER BY dfbr.ReasonTypeName
        ";
        
        $sql = $this->db->query($query,array($type))->result();
        return $sql;

    }

    public function getContractType(){
        $query = "
            SELECT
                 ContractTypeID AS id
                ,[Description] AS name
            FROM [main].dbo.ContractType
            ORDER BY [Description]
        ";
        
        $sql = $this->db->query($query)->result();
        return $sql;
    }

    public function getCashOutType(){
        $query = "
            SELECT
                 CashOutTypeID AS id
                ,[Description] AS name
            FROM [main].dbo.CashOutType
            ORDER BY [Description]
        ";
        
        $sql = $this->db->query($query)->result();
        return $sql;
    }

    public function verifyAutoCompensa($dealerId){
        $query = "
            SELECT
                d.AutoCompensa
            FROM [main].dbo.Dealer d
            WHERE d.DealerID = ?
        ";
        
        $sql = $this->db->query($query,array($dealerId))->result();
        return $sql;
    }

    public function enableAutoCompensaSettings($dealer,$person){
        $query = "
            ;MERGE BoletoReceiverSettings BRS
                USING (
                    SELECT
                    ? AS ReceiverDealerID,
                    341 AS BankID,
                    100 AS BoletoIssueLimit,
                    0 AS BoletoMinValue,
                    0 AS BoletoCommission,
                    1 AS AllowForcedIssue,
                    0 AS DaysToExpire,
                    0 AS FineIsFixed,
                    0 AS FineForExpire,
                    0 AS TakeFineDaily,
                    1 AS ScheduleType,
                    14 AS BoletoType,
                    GETDATE() AS BoletoStartDate,
                    1 AS Enabled,
                    GETDATE() AS hDateTime,
                    ? AS hUserID,
                    2 AS BankAccountID
                ) New ON
                    BRS.ReceiverDealerID = New.ReceiverDealerID
                    WHEN MATCHED
                    THEN UPDATE SET
                    BRS.BankID = New.BankID,
                    BRS.BoletoIssueLimit = New.BoletoIssueLimit,
                    BRS.BoletoMinValue = New.BoletoMinValue,
                    BRS.BoletoCommission = New.BoletoCommission,
                    BRS.AllowForcedIssue = New.AllowForcedIssue,
                    BRS.DaysToExpire = New.DaysToExpire,
                    BRS.FineIsFixed = New.FineIsFixed,
                    BRS.FineForExpire = New.FineForExpire,
                    BRS.TakeFineDaily = New.TakeFineDaily,
                    BRS.ScheduleType = New.ScheduleType,
                    BRS.BoletoType = New.BoletoType,
                    BRS.Enabled = New.Enabled,
                    BRS.hDateTime = New.hDateTime,
                    BRS.hUserID = New.hUserID,
                    BRS.BankAccountID = New.BankAccountID
                WHEN NOT MATCHED
                THEN INSERT (
                    ReceiverDealerID,
                    BankID,
                    BoletoIssueLimit, 
                    BoletoMinValue, 
                    BoletoCommission, 
                    AllowForcedIssue, 
                    DaysToExpire,
                    FineIsFixed,
                    FineForExpire,
                    TakeFineDaily,
                    ScheduleType,
                    BoletoType,
                    BoletoStartDate,
                    Enabled,
                    hDateTime,
                    hUserID,
                    BankAccountID)
                VALUES (
                    New.ReceiverDealerID,
                    New.BankID,
                    New.BoletoIssueLimit, 
                    New.BoletoMinValue, 
                    New.BoletoCommission, 
                    New.AllowForcedIssue, 
                    New.DaysToExpire,
                    New.FineIsFixed,
                    New.FineForExpire,
                    New.TakeFineDaily,
                    New.ScheduleType,
                    New.BoletoType,
                    New.BoletoStartDate,
                    New.Enabled,
                    New.hDateTime,
                    New.hUserID,
                    New.BankAccountID);
        ";

        $sql = $this->db->query($query,array($dealer,$person));
        return $sql;
    }

    public function disableAutoCompensaSettings($dealer,$person){
        $query = "
            UPDATE [main].dbo.BoletoReceiverSettings
            SET [Enabled] = 0,
                hUserID = ?,
                hDateTime = GETDATE()
            WHERE ReceiverDealerID = ?
        ";
        
        $sql = $this->db->query($query,array($person,$dealer));
        return $sql;
    }

    public function getDealerByInn($inn){
        $query = "
            SELECT
                d.DealerID
            FROM [main].dbo.Dealer d
            WHERE d.INN = ?
        ";
        
        $sql = $this->db->query($query,array($inn))->result();
        return $sql;
    }

    public function searchDealerByName($name)
    {
        $this->db->select('DealerID AS id, DealerName AS name');
        $this->db->like('DealerName', $name);
        $query = $this->db->get('Dealer')->result_array();

        return $query;
    }

    public function searchDealerByPoint($pointId)
    {
        $query = "
            SELECT
                p.DealerID AS id
            FROM [main].dbo.Point p
            WHERE p.PointID = ? 
        ";
        
        $sql = $this->db->query($query,array($pointId))->row_array();
        return $sql;
    }

    public function dealerInfoHome($dealerId){
        $query = "
            SELECT
                d.DealerID,
				d.DealerName,
				d.DealerUName,
                d.BossName,
                d.INN,
                d.AddressCode,
                at.Name AS TipoEndereco,	
                d.AddressName,
                d.AddressNumber,
                d.AddressComplement,
                d.AddressNeighborhood,
                lc.CityName,
                la.AreaName,
                d.ContactName,
                d.ContactPhone,
                d.ContactPhone2,
                d.ContactPhone3,
                d.ContactEMail,
                d.[Enabled],
                d.FinancialBlockEnabled,
                st.StructureName,
                d.AutoCompensa,                
                db.Overdraft,
                db.BalanceRounded
            FROM [main].dbo.Dealer d
            INNER JOIN [main].dbo.AddressType at
                ON d.AddressTypeID = at.AddressTypeID
            INNER JOIN [main].dbo.LocationCity lc
                ON d.CityID = lc.CityID
            INNER JOIN [main].dbo.LocationArea la
                ON lc.AreaID = la.AreaID
            INNER JOIN [main].dbo.Dealer_Balance db
                ON db.DealerID = d.DealerID
            LEFT JOIN [main].dbo.Structure st
                ON d.StructureID = st.StructureID
            WHERE d.DealerID = ?
        ";

        $sql = $this->db->query($query,array($dealerId))->row_array();
        return $sql;
    }

}
