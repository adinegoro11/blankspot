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
        $data['query'] = $this->product_model->stock();
        $this->load->view('layouts/template', $data);
    }
    
    public function create()
    {
        $this->form_validation->set_rules('nama', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('stok_minimal', 'Stok Minimal', 'required|integer');
        if ($this->form_validation->run() == false) {
            $data['isi'] = 'products/v_create';
            $this->load->view('layouts/template', $data);
        } else {
            $this->product_model->insert($this->input->post());
            redirect('/product/index/', 'refresh');
        }
    }

    public function edit($id = '')
    {
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('nama', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('stok_minimal', 'Stok Minimal', 'required|integer');
        if ($this->form_validation->run() == false) {
            if (empty($id)) {
                $id = $this->input->post('id');
            }
            $data['query'] = $this->product_model->detail($id);
            $data['id'] = $id;
            $data['isi'] = 'products/v_edit';
            $this->load->view('layouts/template', $data);
        } else {
            $input = $this->input->post();
            $this->product_model->update($input, $id);
            redirect('product/index', 'refresh');
        }
    }

    public function delete($id=null)
    {
        if (isset($id)) {
            $this->product_model->delete($id);
        }
        redirect('product/index', 'refresh');
    }

    public function laporan()
    {
        $this->form_validation->set_rules('start_date', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('end_date', 'Tanggal Akhir', 'required');
        if ($this->form_validation->run() == false) {
            $data['isi'] = 'products/v_laporan';
            $this->load->view('layouts/template', $data);
        } else {

            $parameter = array(
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
            );

            $data['query_masuk'] = $this->incoming_purchase_model->laporan($parameter);
            $data['query_keluar'] = $this->outgoing_purchase_model->laporan($parameter);
            $data['isi'] = 'products/v_laporan';
            $data['hasil'] = 1;
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');
            $this->load->view('layouts/template', $data);
        }
    }
}
