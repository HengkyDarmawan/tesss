<?php

class Webinar_m extends CI_Model
{
    public function getWebinar(){
        $this->db->select('*');
        $this->db->from('webinar');
        $this->db->join('pembicara', 'webinar.pembicara_id = pembicara.id', 'left');
        $this->db->join('moderator', 'webinar.moderator_id = moderator.id', 'left');
        return $this->db->get()->result_array();
    }
    public function Tambah()
    {
        $data = [
            "tema" => $this->input->post('tema', true),
            "tipe" => $this->input->post('tipe', true),
            "lokasi" => $this->input->post('lokasi', true),
            "tanggal" => $this->input->post('tanggal', true),
            "waktu" => $this->input->post('waktu', true),
            "pembicara_id" => $this->input->post('pembicara_id', true),
            "moderator_id" => $this->input->post('moderator_id', true),
        ];
        $this->db->insert('webinar', $data);
    }
    public function hapus($id)
    {
        $this->db->delete('webinar', ['id' => $id]);
    }
    public function getWebinarId($id)
    {
        return $this->db->get_where('webinar', ['id' => $id])->row_array();
    }


    public function update()
    {
        $data = [
            "tema" => $this->input->post('tema', true),
            "tipe" => $this->input->post('tipe', true),
            "lokasi" => $this->input->post('lokasi', true),
            "tanggal" => $this->input->post('tanggal', true),
            "waktu" => $this->input->post('waktu', true),
            "pembicara_id" => $this->input->post('pembicara_id', true),
            "moderator_id" => $this->input->post('moderator_id', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('webinar', $data);
    }
}

