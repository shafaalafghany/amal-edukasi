<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->model('User_model');
        $this->load->model('Modul_model');
        $this->load->model('Soal_model');
        $this->load->model('Hasil_tes_model');
    }

    public function index()
    {
        /* $data['judul'] = 'Amal Edukasi | Dashboard';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['modul'] = $this->Modul_model->getAllModul();
        $data['event'] = $this->Event_model->getAllEvent();
        $data['allUser'] = $this->User_model->getAllUser();
        $data['admin'] = $this->User_model->getAllAdmin(); */

        $this->load->view('admin/templates/header_admin');
        $this->load->view('admin/index');
        $this->load->view('admin/templates/footer_admin');
    }

    public function profil_admin()
    {
        $data['judul'] = 'Amal Edukasi | Profil Admin';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('Super_Admin/templates/header_profile', $data);
            $this->load->view('Super_Admin/profile_admin');
            $this->load->view('Super_Admin/templates/footer_admin');
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');

            $this->load->helper('file');

            $image = $this->db->select('image')->get_where('user', ['username' => $sessionUser])->row()->image;

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
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12" role="alert"><strong>Maaf gambar tidak sesuai ketentuan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('admin/profil_admin');
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
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12" role="alert"><strong>Maaf gambar tidak sesuai ketentuan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('admin/profil_admin');
                    }
                }
            }

            $this->db->set('name', $name);
            $this->db->where('username', $username);
            $this->db->update('user');
            redirect('admin/profil_admin');
        }
    }

    public function backup_database()
    {
        $this->load->dbutil();

        $pref = array(
            'format'      => 'zip',
            'filename'    => 'database_amal_edukasi.sql'
        );

        $backup = $this->dbutil->backup($pref);
        $db_name = 'backup-pada-' . date("Y-m-d-H-i-s") . '.zip';

        $this->load->helper('download');
        force_download($db_name, $backup);
    }
}
