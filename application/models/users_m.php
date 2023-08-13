<?php

class Users_m extends CI_Model
{
    public function getDaftarWebinar(){
        $this->db->select('*');
        $this->db->from('daftar_webinar');
        $this->db->join('user', 'daftar_webinar.user_id = user.id');
        $this->db->join('webinar', 'daftar_webinar.webinar_id = webinar.id_webinar');
        $this->db->order_by('daftar_webinar.id_daftar_webinar', 'DESC');
        return $this->db->get()->result_array();
    }
    public function Tambah()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "alamat" => $this->input->post('alamat', true),
            "hp" => $this->input->post('hp', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "image" => "default.jpg",
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			"role_id" => $this->input->post('role_id', true),
            "is_active" => 1,
            'date_created' => time(),
        ];
        $this->db->insert('user', $data);
    }
    public function hapus($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }
    public function getuserId($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }


    public function update()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "alamat" => $this->input->post('alamat', true),
            "hp" => $this->input->post('hp', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "image" => "default.jpg",
			"role_id" => $this->input->post('role_id', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }
}

