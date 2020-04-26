<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Modul_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['judul'] = 'Amal Edukasi | Home';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getAllEvent();
        $data['modul'] = $this->Modul_model->getAllModul();
        $data['testimoni'] = $this->Modul_model->getTestimoni();

        if($data['user']){
            if($user['role_id'] == 3){
                $this->load->view('User/header/header_home', $data);
                $this->load->view('User/index');
                $this->load->view('User/footer/footer');
            } else{
                redirect('admin');
            }
        } else{
            $this->load->view('User/header/header_home', $data);
            $this->load->view('User/index');
            $this->load->view('User/footer/footer');
        }
    }
}
