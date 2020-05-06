<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');;
        $this->load->model('User_model');
        $this->load->model('Paket_model');
        $this->load->model('Event_model');
        $this->load->model('Topik_model');
    }

    public function daftar_paket()
    {
        $data['judul'] = 'Amal Edukasi | Daftar Paket Tryout';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['paket'] = $this->Paket_model->getAllPaket();

        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/paket/daftar_paket');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function tambah_paket()
    {
        $data['judul'] = 'Amal Edukasi | Tambah Paket Tryout';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['topik'] = $this->Topik_model->getAllTopik();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
            'required' => 'Judul tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim', [
            'required' => 'Harga tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            //Cek apakah user sudah login
            if ($data['user']) {
                //Cek apakah user adalah admin
                if ($user['role_id'] == 1) {
                    $this->load->view('header/header_admin', $data);
                    $this->load->view('admin/paket/tambah_paket');
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
            $harga = $this->input->post('harga');
            $tpa = $this->input->post('cbTopik1');
            $tbi = $this->input->post('cbTopik2');
            $twk = $this->input->post('cbTopik3');
            $tiu = $this->input->post('cbTopik4');
            $tkp = $this->input->post('cbTopik5');
            $tsa = $this->input->post('cbTopik6');
            $psiko = $this->input->post('cbTopik7');

            //Masukkan data ke array
            $data = [
                'nama_paket' => $judul,
                'harga_paket' => $harga,
                'tpa' => $tpa,
                'tbi' => $tbi,
                'twk' => $twk,
                'tiu' => $tiu,
                'tkp' => $tkp,
                'tsa' => $tsa,
                'psiko' => $psiko
            ];

            //Insert data ke database
            $res = $this->Paket_model->insertPaket($data);
            if ($res) {
                $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu Paket Try Out berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin_paket/daftar_paket');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12" role="alert"><strong>Satu Paket Try Out gagal ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin_paket/daftar_paket');
            }
        }
    }

    public function edit_paket($id_paket)
    {
        $data['judul'] = 'Amal Edukasi | Daftar Paket Tryout';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $data['event'] = $this->Event_model->getEventByIdPaket($id_paket);

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
            'required' => 'Judul tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim', [
            'required' => 'Harga tidak boleh kosong!'
        ]);
        
        if ($this->form_validation->run() == false) {
            //Cek apakah user sudah login
            if ($data['user']) {
                //Cek apakah user adalah admin
                if ($user['role_id'] == 1) {
                    $this->load->view('header/detail/detail_paket_admin', $data);
                    $this->load->view('admin/paket/edit_paket');
                } else {
                    $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
                redirect('home');
            }
        } else{
            //Ambil data dari form
            $judul = $this->input->post('judul');
            $harga = $this->input->post('harga');
            $tpa = $this->input->post('cbTopik1');
            $tbi = $this->input->post('cbTopik2');
            $twk = $this->input->post('cbTopik3');
            $tiu = $this->input->post('cbTopik4');
            $tkp = $this->input->post('cbTopik5');
            $tsa = $this->input->post('cbTopik6');
            $psiko = $this->input->post('cbTopik7');

            //Masukkan data ke array
            $data_paket = [
                'nama_paket' => $judul,
                'harga_paket' => $harga,
                'tpa' => $tpa,
                'tbi' => $tbi,
                'twk' => $twk,
                'tiu' => $tiu,
                'tkp' => $tkp,
                'tsa' => $tsa,
                'psiko' => $psiko
            ];

            //Insert data ke database
            $res = $this->Paket_model->updatePaket($id_paket, $data_paket);
            if ($res) {
                $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu Paket Try Out berhasil diperbarui!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin_paket/daftar_paket');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12" role="alert"><strong>Satu Paket Try Out gagal diperbarui!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin_paket/daftar_paket');
            }
        }
    }

    public function hapus_paket($id)
    {
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $this->Paket_model->deletePaket($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu Paket Try Out berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin_paket/daftar_paket');
    }
}
