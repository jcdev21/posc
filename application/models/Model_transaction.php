<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaction extends CI_Model
{
    private $_table_transaction = 'transaction';

    var $column_order = array(null, 'id', 'code_transaction', 'overall_price', 'date');
    var $column_search = array('id', 'code_transaction', 'overall_price', 'date');
    var $order = array('id' => 'desc');

    private function _get_datatables_query()
    {         
		$this->db->from($this->_table_transaction);
 
        $i = 0;
     
        foreach ($this->column_search as $item)
        {
            if($_POST['search']['value'])
            {
                 
                if($i===0)
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->_table_transaction);
        return $this->db->count_all_results();
    }

    public function save($data)
    {
        return $this->db->insert($this->_table_transaction, $data);
    }

    public function get($id)
    {
        $this->db->select('id, code_transaction, datas, overall_price, date');
        $query = $this->db->get_where($this->_table_transaction, ['id' => $id]);

        return $query->row();
    }

    public function getByDate()
    {
        $post = $this->input->post();
        $startDate = $post['startDate'];
        $endDate = $post['endDate'];

        $this->db->select('id, code_transaction, datas, overall_price, date');
        $query = $this->db->get_where($this->_table_transaction, ['date >=' => $startDate, 'date <=' => $endDate]);

        return $query->result();
    }
}