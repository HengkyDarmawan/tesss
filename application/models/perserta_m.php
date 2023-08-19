<?php

class Perserta_m extends CI_Model
{
    public function getDaftarWebinar($user_id){
        $this->db->select('*');
        $this->db->from('daftar_webinar');
        $this->db->join('webinar', 'daftar_webinar.webinar_id = webinar.id_webinar');
        $this->db->join('user', 'daftar_webinar.user_id = user.id');
        $this->db->join('pembicara', 'daftar_webinar.pembicara_id = pembicara.id_pembicara', 'left');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('daftar_webinar.id_daftar_webinar', 'DESC');
        return $this->db->get()->result_array();

    }
    public function getWebinarId($id)
    {
        return $this->db->get_where('webinar', ['id_webinar' => $id])->row_array();
    }
    public function getAbsensi($user_id){

        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('webinar', 'absensi.webinar_id = webinar.id_webinar');
        $this->db->join('user', 'absensi.user_id = user.id', 'left');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('absensi.id_absensi', 'DESC');
        
        return $this->db->get()->result_array();
    }
    public function getAbsensiById($id) {
        $this->db->select('*');
        $this->db->from('daftar_webinar');
        $this->db->join('webinar', 'daftar_webinar.webinar_id = webinar.id_webinar');
        $this->db->join('user', 'daftar_webinar.user_id = user.id', 'left');
        $this->db->where('daftar_webinar.id_daftar_webinar', $id);
        return $this->db->get()->row_array();
    }
    public function getAbsensiId($id) {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('webinar', 'absensi.webinar_id = webinar.id_webinar');
        $this->db->join('user', 'absensi.user_id = user.id', 'left');
        $this->db->where('absensi.id_absensi', $id);
        return $this->db->get()->row_array();
    }
}