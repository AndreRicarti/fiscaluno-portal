<?php
/*  Created By Rodrigo De Caro
 *  Date: 01/06/2016
 */

class UserDAO extends CI_Model {


    public function authenticate($login, $password){
        $query = "
            SELECT
                 p.PersonID
                ,p.PersonLogin
                ,p.PersonName
                ,p.PersonEmail
                ,p.GroupID   
				,a.ProfileID
				,a.DealerID
                ,apg.PointGroupID
            FROM Persons p
			INNER JOIN Accounts a ON a.PersonID = p.PersonID
            LEFT JOIN Accounts_PointGroup apg ON a.AccountID = apg.AccountID
            WHERE p.PersonLogin = ?
            AND p.PersonPasswordSHA1 = ?
            AND p.Enabled = 1
			AND a.ApplicationID = 7
        ";

        $sql = $this->db->query($query,
            array($login, $password)
        )->result();

        return $sql;
    }
    

    public function checkLogged($sessionHash){
        $query = "
            SELECT
                PersonID
            FROM SessionPerson
            WHERE SessionHash = ?
        ";

        $sql = $this->db->query($query,
            array($sessionHash)
        )->result();

        return $sql;
    }


    public function logout($personId){
        $query = "
            DELETE FROM SessionPerson
            WHERE PersonID = ?
        ";

        $sql = $this->db->query($query,array($personId));

        return $sql;
    }

    	
	public function createSession($user){

        $actualDate = new DateTime();
        $sessionHash = $_COOKIE['osmp_sess'];

        $querySelect = "
            SELECT
                PersonID
            FROM SessionPerson
            WHERE PersonID = ?
        ";

        $sqlSelect = $this->db->query($querySelect,
            array($user->getId())
        )->result();

        if($sqlSelect){

            $query = "
                UPDATE SessionPerson
                SET SessionHash = ?
                WHERE PersonID = ?
            ";

            $sql = $this->db->query($query,
                array($sessionHash, $user->getId())
            );

        } else{

            $query = "
                INSERT INTO SessionPerson (
                     PersonID
                    ,PersonLogin
                    ,SessionHash
                ) 
                VALUES(
                     ?
                    ,?
                    ,?
                )
            ";

            $sql = $this->db->query($query,
                array($user->getId(), $user->getLogin(), $sessionHash)
            );
        }

        return $sessionHash;
    }

    public function authorizeActionID($actionName,$profileID){

        $query = "
            SELECT
                1 AS Authorized
            FROM Actions ac
            INNER JOIN Profile_Actions pa
                ON pa.ActionID = ac.ActionID
            WHERE ac.ApplicationID = 7
            AND pa.ProfileID = ?
            AND ac.ActionName = ?
        ";

        $sql = $this->db->query($query,
            array($profileID,$actionName)
        )->result();

        return $sql;
    }

    public function authorizeActionURL($actionURL,$profileID){
        
        $query = "
            SELECT
                1 AS Authorized
            FROM Actions ac
            INNER JOIN Profile_Actions pa
                ON pa.ActionID = ac.ActionID
            WHERE ac.ApplicationID = 7
            AND pa.ProfileID = ?
            AND ac.ActionURL = ?
        ";

        $sql = $this->db->query($query,
            array($profileID,$actionURL)
        )->result();

        return $sql;
    }


    public function getProfileData($personID){
        $query = "
            SELECT
                 PersonName
                ,PersonEmail
                ,PersonLogin
            FROM Persons
            WHERE PersonID = ?            
        ";

        $sql = $this->db->query($query,
            array($personID)
        )->result();

        return $sql;
    }

    
    public function editProfileAndPass($personID, $newName, $newPassword){
        $query = "
            UPDATE Persons
            SET PersonName = ?, PersonPasswordSHA1 = ?
            WHERE PersonID = ?           
        ";

        $sql = $this->db->query($query,
            array($newName, $newPassword, $personID)
        );

        if($sql){
            $result = array("status" => 1, "message" => "Perfil alterado com sucesso. Favor relogar");
        } else {
            $result = array("status" => 0, "message" => "Falha ao alterar perfil.");            
        }

        return $result;
    }


    public function editProfileNoPass($personID, $newName){
        $query = "
            UPDATE Persons
            SET PersonName = ?
            WHERE PersonID = ?           
        ";

        $sql = $this->db->query($query,
            array($newName, $personID)
        );

        if($sql){
            $result = array("status" => 1, "message" => "Perfil alterado com sucesso. Favor relogar");
        } else {
            $result = array("status" => 0, "message" => "Falha ao alterar perfil.");            
        }

        return $result;
    }

    public function getUsersQtdApplications(){
        $obj = new Usuario_model();
        echo json_encode($obj->getUsersQtdApplications());
    }
}
