<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
	
	public function index()
	{
		$this->load->view('view_login.php');
	}

	public function connect(){

        redirect('usuario/home');
	}
}
