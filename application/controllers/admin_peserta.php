<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_peserta extends CI_Controller
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
        $data['judul'] = 'Amal Edukasi | Daftar Peserta';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['member'] = $this->User_model->getAllUser();
        $this->load->view('Super_Admin/templates/header_admin', $data);
        $this->load->view('Super_Admin/peserta/daftar_peserta', $data);
    }

    public function hapus_peserta($id)
    {
        $this->User_model->deleteUserById($id);
        redirect('admin_peserta');
    }

    public function lihat_peserta($id)
    {
        $data['judul'] = 'Amal Edukasi | Daftar Peserta';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['member'] = $this->User_model->getUserById($id);
        $this->load->view('Super_Admin/templates/header_admin', $data);
        $this->load->view('Super_Admin/peserta/view_peserta', $data);
    }

    public function tambah_point($id)
    {
        $data['judul'] = 'Amal Edukasi | Daftar Peserta';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['member'] = $this->User_model->getUserById($id);
        $this->load->view('Super_Admin/templates/header_admin', $data);
        $this->load->view('Super_Admin/peserta/tambah_point', $data);
    }

    public function point($id)
    {
        $data['judul'] = 'Amal Edukasi | Daftar Peserta';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['member'] = $this->User_model->getUserById($id);

        $this->form_validation->set_rules('inputPoint', 'InputPoint', 'required|trim', [
            'required' => 'Mohon masukkan point untuk tambah point!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Super_Admin/templates/header_admin', $data);
            $this->load->view('Super_Admin/peserta/tambah_point');
        } else {
            $pointUser = $this->User_model->getPointUserById($id);
            $inputPoint = $this->input->post('inputPoint');
            $kategori = $this->input->post('optionKategori');

            if ($kategori == 1) {
                $tambahPoint = $pointUser + $inputPoint;

                $datapoint = [
                    'point' => $tambahPoint
                ];

                $this->User_model->updatePointUserById($id, $datapoint);

                $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Point berhasil ditambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $kurangiPoint = $pointUser - $inputPoint;

                $datapoint = [
                    'point' => $kurangiPoint
                ];

                $this->User_model->updatePointUserById($id, $datapoint);

                $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Point berhasil dikurangi</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }


            redirect('admin_peserta');
        }
    }

    public function testimoni()
    {
        $data['judul'] = 'Amal Edukasi | Daftar Peserta';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['testimoni'] = $this->User_model->getAllTestimoni();

        $this->load->view('Super_Admin/templates/header_admin', $data);
        $this->load->view('Super_Admin/testimoni', $data);
    }
}
