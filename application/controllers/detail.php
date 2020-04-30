<?php
defined('BASEPATH') or exit('No direct script access allowed');

class detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Modul_model');
        $this->load->model('User_model');
    }

    public function pembelajaran_detail()
    {
        $data['judul'] = 'Amal Edukasi | Detail Modul Pembelajaran';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $this->load->view('header/header_user', $data);
        $this->load->view('user/pembelajaran/pembelajaran_detail');
        $this->load->view('footer/footer_user');
    }
}
