<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public $m_user;
	public $validation;

	public function __construct()
	{
		parent::__construct();
		
		if (!$this->authorization()) {
			redirect('/');
		}

		if ($this->session->userdata('user_level') !== 'admin') {
			show_404();
		}
        
		$this->load->model('model_user');
		$this->m_user = $this->model_user;

		$this->validation = $this->form_validation;
	}

	public function index()
	{	
        $data['users'] = $this->m_user->getAll();
        
		$this->load->view('user/index', $data);
	}

	public function create()
	{
		if ($this->input->post('create_user')) {
			$this->validation->set_rules($this->m_user->rules());

			if ($this->validation->run() === TRUE) {
				$response = $this->m_user->register();

				if ($response['status'] === 'oke') {
					$this->m_user->save();
					redirect('/user');
				}

				$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6>'.$response['message'].'</h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
			}
		}

		$data['levels'] = $this->m_user->getLevelList();
		$this->load->view('user/create', $data);
	}

	public function edit($id)
	{
		if ($this->input->post('edit_user')) {
			$this->validation->set_rules($this->m_user->rules('edit'));

			if ($this->validation->run() === TRUE) {
				$this->m_user->update($id);
				redirect('/user');
			}
		}

		$data['user'] = $this->m_user->get($id);
		$data['levels'] = $this->m_user->getLevelList();
		$this->load->view('user/edit', $data);
	}

	public function change_password($id)
	{
		if ($this->input->post('change_password')) {
			$this->validation->set_rules($this->m_user->rules('change_password'));

			if ($this->validation->run() === TRUE) {
				$response = $this->m_user->check_change_password($id);
				
				if ($response['status'] === 'oke') {
					$this->m_user->change_password($id);
					redirect('/user');
				}
			
				$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<h6>'.$response['message'].'</h6>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			}
		}

		$this->load->view('user/change_password');
	}

	public function delete($id)
	{
		$this->m_user->delete($id);
		redirect('/user');
	}
}
