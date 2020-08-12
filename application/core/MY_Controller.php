<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class MY_Controller extends CI_Controller {

    private $_token = null;
    private $_secret_key = 'POSC_KEY';
    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('model_auth');
    }

    public function authentication()
    {
        $auth = $this->model_auth;

        $this->_token = $this->input->cookie('access_token', true);

        try {
            if ($this->_token) {
                $decode_token = JWT::decode($this->_token, $this->_secret_key, array('HS256'));
                return $decode_token;
            }
    
            return false;
        } catch (\Firebase\JWT\SignatureInvalidException $e) {
            print "Error!: " . $e->getMessage();
            return false;
        }
    }

    public function authorization()
    {
        $auth = $this->model_auth;

        if ($user = $this->authentication()) {
            $level = $auth->getLevel($user->level_id);
            
            if ($user->status === 'active') {

                $session_user = array(
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'user_email' => $user->email,
                    'user_level' => $level->level,
                    'user_status' => $user->status,
                    'user_login' => TRUE,
                );

                $this->session->set_userdata($session_user);

                return true;
            }

            return false;
        }
        
        return false;
    }

    public function getToken($payload)
    {
        $token = JWT::encode($payload, $this->_secret_key);
        return $token;
    }
}