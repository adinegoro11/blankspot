<?php
class Product_model extends CI_Model
{
    private $table = 'products';

    public function get()
    {
        $query = $this->db->get($this->table);
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
