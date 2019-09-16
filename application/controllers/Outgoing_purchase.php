<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outgoing_purchase extends CI_Controller
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
        $data['isi'] = 'outgoing_purchases/v_index';
        $data['query'] = $this->outgoing_purchase_model->get();
        $this->load->view('layouts/template', $data);
    }
    
    public function create()
    {
        $this->form_validation->set_rules('product_id', 'Barang', 'required');
        $this->form_validation->set_rules('user_id', 'Pengambil', 'required');
        $this->form_validation->set_rules('jumlah', 'Qty', 'required|integer');
        $this->form_validation->set_rules('tanggal', 'Tanggal Keluar', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        if ($this->form_validation->run() == false) {
            $data['dropdown_product'] = $this->product_model->get();
            $data['dropdown_user'] = $this->user_model->get();
            $data['isi'] = 'outgoing_purchases/v_create';
            $this->load->view('layouts/template', $data);
        } else {
            $data = $this->input->post();
            $this->outgoing_purchase_model->insert($data);
            redirect('/outgoing_purchase/index/', 'refresh');
        }
    }

    public function edit($id = '')
    {
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('product_id', 'Barang', 'required');
        $this->form_validation->set_rules('user_id', 'Pengambil', 'required');
        $this->form_validation->set_rules('jumlah', 'Qty', 'required|integer');
        $this->form_validation->set_rules('tanggal', 'Tanggal Keluar', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        if ($this->form_validation->run() == false) {
            if (empty($id)) {
                $id = $this->input->post('id');
            }
            $data['query'] = $this->outgoing_purchase_model->detail($id);
            $data['dropdown_product'] = $this->product_model->get();
            $data['dropdown_user'] = $this->user_model->get();
            $data['id'] = $id;
            $data['isi'] = 'outgoing_purchases/v_edit';
            $this->load->view('layouts/template', $data);
        } else {
            $input = $this->input->post();
            $this->outgoing_purchase_model->update($input, $id);
            redirect('outgoing_purchase/index', 'refresh');
        }
    }

    public function delete($id=null)
    {
        if (isset($id)) {
            $this->outgoing_purchase_model->delete($id);
        }
        redirect('outgoing_purchase/index', 'refresh');
    }

    public function export($awal, $akhir)
    {
        $parameter = array('start_date' => $awal, 'end_date' => $akhir);
        $data['query'] = $this->outgoing_purchase_model->laporan($parameter);
        $html = $this->load->view('outgoing_purchases/v_export', $data, true);
        $this->load->library('pdf');
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream('tess', array("Attachment" => 0));
    }
}
