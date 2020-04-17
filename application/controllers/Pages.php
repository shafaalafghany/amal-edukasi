<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Modul_model');
        $this->load->model('Topik_model');
        $this->load->model('User_model');
        $this->load->model('Rule_topik_model');
        $this->load->model('Soal_model');
        $this->load->model('Kerjakan_model');
        $this->load->model('Hasil_tes_model', 'hasil');
    }

    public function testimoni()
    {
        $data['judul'] = 'Try Out Online | Testimoni';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['testimoni'] = $this->Modul_model->getTestimoni();

        $this->form_validation->set_rules('inputSubjek', 'InputSubjek', 'required|trim');
        $this->form_validation->set_rules('inputPesan', 'InputPesan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('User/templates/header_testimoni', $data);
            $this->load->view('User/testimoni');
            $this->load->view('User/templates/footer');
        } else {
            $nama = $this->input->post('name');
            $email = $this->input->post('inputEmail');
            $subjek = $this->input->post('inputSubjek');
            $pesan = $this->input->post('inputPesan');
            $tgl = time();
            $image = $this->User_model->getImageUserByEmail($email);

            $dataTestimoni = [
                'nama_user' => $nama,
                'email_user' => $email,
                'subjek' => $subjek,
                'pesan' => $pesan,
                'date_create' => $tgl,
                'image' => $image
            ];

            $this->db->insert('testimoni', $dataTestimoni);
            redirect('User/testimoni');
        }
    }

    public function contact()
    {
        $data['judul'] = 'Try Out Online | Contact';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $this->load->view('User/templates/header_contact', $data);
        $this->load->view('User/contact');
        $this->load->view('User/templates/footer');
    }

    public function profil_saya()
    {
        $data['judul'] = 'Try Out Online | Profil Saya';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $id_user = $this->User_model->getIdUserByUsername($sessionUser);
        $data['transaksi'] = $this->db->get_where('transaksi_user', ['id_user' => $id_user])->result_array();
        $data['modul'] = $this->Modul_model->getAllModul();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('User/templates/header_profile', $data);
            $this->load->view('User/profile_saya', $data);
            $this->load->view('User/templates/footer');
        } else {
            $name = $this->input->post('name');
            $tentang = $this->input->post('tentang');
            $username = $this->input->post('username');

            $this->load->helper('file');

            $image = $this->db->select('image')->get_where('user', ['username' => $username])->row()->image;

            if ($image != "default.png") {
                $path = './assets/img/profile/' . $image;
                unlink($path);

                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['upload_path'] = './assets/img/profile/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 2048;
                    $config['overwrite'] = true;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-10" style="margin-left: 8%;" role="alert"><strong>Maaf gambar tidak sesuai ketentuan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/profile_saya');
                    }
                }
            } else {
                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['upload_path'] = './assets/img/profile/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 2048;
                    $config['overwrite'] = true;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-10" style="margin-left: 8%;" role="alert"><strong>Maaf gambar tidak sesuai ketentuan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/profile_saya');
                    }
                }
            }

            $tampung = array(
                'name' => $name,
                'tentang' => $tentang
            );
            $this->db->where('username', $username);
            $this->db->update('user', $tampung);
            $this->session->set_flashdata('message', '<div class="alert alert-success col-md-10" style="margin-left: 8%;" role="alert"><strong>Perubahan profile berhasil disimpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($this->uri->uri_string());
        }
    }

    public function topup()
    {
        $data['judul'] = 'Try Out Online | Top Up Point';

        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getAllEvent();
        $data['topup'] = $this->db->get('topup')->result_array();

        $this->load->view('User/templates/header_topup', $data);
        $this->load->view('User/topup', $data);
        $this->load->view('User/templates/footer');
    }

    public function pembelajaran()
    {
        $this->load->view('User/header/header_pembelajaran');
        $this->load->view('User/pembelajaran/pembelajaran');
        $this->load->view('User/footer/footer');
    }
}
