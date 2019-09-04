<?php
class Outgoing_purchase_model extends CI_Model
{
    private $table = 'barang_keluar';

    public function get()
    {
        $this->db->select('(barang_keluar.id)AS id, (c.nama) AS customer, (p.nama) AS barang, jumlah, tanggal, judul');
        $this->db->from($this->table);
        $this->db->join('customers c', 'c.id = barang_keluar.customer_id');
        $this->db->join('products p', 'p.id = barang_keluar.product_id');
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
}
