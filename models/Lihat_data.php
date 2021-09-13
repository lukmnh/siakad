<?php

class Lihat_data extends CI_Model
{
    public function lihat($id_siswa)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get()->row();
    }
    public function update($data)
    {
        $this->db->where('id_siswa', $data['id_siswa']);
        $this->db->update('siswa', $data);
    }
}
