<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$usuarioObj = Modules::load('usuario/auth');
		$usuarioObj->checkLogged();

        $this->load->model('usuario/User_model');	
	}

	public function index(){
        $this->template->load('template', 'perfil/perfil.php');
		$this->load->view('perfil/perfilmodals.php');
    }

	public function getSessionInfo(){
		$user = new User_model();
        $sessionInfo = $user->getSession();		

		echo json_encode($sessionInfo);
	}

	public function getProfileInfo(){
		$user = new User_model();
		$sessionInfo = $user->getSession();
        $profileInfo = $user->getProfileData($sessionInfo["id"]);		

		echo json_encode($profileInfo);
	}

	public function editProfile(){
		$newName = $this->input->post('newName');
		$changePass = $this->input->post('changePass');
		$newPassword = $this->input->post('newPassword');

		$user = new User_model();
		$result = $user->editProfile($newName, $changePass, $newPassword);

		echo json_encode($result);
	}

	public function edit(){}
}
