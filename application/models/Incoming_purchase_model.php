<?php
class Incoming_purchase_model extends CI_Model
{
    private $table = 'barang_masuk';

    public function get()
    {
        $this->db->select('(barang_masuk.id)AS id, (s.nama) AS supplier, (p.nama) AS barang, jumlah, tanggal');
        $this->db->from($this->table);
        $this->db->join('suppliers s', 's.id = barang_masuk.supplier_id');
        $this->db->join('products p', 'p.id = barang_masuk.product_id');
        $this->db->order_by('barang_masuk.tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update($data, $id)
    {
        $this->db->update($this->table, $data, array('id' => $id));
    }

    public function delete($id = null)
    {
        $this->db->delete($this->table, array('id' => $id));
    }

    public function detail($id = null)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));
        return $query->row();
    }

    public function laporan($parameter)
    {
        $this->db->select('(barang_masuk.id)AS id, (s.nama) AS supplier, (p.nama) AS barang, jumlah, tanggal');
        $this->db->from($this->table);
        $this->db->join('suppliers s', 's.id = barang_masuk.supplier_id');
        $this->db->join('products p', 'p.id = barang_masuk.product_id');
        $this->db->where('tanggal >=', $parameter['start_date']);
        $this->db->where('tanggal <=',$parameter['end_date']);
        $this->db->order_by('barang_masuk.tanggal', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}
