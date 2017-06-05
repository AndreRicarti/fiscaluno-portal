<?php
/*  Created By Rodrigo De Caro
 *  Date: 01/06/2016
 */

class User_model extends CI_Model {

    private $id;
    private $name;
    private $login;
    private $password;
    private $passwordSHA1;
    private $email;
    private $provider;
    private $dealer;
    private $terminalgroup;
    private $profile;
    private $status;
	private $sessionHash;

    public function __construct() {
        $this->load->model('usuario/DAO/UserDAO','userdao');        
    }
	
	public function setSessionHash($sessionHash)
    {
        $this->sessionHash = $sessionHash;
    }
    
    public function getSessionHash()
    {
        return $this->sessionHash;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $passwordSHA1
     */
    public function setPasswordSHA1($passwordSHA1)
    {
        $this->passwordSHA1 = $passwordSHA1;
    }

    /**
     * @return mixed
     */
    public function getPasswordSHA1()
    {
        return $this->passwordSHA1;
    }



    /**
     * @param mixed $dealer
     */
    public function setDealer($dealer)
    {
        $this->dealer = $dealer;
    }

    /**
     * @return mixed
     */
    public function getDealer()
    {
        return $this->dealer;
    }

        /**
     * @param mixed $dealer
     */
    public function setTerminalGroup($terminalGroup)
    {
        $this->terminalgroup = $terminalGroup;
    }

    /**
     * @return mixed
     */
    public function getTerminalGroup()
    {
        return $this->terminalgroup;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }


    public function authenticate($login, $password){

        if(!(isset($_COOKIE['osmp_sess']))){
            redirect('login');
            die();
        }

        $userdao = new UserDAO();
        $result = $userdao->authenticate($login, $password);

        if($result){
            $user = new User_model();
			$user->setId($result[0]->PersonID);
			$user->setLogin($result[0]->PersonLogin);
            $user->setEmail($result[0]->PersonEmail);
            $user->setProfile($result[0]->ProfileID);
            $user->setProvider($result[0]->DealerID);
            $user->setTerminalGroup($result[0]->PointGroupID);
			$user->setName($result[0]->PersonName);
			
			$sessionHash = $userdao->createSession($user);

            $user->setSessionHash($sessionHash);
        }

        return $user;
    }

    public function authorize($accessingURL){

        $session = $this->getSession();

        $userdao = new UserDAO();

        $profile = $session['profile'];        

        $result = $userdao->authorizeActionURL($accessingURL,$profile);

        if(array_key_exists(0,$result)){
            return true;
        }

        return false;
    }

    public function authorizeActionID($actionName){

        $session = $this->getSession();

        $userdao = new UserDAO();

        $profile = $session['profile'];

        $result = $userdao->authorizeActionID($actionName,$profile);

        if(array_key_exists(0,$result)){
            return true;
        }

        return false;
    }


    public function checkLogged(){
        $sessionHash = $_COOKIE['osmp_sess'];
        $userdao = new UserDAO();
        
        $session = $this->getSession();
        $result = $userdao->checkLogged($sessionHash);

        if( !(array_key_exists(0,$result)) || !(isset($session['id'])) ){
            redirect('login');
            die();
        }

        $sessionPersonID = $session['id'];        

        if(!($result[0]->PersonID == $sessionPersonID)){
            redirect('login');
            die();
        }
    }


    public function generatePassword($length = 8){

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );

        $this->setPassword($password);
        $this->setPasswordSHA1(sha1($this->getPassword()));

    }
    

    public function getSession(){
        $session = $this->session->userdata();
        return $session;
    }


    public function getProfileData($personID){
        $userdao = new UserDAO();
        $result = $userdao->getProfileData($personID);

        return $result;
    }

    public function editProfile($newName, $changePass, $newPassword){
        $userdao = new UserDAO();
        $session = $this->getSession();        

        if($changePass == "false")
            $result = $userdao->editProfileNoPass($session['id'], $newName);            
        else
            $result = $userdao->editProfileAndPass($session['id'], $newName, sha1($newPassword));
   
        return $result;
    }
	
	public function logout(){
        $session = $this->getSession();
		$userdao = new UserDAO();
        $result = $userdao->logout($session['id']);
        $this->session->sess_destroy();
        redirect('login');
	}
}
