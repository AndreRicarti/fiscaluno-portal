<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function connect($login, $password){
		
        $user = new User_model();
        $result = $user->authenticate($login, $password);

        if(1 == 1){
            redirect('usuario/home');
        }
        else{
            redirect('login');
        }
	}

    public function logout(){
        redirect('login');
    }
}
