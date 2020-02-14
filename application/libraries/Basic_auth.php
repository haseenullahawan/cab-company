<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Basic_auth
{

	public function __construct(){

		$this->load->library('email');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('user_model');
	}

	public function __get($var){

		return get_instance()->$var;
	}


	public function login($username, $password){
		$user = $this->user_model->login($username,$password);

		if ($user != false && $user->active == 1) {
			$this->session->set_userdata("user", $user);
			return $user;
		}

		return false;
	}

	public function is_login(){
		return $this->session->userdata("user") !== false;
	}

	public function user(){
		return $this->session->userdata("user");
	}

	public function logout(){
		if($this->is_login()) {
			return $this->session->unset_userdata("user");
		}
		return true;
	}

	public function forget($username){

	}

 

	public function client_login($username, $password){
		$user = $this->user_model->client_login($username,$password);

		if ($user != false && $user->active == 1) {
			$this->session->set_userdata("clients", $user->id);
			return $user;
		}

		return false;
	}


	public function client_signup($username, $password, $fname, $lname){
		$user = $this->user_model->client_login($username,$password);

		if ($user != false && $user->active == 1) {
			$this->session->set_userdata("clients", $user->id);
			return $user;
		}

		return false;
	}


	public function is_clientlogin(){
		return $this->session->userdata("user") !== false;
	}

	public function client(){
		return $this->session->userdata("user");
	}

	public function client_logout(){
		if($this->is_login()) {
			return $this->session->unset_userdata("clients");
		}
		return true;
	}

}