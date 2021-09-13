<?php

class Peng_user extends CI_Model
{
    public function list()
    {
        $this->db->select('users.*, user_role.id as role_id, user_role.role');
        $this->db->join('user_role', 'users.role_id = user_role.id');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

    public function add($data)
    {
        $this->db->insert('users', $data);
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('users', $data);
    }
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('users', $data);
    }
}
