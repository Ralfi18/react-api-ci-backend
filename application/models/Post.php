<?php 

class Post extends CI_Model {

    public function get_all()
    {
        return $this->db->get('posts')->result();
    }
    public function add($data)
    {
        $this->db->insert('posts', $data);
        return $this->db->affected_rows() > 0;
    }
}