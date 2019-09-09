<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
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
        $data['isi'] = 'orders/v_index';
        $data['query'] = $this->order_model->get();
        $this->load->view('layouts/template', $data);
    }
    
    public function create()
    {
        $this->form_validation->set_rules('product_id', 'Barang', 'required');
        $this->form_validation->set_rules('user_id', 'Diajukan oleh', 'required');
        $this->form_validation->set_rules('jumlah', 'Qty', 'required|integer');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        if ($this->form_validation->run() == false) {
            $data['dropdown_product'] = $this->product_model->get();
            $data['dropdown_user'] = $this->user_model->get();
            $data['isi'] = 'orders/v_create';
            $this->load->view('layouts/template', $data);
        } else {
            $this->order_model->insert($this->input->post());
            redirect('/order/index/', 'refresh');
        }
    }

    public function edit($id = '')
    {
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('product_id', 'Barang', 'required');
        $this->form_validation->set_rules('user_id', 'Diajukan oleh', 'required');
        $this->form_validation->set_rules('jumlah', 'Qty', 'required|integer');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        if ($this->form_validation->run() == false) {
            if (empty($id)) {
                $id = $this->input->post('id');
            }
            $data['dropdown_product'] = $this->product_model->get();
            $data['dropdown_user'] = $this->user_model->get();
            $data['query'] = $this->order_model->detail($id);
            $data['id'] = $id;
            $data['isi'] = 'orders/v_edit';
            $this->load->view('layouts/template', $data);
        } else {
            $input = $this->input->post();
            $this->order_model->update($input, $id);
            redirect('order/index', 'refresh');
        }
    }

    public function delete($id=null)
    {
        if (isset($id)) {
            $this->order_model->delete($id);
        }
        redirect('order/index', 'refresh');
    }
}
