<?php

class Pembicara_m extends CI_Model
{
    public function Tambah()
    {
        $data = [
            "nama_pembicara" => $this->input->post('nama_pembicara', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "email" => $this->input->post('email', true),
            "hp" => $this->input->post('hp', true),
            "link" => $this->input->post('link', true),
            "alamat" => $this->input->post('alamat', true),
        ];
        $this->db->insert('pembicara', $data);
    }
    public function hapus($id)
    {
        $this->db->delete('pembicara', ['id_pembicara' => $id]);
    }
    public function getPembicaraId($id)
    {
        return $this->db->get_where('pembicara', ['id_pembicara' => $id])->row_array();
    }


    public function update()
    {
        $data = [
            "nama_pembicara" => $this->input->post('nama_pembicara', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "email" => $this->input->post('email', true),
            "hp" => $this->input->post('hp', true),
            "link" => $this->input->post('link', true),
            "alamat" => $this->input->post('alamat', true),
        ];
        $this->db->where('id_pembicara', $this->input->post('id'));
        $this->db->update('pembicara', $data);
    }
}

