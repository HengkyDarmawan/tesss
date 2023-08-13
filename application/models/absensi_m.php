<?php

class Absensi_m extends CI_Model
{
    public function getAbsensi(){
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.user_id = user.id');
        $this->db->join('webinar', 'absensi.webinar_id = webinar.id_webinar');
        $this->db->order_by('absensi.id_absensi', 'DESC');
        return $this->db->get()->result_array();
    }
}