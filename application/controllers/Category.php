<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

    private $m_category;
    private $validation;

	public function __construct()
	{
		parent::__construct();
		
		if (!$this->authorization()) {
			redirect('/');
		}

		if ($this->session->userdata('user_level') !== 'admin') {
			show_404();
		}
        
        $this->load->model('model_category');
        $this->m_category = $this->model_category;

        $this->validation = $this->form_validation;
	}

	public function index()
	{
        $data['categories'] = $this->m_category->getAll();
        
		$this->load->view('category/index', $data);
    }
    
    public function create()
    {
        if ($this->input->post('create_category')) {
            $this->validation->set_rules($this->m_category->rules());

            if ($this->validation->run() === TRUE) {
                $this->m_category->save();
                redirect('/category');
            }

            die('errors');
        }

        die('Not Submit');
    }

    public function get()
    {
        $data_post = json_decode(file_get_contents('php://input'), true);

        $id = $data_post['id'];

        if ($id !== null) {
            $data = $this->m_category->get($id);
            echo json_encode($data);
            return;
        }

        echo json_encode(['message' => "id not found"]);
    }

    public function edit()
    {
        if ($this->input->post('edit_category')) {
            $this->validation->set_rules($this->m_category->rules());

            if ($this->validation->run() === TRUE) {
                $this->m_category->update();
                redirect('/category');
            }

            die('errors');
        }

        die('Not Submit');
    }

    public function delete($id)
    {
        $this->m_category->delete($id);
        redirect('/category');
    }
}
