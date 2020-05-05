<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');;
        $this->load->model('User_model');
        $this->load->model('Faq_model');
    }

    public function pilih_paket()
    {
        $data['judul'] = 'Amal Edukasi | Daftar Event';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['faq'] = $this->Faq_model->getAllFaq();

        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/event/pilih_paket');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function daftar_event()
    {
        $data['judul'] = 'Amal Edukasi | Daftar Event';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['faq'] = $this->Faq_model->getAllFaq();

        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/event/daftar_event');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function tambah_event()
    {
        $data['judul'] = 'Amal Edukasi | Tambah Event Tryout';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['faq'] = $this->Faq_model->getAllFaq();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
            'required' => 'Judul tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
            'required' => 'Deskripsi tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            //Cek apakah user sudah login
            if ($data['user']) {
                //Cek apakah user adalah admin
                if ($user['role_id'] == 1) {
                    $this->load->view('header/header_admin', $data);
                    $this->load->view('admin/event/tambah_event');
                } else {
                    $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
                redirect('home');
            }
        } else {
            //Ambil data dari form
            $judul = $this->input->post('judul');
            $deskripsi = $this->input->post('deskripsi');

            //Masukkan data ke array
            $data = [
                'judul_faq' => $judul,
                'desk_faq' => $deskripsi
            ];

            //Insert data ke database
            $res = $this->Faq_model->insertFaq($data);
            if ($res) {
                $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu FAQ berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin_faq');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12" role="alert"><strong>Satu FAQ gagal ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin_faq');
            }
        }
    }

    public function hapus_paket($id)
    {
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['faq'] = $this->Faq_model->getAllFaq();

        $this->Faq_model->deleteFaq($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu FAQ berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin_faq');
    }
}
