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
        $this->load->model('Jawaban_model');
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

        $this->form_validation->set_rules('inputSoal', 'soal', 'required|trim');
        $this->form_validation->set_rules('jawaban1', 'jawaban1', 'trim');
        $this->form_validation->set_rules('jawaban2', 'jawaban2', 'trim');
        $this->form_validation->set_rules('jawaban3', 'jawaban3', 'trim');
        $this->form_validation->set_rules('jawaban4', 'jawaban4', 'trim');
        $this->form_validation->set_rules('jawaban5', 'jawaban5', 'trim');


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
            $soal = $this->input->post('inputSoal');

            $jawabanTkp1 = $this->input->post('jawabanTkp1');
            $jawabanTkp2 = $this->input->post('jawabanTkp2');
            $jawabanTkp3 = $this->input->post('jawabanTkp3');
            $jawabanTkp4 = $this->input->post('jawabanTkp4');
            $jawabanTkp5 = $this->input->post('jawabanTkp5');

            $pointTkp1 = $this->input->post('pointJawabanTkp1');
            $pointTkp2 = $this->input->post('pointJawabanTkp2');
            $pointTkp3 = $this->input->post('pointJawabanTkp3');
            $pointTkp4 = $this->input->post('pointJawabanTkp4');
            $pointTkp5 = $this->input->post('pointJawabanTkp5');

            $jawaban1 = $this->input->post('jawaban1');
            $jawaban2 = $this->input->post('jawaban2');
            $jawaban3 = $this->input->post('jawaban3');
            $jawaban4 = $this->input->post('jawaban4');
            $jawaban5 = $this->input->post('jawaban5');
            $jawabanBenar = $this->input->post('jawabanBenar');

            //Masukkan data soal ke array
            if ($id_topik == 5 || $id_topik == 4 || $id_topik == 3) {
                $data_soal = [
                    'id_paket' => $id_paket,
                    'id_topik_tes' => $id_topik,
                    'id_event' => $id_event,
                    'id_skd' => 3,
                    'soal' => $soal
                ];
            } else {
                $data_soal = [
                    'id_paket' => $id_paket,
                    'id_topik_tes' => $id_topik,
                    'id_event' => $id_event,
                    'id_skd' => 0,
                    'soal' => $soal
                ];
            }

            //Insert data soal ke database
            $res_soal = $this->Soal_model->insertSoal($data_soal);

            //Get id_soal untuk jawaban
            $getIdSoal = $this->db->select('id_soal')->get_where('soal', [
                'id_paket' => $id_paket,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'soal' => $soal
            ])->row()->id_soal;

            //Insert data Jawaban ke database
            if ($id_topik == 5) {
                $res_jawaban = $this->Jawaban_model->insertJawabanTkp($id_event, $id_topik, $getIdSoal, $jawabanTkp1, $jawabanTkp2, $jawabanTkp3, $jawabanTkp4, $jawabanTkp5, $pointTkp1, $pointTkp2, $pointTkp3, $pointTkp4, $pointTkp5);
            } else if ($id_topik == 1) {
                $res_jawaban = $this->Jawaban_model->insertJawabanTpa($id_event, $id_topik, $getIdSoal, $jawabanBenar, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5);
            } else {
                $res_jawaban = $this->Jawaban_model->insertJawabanSelainTpaTkpPsiko($id_event, $id_topik, $getIdSoal, $jawabanBenar, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5);
            }

            //Cek apakah insert data sukses
            if ($res_soal && $res_jawaban) {
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
