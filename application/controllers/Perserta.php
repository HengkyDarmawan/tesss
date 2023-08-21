<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perserta extends CI_Controller {

	public function index()
	{
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $user['id'];
        $data['daftar_webinar'] = $this->perserta_m->getDaftarWebinar($user_id);
        $data['absensi'] = $this->perserta_m->getAbsensi($user_id);
        

        $this->load->view('perserta/header', $data);
        $this->load->view('perserta/index', $data);
        $this->load->view('perserta/footer');
	}
    public function absensi($id){
        $data['title'] = 'Absensi Webinar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dafWebinar'] = $this->perserta_m->getAbsensiById($id);
        

        $this->form_validation->set_rules('id', 'id', 'required|trim');
        $this->form_validation->set_rules('bukti', 'Link Bukti Absensi', 'required|trim|valid_url');


        if ($this->form_validation->run() == false) {
            $this->load->view('perserta/header', $data);
            $this->load->view('perserta/absensi', $data);
            $this->load->view('perserta/footer');
        } else {
            $id_daftar_webinar = $this->input->post('id');
            $id_webinar = $data['dafWebinar']['webinar_id'];
            $userid = $data['user']['id'];
            $bukti = $this->input->post('bukti');

            $this->db->set('daftar_webinar_id', $id_daftar_webinar);
            $this->db->set('webinar_id', $id_webinar);
            $this->db->set('user_id', $userid);
            $this->db->set('waktu_absen', date('Y-m-d H:i:s'));
            $this->db->set('bukti', $bukti);
            $this->db->set('status', 'review');
            $this->db->insert('absensi');

            // Set status absen di tabel daftar_webinar menjadi 'absen' untuk id yang sesuai
            $this->db->set('status', 'selesai');
            $this->db->where('id_daftar_webinar', $id_daftar_webinar);
            $this->db->update('daftar_webinar');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah terabsen di Webinar ini.</div>');
            redirect('index.php/perserta');
        }
    }
    public function generator($id)
	{
		$data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dafWebinar'] = $this->perserta_m->getAbsensiId($id);
        $absensi = $this->perserta_m->getAbsensiId($id);
        // var_dump($absensi['tema']); die;

        //direktori template sertifikat dan file hasil generate
		$directory = "./assets/img/sertifikat";
        if(!is_dir($directory)) {
                mkdir($directory, 0775, TRUE);
        }
        
        //path file template
        $image = $directory.'/template/1.png';
 
        //fungsi php untuk membuat image baru dari file atau URL
        $createimage = imagecreatefrompng($image);
 
        //mendapatkan width dan height dari image yang baru saja dibuat
        $image_width = imagesx($createimage);  
        $image_height = imagesy($createimage);
 
        //set variabel yang isinya path tempat menyimpan sertifikat hasil generate
        //untuk format nama file sertifikat nya, gua menggunakan input fullname dengan menghapus spasi
        //dan di konversi ke huruf kecil semua, plus disisipkan angka random, supaya nama file nya identik
        //contoh : nama yang diinputkan "Roronoa Zoro", maka nama file nya kurang lebih menjadi roronoazoro345.png
        $output = $directory.'/'.str_replace(" ", "", strtolower($absensi['name'])).rand(pow(10, 2), pow(10, 3)-1).".png";
        $tema = $directory.'/'.str_replace(" ", "", strtolower($absensi['tema'])).rand(pow(10, 2), pow(10, 3)-1).".png";
 
        //fungsi untuk set warna text dalam format RGB
        $color = imagecolorallocate($createimage, 212,165,0);
        $color_black = imagecolorallocate($createimage, 0,0,0);
        
        //text
        //variabel untuk set, jika text mau di putar. Jika posisi text mau yang normal, set nilainya 0
        $rotation = 0;
        //variabel untuk set nama di sertifikat
        $certificate_text = $absensi['name'];
        $certificate_tema = $absensi['tema'];
        //ukuran font text sertifikat, sesuaikan dengan ukuran font yang sesuai dengan template sertifikat
        $font_size = 70;
        $font_size_tema = 40;
        //font directory untuk text
        $drFont = FCPATH."/assets/fonts/Roboto-Regular.ttf";
 
        //fungsi untuk memberikan kotak batas text
        //return nya berupa array
        $text_box = imagettfbbox($font_size,$rotation,$drFont,$certificate_text);
        $tema_box = imagettfbbox($font_size_tema,$rotation,$drFont,$certificate_tema);
 
        //fungsi untuk memberikan kotak batas text
        //return nya berupa array
        $text_box = imagettfbbox($font_size,$rotation,$drFont,$certificate_text);
        $tema_box = imagettfbbox($font_size_tema,$rotation,$drFont,$certificate_tema);

        //fungsi untuk mengetahui panjang text ditambah padding
        //silahkan sesuaikan value variable padding ini dengan template sertifikat kalian
        $padding_text =800;
        $padding_tema =900;
        $text_width = ($text_box[2]-$text_box[0])+intval($padding_text);
        $tema_width = ($tema_box[2]-$tema_box[0])+intval($padding_tema);
 
        //setup posisi x dan y text terhadap template sertifikat (silahkan sesuaikan dengan template kalian)
        $origin_text_x = $image_width - $text_width;
        $origin_text_y = 850;
        //setup posisi x dan y tema terhadap template sertifikat (silahkan sesuaikan dengan template kalian)
        $origin_tema_x = $image_width - $tema_width;
        $origin_tema_y = 950;
 
        //function untuk "menempelkan" text nama di sertifikat dengan parameter yang sudah di set sebelumnya
        imagettftext($createimage, $font_size, $rotation, $origin_text_x, $origin_text_y, $color, $drFont, $certificate_text);
        //function untuk "menempelkan" tema nama di sertifikat dengan parameter yang sudah di set sebelumnya
        imagettftext($createimage, $font_size_tema, $rotation, $origin_tema_x, $origin_tema_y, $color_black, $drFont, $certificate_tema);
 
        //membuat image sertifikat yang sudah ada text namanya dengan format png dan simpan sesuai dengan value variabel output
        imagepng($createimage,$output,3);
 
        //memanggil fungsi untuk proses download sertifikat
        $this->download_file($output, $tema);
    }
    public function download_file($path_file)
    {
        
        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"". basename($path_file) ."\"");
        readfile ($path_file);
        redirect('/sertifikat/generator', 'reload');
        exit();
    }
}
