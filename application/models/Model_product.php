<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_product extends CI_Model
{
    private $_table_product = 'product';
    private $_table_category = 'category';

    public $name;
    public $id_category;
    public $price;
    public $stock;

    public function rules($action = 'create')
    {
        
        $rules = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'name harus diisi',
                )
            ],
            [
                'field' => 'category',
                'label' => 'Category',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'category harus diisi',
                )
            ],
            [
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'price harus diisi',
                )
            ],
            [
                'field' => 'stock',
                'label' => 'Stock',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'stock harus diisi',
                )
            ],
        ];

        if ($action === 'edit') {
            $rules = array_filter($rules, function ($var) {
                return ($var['field'] !== 'stock');
            });
        }

        if ($action === 'stock') {
            $rules = array_filter($rules, function ($var) {
                return ($var['field'] === 'stock');
            });
        }

        return $rules;
    }

    public function getAll()
    {
        $this->db->select("$this->_table_product.id, $this->_table_product.name, $this->_table_product.price, $this->_table_product.stock, $this->_table_category.name AS category");
        $this->db->from($this->_table_product);
        $this->db->join($this->_table_category, "$this->_table_category.id = $this->_table_product.id_category", 'inner');
        $query = $this->db->get();

        return $query->result();
    }

    public function get($id)
    {
        $this->db->select("$this->_table_product.id, $this->_table_product.name, $this->_table_product.price, $this->_table_product.stock, $this->_table_product.id_category, $this->_table_category.name AS category");
        $this->db->from($this->_table_product);
        $this->db->join($this->_table_category, "$this->_table_category.id = $this->_table_product.id_category", 'inner');
        $query = $this->db->where(["$this->_table_product.id" => $id]);
        $query = $this->db->get();

        return $query->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->name = $post['name'];
        $this->id_category = $post['category'];
        $this->price = $post['price'];
        $this->stock = $post['stock'];

        return $this->db->insert($this->_table_product, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->name = $post['name'];
        $this->id_category = $post['category'];
        $this->price = $post['price'];

        $data = [
            'name' => $this->name,
            'id_category' => $this->id_category,
            'price' => $this->price,
        ];

        return $this->db->update($this->_table_product, $data, ['id' => $id]);
    }

    public function update_stock()
    {
        $post = $this->input->post();
        $this->stock = (int) $post['stock_now'] + (int) $post['stock'];

        $data = [
            'stock' => $this->stock,
        ];

        return $this->db->update($this->_table_product, $data, ['id' => $post['id']]);
    }

    public function update_stock_in_transaction($id, $stock)
    {
        $data = [
            'stock' => $stock,
        ];

        return $this->db->update($this->_table_product, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table_product, ['id' => $id]);
    }
}