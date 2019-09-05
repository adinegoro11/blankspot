<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('level'))) {
            redirect('/login/index/', 'refresh');
        }
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['isi'] = 'users/index';
        $data['query'] = $this->user_model->get();
        $this->load->view('layouts/template', $data);
    }
    
    public function a2()
    {
        echo "22222";
        // $this->load->view('welcome_message');
    }
}
