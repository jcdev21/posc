<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_category extends CI_Model
{
    private $_table_category = 'category';

    public $name;

    public function rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'name harus diisi',
                )
            ]
        ];
    }

    public function getAll()
    {
        $this->db->select('id, name');
        $query = $this->db->get($this->_table_category);

        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->name = $post['name'];

        return $this->db->insert($this->_table_category, $this);
    }

    public function get($id)
    {
        $this->db->select('id, name');
        $query = $this->db->get_where($this->_table_category, ['id' => $id]);

        return $query->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->name = $post['name'];
        return $this->db->update($this->_table_category, $this, ['id' => $post['id']]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table_category, ['id' => $id]);
    }
}