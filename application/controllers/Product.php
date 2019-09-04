<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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
        $data['isi'] = 'products/v_index';
        $data['query'] = $this->product_model->get();
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
            redirect('/supplier/index/');
        }
    }
}
