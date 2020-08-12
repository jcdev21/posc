<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

    public $m_product;
    public $m_transaction;
    
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
        $this->m_product = $this->model_product;
        $this->load->model('model_transaction');
        $this->m_transaction = $this->model_transaction;
    }
    
    public function index()
    {
        redirect('report/transaction');
    }

    public function transaction()
    {
        if ($this->input->post('create_report')) {
            $data['transactions'] = $this->m_transaction->getByDate();

            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "report_transaction.pdf";
            $this->pdf->load_view('report/transaction', $data);
            die;
        }

        $this->load->view('report/choise_transaction');
    }

    public function product()
    {
        $data['products'] = $this->m_product->getAll();

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "report_product.pdf";
        $this->pdf->load_view('report/product', $data);
    }

}