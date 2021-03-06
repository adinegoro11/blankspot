<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
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
        $data['isi'] = 'suppliers/v_index';
        $data['query'] = $this->supplier_model->get();
        $this->load->view('layouts/template', $data);
    }
    
    public function create()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() == false) {
            $data['isi'] = 'suppliers/v_create';
            $this->load->view('layouts/template', $data);
        } else {
            $insert = array(
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
            );
            $this->supplier_model->insert($insert);
            redirect('/supplier/index/', 'refresh');
        }
    }

    public function edit($id = '')
    {
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('nama', 'Nama supplier', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() == false) {
            if (empty($id)) {
                $id = $this->input->post('id');
            }
            $data['query'] = $this->supplier_model->detail($id);
            $data['id'] = $id;
            $data['isi'] = 'suppliers/v_edit';
            $this->load->view('layouts/template', $data);
        } else {
            $input = $this->input->post();
            $this->supplier_model->update($input, $id);
            redirect('supplier/index', 'refresh');
        }
    }
}
