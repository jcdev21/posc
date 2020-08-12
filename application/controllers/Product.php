<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

    private $m_product;
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
        
        $this->load->model('model_product');
        $this->load->model('model_category');
        $this->m_product = $this->model_product;
        $this->m_category = $this->model_category;

        $this->validation = $this->form_validation;
    }
    
    public function index()
    {
        $data['products'] = $this->m_product->getAll();
        $this->load->view('product/index', $data);
    }

    public function create()
    {
        if ($this->input->post('create_product')) {
            $this->validation->set_rules($this->m_product->rules());

            if ($this->validation->run() === TRUE) {
                $this->m_product->save();
                redirect('/product');
            }
        }

        $data['categories'] = $this->m_category->getAll();
        $this->load->view('product/create', $data);
    }

    public function edit($id)
    {
        if ($this->input->post('edit_product')) {
            $this->validation->set_rules($this->m_product->rules('edit'));

            if ($this->validation->run() === TRUE) {
                $this->m_product->update($id);
                redirect('/product');
            }
        }

        $data['product'] = $this->m_product->get($id);
        $data['categories'] = $this->m_category->getAll();
        $this->load->view('product/edit', $data);
    }

    public function edit_stock()
    {
        if ($this->input->post('edit_stock')) {
            $this->validation->set_rules($this->m_product->rules('stock'));

            if ($this->validation->run() === TRUE) {
                $this->m_product->update_stock();
                redirect('/product');
            }

            die('errors');
        }

        die('Not Submit');
    }

    public function delete($id)
    {
        $this->m_product->delete($id);
        redirect('/product');
    }
}