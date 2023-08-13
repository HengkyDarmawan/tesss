<?php

class Perserta_m extends CI_Model
{
    public function getDaftarWebinar(){
        $this->db->select('*');
        $this->db->from('daftar_webinar');
        $this->db->join('webinar', 'daftar_webinar.webinar_id = webinar.id_webinar');
        $this->db->join('user', 'daftar_webinar.user_id = user.id', 'left');
        $this->db->where('user_id', 8);
        $this->db->order_by('daftar_webinar.id_daftar_webinar', 'DESC');
        return $this->db->get()->result_array();

    }
    // public function getWebinar(){
    //     $this->db->select('*');
    //     $this->db->from('webinar');
    //     $this->db->join('pembicara', 'webinar.pembicara_id = pembicara.id_pembicara');
    //     $this->db->join('moderator', 'webinar.moderator_id = moderator.id_moderator');
    //     $this->db->join('user', 'webinar.user_id = user.id', 'left');
    //     $this->db->order_by('webinar.id_webinar', 'DESC');
    //     return $this->db->get()->result_array();
    // }
}