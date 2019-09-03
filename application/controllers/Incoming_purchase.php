<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Incoming_purchase extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['isi'] = 'incoming_purchases/v_index';
        $data['query'] = $this->incoming_purchase_model->get();
        $this->load->view('layouts/template', $data);
    }
    
    public function create()
    {
        $this->form_validation->set_rules('product_id', 'Barang', 'required');
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required');
        $this->form_validation->set_rules('jumlah', 'Qty', 'required|integer');
        $this->form_validation->set_rules('tanggal', 'Tanggal Masuk', 'required');
        if ($this->form_validation->run() == false) {
            $data['products'] = $this->product_model->get();
            $data['suppliers'] = $this->supplier_model->get();
            $data['isi'] = 'incoming_purchases/v_create';
            $this->load->view('layouts/template', $data);
        } else {
            $data = $this->input->post();
            $this->incoming_purchase_model->insert($data);
            redirect('/incoming_purchase/index/');
        }
    }

    public function edit($id = '')
    {
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('product_id', 'Barang', 'required');
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required');
        $this->form_validation->set_rules('jumlah', 'Qty', 'required|integer');
        $this->form_validation->set_rules('tanggal', 'Tanggal Masuk', 'required');
        if ($this->form_validation->run() == false) {
            if (empty($id)) {
                $id = $this->input->post('id');
            }
            $data['query'] = $this->incoming_purchase_model->detail($id);
            $data['dropdown_product'] = $this->product_model->get();
            $data['dropdown_supplier'] = $this->supplier_model->get();
            $data['id'] = $id;
            $data['isi'] = 'incoming_purchases/v_edit';
            $this->load->view('layouts/template', $data);
        } else {
            $input = $this->input->post();
            $this->incoming_purchase_model->update($input, $id);
            redirect('incoming_purchase/index', 'refresh');
        }
    }

    public function delete($id=null)
    {
        if (empty($id)) {
            redirect('incoming_purchase/index', 'refresh');
        } else {
            $this->incoming_purchase_model->delete($id);
            redirect('incoming_purchase/index', 'refresh');
        }
    }
}
