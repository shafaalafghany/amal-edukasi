<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('User_model');
        $this->load->model('Modul_model');
        $this->load->model('Topik_model');
        $this->load->model('Soal_model');
        $this->load->model('Hasil_tes_model');
        $this->load->model('Jawaban_model');
    }

    public function index()
    {
        $data['judul'] = 'Amal Edukasi | Dashboard';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['modul'] = $this->Modul_model->getAllModul();
        $data['event'] = $this->Event_model->getAllEvent();
        $data['allUser'] = $this->User_model->getAllUser();
        $data['admin'] = $this->User_model->getAllAdmin();

        // $this->load->view('Super_Admin/templates/header_admin', $data);
        // $this->load->view('Super_Admin/index', $data);
        // $this->load->view('Super_Admin/templates/footer_admin');
    }
}
