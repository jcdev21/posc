<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_auth extends CI_Model
{
    private $_table_user = 'users';
    private $_table_token = 'active_tokens';
    private $_table_level = 'user_level';

    public $email;
    public $password;

    public function rules()
    {
        return [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => array(
                    'required' => 'email harus diisi',
                    'valid_email' => 'email tidak valid',
                )
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'password harus diisi'
                )
            ],
        ];
    }

    public function getAll()
    {
        $this->db->select('id, name, contact, email, last_login');
        $query = $this->db->get($this->_table_user);

        return $query->result();
    }

    public function getLevel($id = null)
    {
        $this->db->select('level');
        return $this->db->get_where($this->_table_level, ['id' => $id])->row();
    }

    public function login()
    {
        $post = $this->input->post();
        $this->email = $post['email'];
        $this->password = $post['password'];

        $data_user = $this->db->get_where($this->_table_user, ['email' => $this->email])->row();

        // Email tidak terdaftar
        if (empty($data_user)) {
            return [
                'status' => 'error',
                'message' => 'email tidak terdaftar'
            ];
        }

        // Password salah
        if (!password_verify($this->password, $data_user->password)) {   
            return [
                'status' => 'error',
                'message' => 'password salah'
            ];
        }

        $payload = [
            'id' => $data_user->id,
            'email' => $data_user->email,
            'password' => $data_user->password,
            'name' => $data_user->name,
            'contact' => $data_user->contact,
            'level_id' => $data_user->level_id,
            'status' => $data_user->status,
        ];

        return [
            'status' => 'oke',
            'data' => $payload
        ];
    }

    public function last_login($data, $email)
    {
        $this->db->where('user_email', $email);
        $query = $this->db->update($this->_table_user, $data);
        return $query;
    }
}
