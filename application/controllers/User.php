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

    public function home()
    {
        $data['query_judul'] = $this->user_model->get_template(array('nama'=> 'judul'));
        $data['query_kalimat'] = $this->user_model->get_template(array('nama'=> 'kalimat_pengantar'));
        $data['isi'] = 'layouts/v_beranda';
        $this->load->view('layouts/template', $data);
    }

    public function index()
    {
        $data['isi'] = 'users/index';
        $data['query'] = $this->user_model->get();
        $this->load->view('layouts/template', $data);
    }
    
    public function create()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'required|min_length[5]');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        if ($this->form_validation->run() == false) {
            $data['isi'] = 'users/v_create';
            $this->load->view('layouts/template', $data);
        } else {
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'nik' => $this->input->post('nik'),
                'level' => $this->input->post('level')
            );

            $this->user_model->insert($data);
            redirect('/user/index/', 'refresh');
        }
    }

    public function edit($id = '')
    {
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'required|min_length[5]');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        if ($this->form_validation->run() == false) {
            if (empty($id)) {
                $id = $this->input->post('id');
            }
            $data['query'] = $this->user_model->detail($id);
            $data['id'] = $id;
            $data['isi'] = 'users/v_edit';
            $this->load->view('layouts/template', $data);
        } else {
            $input = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'nik' => $this->input->post('nik'),
                'level' => $this->input->post('level')
            );
            $this->user_model->update($input, $id);
            redirect('user/index', 'refresh');
        }
    }
}
