<?php
class Product_model extends CI_Model
{
    private $table = 'products';

    public function get()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function stock()
    {
        $this->db->select('products.id id, (products.nama)AS nama, sum(barang_masuk.jumlah)AS qty, jenis, stok_minimal');
        $this->db->from($this->table);
        $this->db->join('barang_masuk', 'products.id = barang_masuk.product_id','left');
        $this->db->group_by("product_id");
        $query = $this->db->get();

        $data = array();
        $i = 0;
        foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['nama'] = $row['nama'];
            $data[$i]['total_masuk'] = $row['qty'];
            $data[$i]['total_keluar'] = $this->count_outgoing($row['id']);
            $data[$i]['jenis'] = $row['jenis'];
            $data[$i]['stok_minimal'] = $row['stok_minimal'];
            $data[$i]['stok'] = $data[$i]['total_masuk'] - $data[$i]['total_keluar'];
            $i++;
        }
        return $data;
    }

    private function count_outgoing($product_id)
    {
        $this->db->select('product_id, sum(jumlah)AS qty');
        $this->db->from('barang_keluar');
        $this->db->where('product_id', $product_id);
        $this->db->group_by("product_id");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $qty = $row['qty'];
            }
        } else {
            $qty = 0;
        }
        return $qty;
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
