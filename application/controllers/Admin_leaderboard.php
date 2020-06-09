<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_leaderboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');;
        $this->load->model('User_model');
        $this->load->model('Paket_model');
        $this->load->model('Event_model');
        $this->load->model('Topik_model');
        $this->load->model('Soal_model');
        $this->load->model('Jawaban_model');
        $this->load->model('Hasil_tes_model', 'hasil');
    }

    public function pilih_event()
    {
        $data['judul'] = 'Amal Edukasi | Leaderboard';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['event'] = $this->Event_model->getAllEvent();

        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/leaderboard/leaderboard');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function leaderboard_list()
    {
        $data['judul'] = 'Amal Edukasi | Leaderboard';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);

        $id_event = $this->input->post('optionEvent');

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['leader'] = $this->hasil->getLeaderboardByEvent($id_event);
        $data['paket'] = $this->Paket_model->getPaketById($data['event']['id_paket']);

        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/leaderboard/leaderboard_list');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function leaderboard_detail($id_leader)
    {
        $data['judul'] = 'Amal Edukasi | Detail Leaderboard';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);

        $data['leader'] = $this->hasil->getLeaderboardByIdLeader($id_leader);
        $data['event'] = $this->Event_model->getEventById($data['leader']['id_event']);
        $data['paket'] = $this->Paket_model->getPaketById($data['event']['id_paket']);

        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/detail/admin/detail_leaderboard', $data);
                $this->load->view('admin/leaderboard/leaderboard_detail');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function kategori_tambah_soal()
    {
        $data['judul'] = 'Amal Edukasi | Daftar Paket Tryout';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['paket'] = $this->Paket_model->getAllPaket();
        $data['event'] = $this->Event_model->getAllEvent();
        $data['topik'] = $this->Topik_model->getAllTopik();

        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/soal/kategori_paket');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function kategori_event_tambahsoal()
    {
        $data['judul'] = 'Amal Edukasi | Daftar Paket Tryout';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);

        $id_paket = $this->input->post('optionPaket');

        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $data['event'] = $this->Event_model->getEventByIdPaket($id_paket);

        $data['tpa'] = null;
        $data['tbi'] = null;
        $data['twk'] = null;
        $data['tiu'] = null;
        $data['tkp'] = null;
        $data['tsa'] = null;

        if($data['paket']['tpa'] == 1){
            $data['tpa'] = $this->Topik_model->getTopikTPA();
        }

        if($data['paket']['tbi'] == 1){
            $data['tbi'] = $this->Topik_model->getTopikTBI();
        }

        if($data['paket']['twk'] == 1){
            $data['twk'] = $this->Topik_model->getTwk();
        }

        if($data['paket']['tiu'] == 1){
            $data['tiu'] = $this->Topik_model->getTiu();
        }

        if($data['paket']['tkp'] == 1){
            $data['tkp'] = $this->Topik_model->getTkp();
        }

        if($data['paket']['tsa'] == 1){
            $data['tsa'] = $this->Topik_model->getTopikTsa();
        }

        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/soal/kategori_event');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function tambah_soal()
    {
        $data['judul'] = 'Amal Edukasi | Tambah Paket Tryout';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);

        $id_event = $this->input->post('optionEvent');
        $id_topik = $this->input->post('optionTopik');

        if(!$id_event){
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12" role="alert"><strong>Tidak ada event dalam paket ini! Silahkan buat event terlebih dahulu.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin_soal/kategori_tambah_soal');
        }

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikById($id_topik);
        $data['paket'] = $this->Paket_model->getPaketById($data['event']['id_paket']);

        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/soal/tambah_soal');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function hapus_soal($id)
    {
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['soal'] = $this->Soal_model->getAllSoal();

        $this->Soal_model->deleteSoal($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu soal berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin_soal/pilih_kategori_soal');
    }

    public function reset_data_event($id_event)
    {
        $this->Event_model->resetDataEvent($id_event);
        redirect('admin_leaderboard/pilih_event');
    }
}
