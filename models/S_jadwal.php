<?php

class S_jadwal extends CI_Model
{
    public function show()
    {
        $this->db->select('jadwal_s.*, siswa.username_users as username_jadwal, siswa.nama');
        $this->db->join('siswa', 'jadwal_s.username_jadwal = siswa.username_users');
        $this->db->from('jadwal_s');
        $query = $this->db->get();
        return $query->result();
    }
    public function add($data)
    {
        $this->db->insert('jadwal_s', $data);
    }
    public function detail($id_jds)
    {
        $this->db->select('*');
        $this->db->from('jadwal_s');
        $this->db->where('id_jds', $id_jds);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id_jds', $data['id_jds']);
        $this->db->update('jadwal_s', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_jds', $data['id_jds']);
        $this->db->delete('jadwal_s', $data);
    }
}
