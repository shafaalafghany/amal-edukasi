<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_faq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('User_model');
        $this->load->model('Modul_model');
        $this->load->model('Soal_model');
        $this->load->model('Hasil_tes_model');
    }

    public function index()
    {
        $data['judul'] = 'Amal Edukasi | Daftar FAQ';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        /* $data['modul'] = $this->Modul_model->getAllModul();
        $data['event'] = $this->Event_model->getAllEvent();
        $data['allUser'] = $this->User_model->getAllUser();
        $data['admin'] = $this->User_model->getAllAdmin(); */

        if($data['user']){
            if($user['role_id'] == 1){
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/faq/daftar_faq');
            } else{
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else{
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function tambah_faq()
    {
        $data['judul'] = 'Amal Edukasi | Tambah FAQ';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        /* $data['modul'] = $this->Modul_model->getAllModul();
        $data['event'] = $this->Event_model->getAllEvent();
        $data['allUser'] = $this->User_model->getAllUser();
        $data['admin'] = $this->User_model->getAllAdmin(); */

        if($data['user']){
            if($user['role_id'] == 1){
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/faq/tambah_faq');
            } else{
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else{
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }
}