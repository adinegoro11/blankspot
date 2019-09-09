<?php
class Order_model extends CI_Model
{
    private $table = 'orders';

    public function get()
    {
        $this->db->select('(orders.id)AS id, (u.nama_lengkap) AS nama, (p.nama) AS barang, (orders.jumlah) AS jumlah,(orders.tanggal) AS tanggal');
        $this->db->from($this->table);
        $this->db->join('users u', 'u.id = orders.user_id');
        $this->db->join('products p', 'p.id = orders.product_id');
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

    public function detail($id = null)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));
        return $query->row();
    }

    public function delete($id = null)
    {
        $this->db->delete($this->table, array('id' => $id));
    }
}
