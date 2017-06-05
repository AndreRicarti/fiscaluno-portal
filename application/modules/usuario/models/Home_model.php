<?php

/*  Created By Rodrigo De Caro
 *  Date: 28/04/2017
 */

class Home_model extends CI_Model
{

    public function __construct()
    {
        $this->load->model('cadastro/Agente_model');
        $this->load->model('cadastro/Point_model');
        $this->load->model('operacional/Terminal_model');
    }

    public function getParentDealerByPoint($pointId)
    {
        $dealerModel = new Agente_model();
        return $dealerModel->searchDealerByPoint($pointId);
    }

    /**
     * @function getParentDealerByTerminal() = Função que retorna o PointID e o DealerID
     * @param $terminalId
     * @return mixed
     */
    public function getParentDealerByTerminal($terminalId)
    {
        $terminal_model = new Terminal_model();
        $pointId = $terminal_model->getPointID($terminalId);

        $agente_model = new Agente_model();
        $dealerId = $agente_model->searchDealerByPoint($pointId);

        $result['pointId'] = $pointId;
        $result['dealerId'] = $dealerId;

        return $result;
    }

    /**
     * @function searchDealerByName() = Acessa a DAO para chamar a função searchDealerByName() e retornas o Id e Name da
     * Dealer para o controller.
     * @param $searchValue
     * @return bool
     */
    public function searchDealerByName($searchValue)
    {
        if ($searchValue != NULL) {
            $dealerModel = new Agente_model();
            $dealerList = $dealerModel->searchDealerByName($searchValue);

            return $dealerList;
        } else {
            return false;
        }
    }

    public function searchPointByName($searchValue)
    {
        $pointModel = new Point_model();
        $pointList = $pointModel->searchPointByName($searchValue);
        return $pointList;
    }

    public function getInfo($dealerId, $searchType, $searchValue)
    {
        $dealerModel = new Agente_model();
        $pointModel = new Point_model();

        if ($searchType == 1) {
            $info['dealers'] = $dealerModel->dealerInfoHome($dealerId);
        } else {
            $info['dealers'] = $dealerModel->dealerInfoHome($dealerId);
            $info['points'] = $pointModel->listPointsByDealer($searchValue);
        }

        return $info;
    }
}