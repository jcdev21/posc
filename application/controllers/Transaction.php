<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends MY_Controller {
    
    private $m_product;
    private $m_transaction;
    private $validation;

	public function __construct()
	{
		parent::__construct();
		
		if (!$this->authorization()) {
			redirect('/');
		}
        
        $this->load->model('model_product');
        $this->m_product = $this->model_product;
        $this->load->model('model_transaction');
        $this->m_transaction = $this->model_transaction;

        $this->validation = $this->form_validation;
    }

    public function index()
    {
        if ($this->session->userdata('user_level') !== 'kasir') {
			show_404();
		}

        $data['products'] = $this->m_product->getAll();
        $this->load->view('transaction/index', $data);
    }

    public function create()
    {
        if ($this->session->userdata('user_level') !== 'kasir') {
			show_404();
		}

        $total = $_POST['total'];
        $data_transaction = json_decode($_POST['data_transaction']);

        $dataDB = [
            'code_transaction' => 'TSC-'.time(),
            'overall_price' => $total,
            'datas' => json_encode($data_transaction),
            'date' => date('Y-m-d'),
        ];

        if ($this->m_transaction->save($dataDB)) {

            foreach ($data_transaction as $key => $value) {
                $stock = $value->stock - $value->qty;
                $this->m_product->update_stock_in_transaction($value->id, $stock);
            }
    
            echo json_encode(['message' => 'oke']);
        } else {
            echo json_encode(['message' => 'error']);
        }
    }

    public function data()
    {
        $this->load->view('transaction/data');
    }

    public function get_data_transaction()
    {
        $list = $this->m_transaction->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no.'.';
            $row[] = $field->code_transaction;
            $row[] = get_date_indo($field->date);
            $row[] = '<a href="'. base_url().'transaction/detail/'.$field->id.'" class="btn btn-info btn-circle btn-sm" title="Detail"><i class="fas fa-eye"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_transaction->count_all(),
            "recordsFiltered" => $this->m_transaction->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function detail($id)
    {
        $data['transaction'] = $this->m_transaction->get($id);
        // print_r($data['transaction']); die;
        $this->load->view('transaction/detail', $data);
    }
}