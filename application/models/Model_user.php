<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model
{
    private $table_user = 'users';
    private $table_user_level = 'user_level';

    public $name;
    public $email;
    public $password;
    public $level_id;
    public $contact;
    public $status;

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
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'contact harus diisi',
                )
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'email harus diisi',
                )
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'password harus diisi',
                )
            ],
            [
                'field' => 'level',
                'label' => 'Level',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'level harus diisi',
                )
            ],
        ];

        if ($action === 'edit') {
            $rules = array_filter($rules, function ($var) {
                return ($var['field'] !== 'email') && ($var['field'] !== 'password');
            });
        }

        if ($action === 'change_password') {
            $rules = [
                [
                    'field' => 'oldPassword',
                    'label' => 'Old Password',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'old password harus diisi',
                    )
                ],
                [
                    'field' => 'newPassword',
                    'label' => 'New Password',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'new password harus diisi',
                    )
                ],
            ];
        }

        return $rules;
    }

    public function getAll()
    {
        $this->db->select("$this->table_user.id, $this->table_user.name, $this->table_user.contact, $this->table_user.email, $this->table_user.status, $this->table_user.last_login, $this->table_user_level.level");
        $this->db->from($this->table_user);
        $this->db->join($this->table_user_level, "$this->table_user_level.id = $this->table_user.level_id", 'inner');
        $query = $this->db->get();

        return $query->result();
    }

    public function get($id)
    {
        $this->db->select("$this->table_user.id, $this->table_user.level_id, $this->table_user.name, $this->table_user.contact, $this->table_user.status, $this->table_user_level.level");
        $this->db->from($this->table_user);
        $this->db->join($this->table_user_level, "$this->table_user_level.id = $this->table_user.level_id", 'inner');
        $this->db->where(["$this->table_user.id" => $id]);
        $query = $this->db->get();

        return $query->row();
    }

    public function login($username, $password)
    {
        $this->db->where('user_username', $username);
        $this->db->from($this->table);
        $data_user = $this->db->get()->row();
        
        if (password_verify($password, $data_user->user_password)) {
            return true;
        }else{
            die('error bro');
        }
    }

    public function register()
    {
        $post = $this->input->post();
        $this->email = $post['email'];

        $data_user = $this->db->get_where($this->table_user, ['email' => $this->email])->row();

        // Email telah terdaftar
        if (!empty($data_user)) {
            return [
                'status' => 'error',
                'message' => 'email telah terdaftar',
            ];
        }

        return [
            'status' => 'oke',
            'message' => '',
        ];
    }

    public function save()
    {
        $post = $this->input->post();
        $this->name = $post['name'];
        $this->email = $post['email'];
        $this->password = password_hash($post['password'], PASSWORD_DEFAULT);
        $this->level_id = $post['level'];
        $this->contact = $post['contact'];
        $this->status = (!$post['status']) ? 'disable' : $post['status'];

        return $this->db->insert($this->table_user, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->name = $post['name'];
        $this->level_id = $post['level'];
        $this->contact = $post['contact'];
        $this->status = (!$post['status']) ? 'disable' : $post['status'];

        $data = [
            'name' => $this->name,
            'level_id' => $this->level_id,
            'contact' => $this->contact,
            'status' => $this->status,
        ];

        return $this->db->update($this->table_user, $data, ['id' => $id]);
    }

    public function check_change_password($id)
    {
        $post = $this->input->post();
        $this->password = $post['oldPassword'];

        $data_user = $this->db->get_where($this->table_user, ['id' => $id])->row();

        // Password salah
        if (!password_verify($this->password, $data_user->password)) {   
            return [
                'status' => 'error',
                'message' => 'old password salah',
            ];
        }

        return [
            'status' => 'oke',
            'message' => '',
        ];
    }

    public function change_password($id)
    {
        $post = $this->input->post();
        $this->password = $post['newPassword'];
        
        $data = [
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
        ];

        return $this->db->update($this->table_user, $data, ['id' => $id]);
    }

    public function check_email($email)
    {
        $this->db->where('user_email', $email);
        $this->db->from($this->table_user);
        $result = $this->db->get();

        if ($result) {
            return $result->row();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        return $this->db->delete($this->table_user, ['id' => $id]);
    }

    public function last_login($data, $email)
    {
        $this->db->where('user_email', $email);
        $query = $this->db->update($this->table_user, $data);
        return $query;
    }

    public function getLevelList()
    {
        $this->db->select('id, level');
        $query = $this->db->get($this->table_user_level);

        return $query->result();
    }
}
