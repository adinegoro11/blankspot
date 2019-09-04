<?php
class User_model extends CI_Model
{
    private $table = 'users';

    public function get()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function find($data)
    {
        $this->db->where($data);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
}
