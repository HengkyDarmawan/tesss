<?php

class Moderator_m extends CI_Model
{
    public function Tambah()
    {
        $data = [
            "nama_moderator" => $this->input->post('nama_moderator', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "email" => $this->input->post('email', true),
            "hp" => $this->input->post('hp', true),
            "alamat" => $this->input->post('alamat', true),
        ];
        $this->db->insert('moderator', $data);
    }
    public function hapus($id)
    {
        $this->db->delete('moderator', ['id_moderator' => $id]);
    }
    public function getModeratorId($id)
    {
        return $this->db->get_where('moderator', ['id_moderator' => $id])->row_array();
    }


    public function update()
    {
        $data = [
            "nama_moderator" => $this->input->post('nama_moderator', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "email" => $this->input->post('email', true),
            "hp" => $this->input->post('hp', true),
            "alamat" => $this->input->post('alamat', true),
        ];
        $this->db->where('id_moderator', $this->input->post('id'));
        $this->db->update('moderator', $data);
    }
}

