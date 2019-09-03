<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $users = $this->user_model->get();
        $data['isi'] = 'users/index';
        $data['query'] = $users;
        $this->load->view('layouts/template', $data);
    }
    
    public function a2()
    {
        echo "22222";
        // $this->load->view('welcome_message');
    }
}
