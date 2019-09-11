<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/v_login');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
            $find = $this->user_model->find($data);
            $this->check($find);
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('/login/index/', 'refresh');
    }

    private function check($row)
    {
        if (empty($row)) {
            redirect('/login/index/', 'refresh');
        } else {
            $newdata = array(
                'level'  => $row->level,
                'logged_in' => true);
        
            $this->session->set_userdata($newdata);
            redirect('/user/home/', 'refresh');
        }
    }
}
