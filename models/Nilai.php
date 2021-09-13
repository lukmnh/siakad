<?php

class Nilai extends CI_Model
{
    public function list()
    {
        // Select * from siswa,users where siswa.role_id = users.role_id
        // $this->db->select('(SELECT * FROM nilai WHERE nilai.id_users=users.id');

        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->order_by('id_nilai');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('nilai', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_nilai', $data['id_nilai']);
        $this->db->update('nilai', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_nilai', $data['id_nilai']);
        $this->db->delete('nilai', $data);
    }
}
