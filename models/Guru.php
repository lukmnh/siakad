<?php

class Guru extends CI_Model
{
    public function d_guru()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->order_by('id_guru');
        return $this->db->get()->result();
    }
    public function add($data)
    {
        $this->db->insert('guru', $data);
    }
    public function detail($id_guru)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->where('id_guru', $id_guru);
        return $this->db->get()->row();
    }
    public function edit($data)
    {

        $this->db->where('id_guru', $data['id_guru']);
        $this->db->update('guru', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_guru', $data['id_guru']);
        $this->db->delete('guru', $data);
    }
}
