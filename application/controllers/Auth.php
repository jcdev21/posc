<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_auth');
	}

	public function index()
	{
		// form login di submit
		if ($this->input->post('submit_login')) {

			$auth = $this->model_auth;
			$validation = $this->form_validation;

			$validation->set_rules($auth->rules());
		
			if ($validation->run() === TRUE) {

				$response = $auth->login();
				
				if ($response['status'] === 'oke') {
					
					$token = $this->getToken($response['data']);
					$this->input->set_cookie('access_token', $token, (60*60*20));
					
					redirect('/dashboard');
				}

				$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6>'.$response['message'].'</h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
			}
		}
		
		$this->redirect_session();
		$this->load->view('index');
	}

	public function logout()
	{
		$session_items = ['user_id', 'user_name', 'user_email', 'user_level', 'user_status', 'user_login'];
		$this->session->unset_userdata($session_items);
		$this->input->set_cookie('access_token', '', (60*60*20));
		$this->redirect_session();
		redirect('/');
		exit;
	}

	private function redirect_session()
	{
		if (!$this->authorization()) {
			$session_items = ['user_id', 'user_name', 'user_email', 'user_level', 'user_status', 'user_login'];
			$this->session->unset_userdata($session_items);
		} else {
			if ($this->session->userdata('user_login')) {
				redirect('/dashboard');
			}
		}

		return true;
	}
}
