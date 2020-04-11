<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    // public function __construct()
    // {

    // }

    public function index()
    {
        $data['judul'] = 'Try Out Online';

        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getAllEvent();
        $data['modul'] = $this->Modul_model->getAllModul();
        $data['testimoni'] = $this->Modul_model->getTestimoni();

        $this->load->view('User/templates/header_home', $data);
        $this->load->view('User/index', $data);
        $this->load->view('User/templates/footer');
    }
}
