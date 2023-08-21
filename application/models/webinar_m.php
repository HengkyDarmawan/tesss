<?php

class Webinar_m extends CI_Model
{
    public function getWebinar(){
        $this->db->select('*');
        $this->db->from('webinar');
        $this->db->join('pembicara', 'webinar.pembicara_id = pembicara.id_pembicara');
        $this->db->join('moderator', 'webinar.moderator_id = moderator.id_moderator');
        $this->db->order_by('webinar.id_webinar', 'DESC');
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
            "bank" => $this->input->post('bank', true),
            "no_rek" => $this->input->post('no_rek', true),
            "harga" => $this->input->post('harga', true),
            "jmlh_tiket" => $this->input->post('jmlh_tiket', true),
        ];
        $this->db->insert('webinar', $data);
    }
    public function hapus($id)
    {
        $this->db->delete('webinar', ['id_webinar' => $id]);
    }
    public function getWebinarId($id)
    {
        return $this->db->get_where('webinar', ['id_webinar' => $id])->row_array();
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
            "bank" => $this->input->post('bank', true),
            "no_rek" => $this->input->post('no_rek', true),
            "harga" => $this->input->post('harga', true),
            "jmlh_tiket" => $this->input->post('jmlh_tiket', true),
        ];
        $this->db->where('id_webinar', $this->input->post('id'));
        $this->db->update('webinar', $data);
    }
    public function getPesertaByWebinarId($id){
        $this->db->where('webinar_id', $id);
        $query = $this->db->get('daftar_webinar');
        return $query->result_array();
    }
    public function getWebinarWithSpeakers($id) {
        $this->db->select('*');
        $this->db->from('webinar');
        $this->db->join('pembicara', 'webinar.pembicara_id = pembicara.id_pembicara', 'left');
        $this->db->join('moderator', 'webinar.moderator_id = moderator.id_moderator', 'left');
        $this->db->where('webinar.id_webinar', $id);
        return $this->db->get()->row_array();
    }
}

