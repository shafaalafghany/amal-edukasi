<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_soal extends CI_Controller
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
    }

    public function pilih_kategori_soal()
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
                $this->load->view('admin/soal/pilih_kategori_soal');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function daftar_soal()
    {
        $data['judul'] = 'Amal Edukasi | Daftar Paket Tryout';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);

        $id_paket = $this->input->post('optionPaket');
        $id_event = $this->input->post('optionEvent');
        $id_topik = $this->input->post('optionTopik');

        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikById($id_topik);

        $data['soal'] = $this->Soal_model->getSoalByIdPaketEventTopik($id_paket, $id_event, $id_topik);

        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/soal/daftar_soal');
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

        $id_paket = $this->input->post('optionPaket');
        $id_event = $this->input->post('optionEvent');
        $id_topik = $this->input->post('optionTopik');

        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikById($id_topik);

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
                    $this->load->view('admin/soal/tambah_soal');
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
                $this->load->view('admin/soal/kategori_tambah_soal');
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
        $data['faq'] = $this->Faq_model->getAllFaq();

        $this->Faq_model->deleteFaq($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu FAQ berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin_faq');
    }
}
