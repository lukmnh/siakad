<?php

class G_jadwal extends CI_Model
{
    public function show()
    {
        $this->db->select('jadwal_g.*, guru.username_guru as username_guru, guru.nama');
        $this->db->join('guru', 'jadwal_g.username_guru = guru.username_guru');
        $this->db->from('jadwal_g');
        $query = $this->db->get();
        return $query->result();
    }
    public function add($data)
    {
        $this->db->insert('jadwal_g', $data);
    }
    public function detail($id_jdg)
    {
        $this->db->select('*');
        $this->db->from('jadwal_g');
        $this->db->where('id_jdg', $id_jdg);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id_jdg', $data['id_jdg']);
        $this->db->update('jadwal_g', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_jdg', $data['id_jdg']);
        $this->db->delete('jadwal_g', $data);
    }
}
