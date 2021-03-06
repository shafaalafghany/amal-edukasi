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

    public function kategori_event()
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

    public function daftar_soal()
    {
        $data['judul'] = 'Amal Edukasi | Daftar Paket Tryout';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);

        $id_event = $this->input->post('optionEvent');
        $id_topik = $this->input->post('optionTopik');

        if(!$id_event){
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12" role="alert"><strong>Tidak ada event dalam paket ini! Silahkan buat event terlebih dahulu.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin_soal/pilih_kategori_soal');
        }

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikById($id_topik);
        $data['paket'] = $this->Paket_model->getPaketById($data['event']['id_paket']);

        $data['soal'] = $this->Soal_model->getSoalByIdEventAndIdTopik($id_event, $id_topik);

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

    public function insert_soal($id_paket, $id_event, $id_topik)
    {
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);

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
                $this->Jawaban_model->insertJawabanTkp($id_event, $id_topik, $getIdSoal, $jawabanTkp1, $jawabanTkp2, $jawabanTkp3, $jawabanTkp4, $jawabanTkp5, $pointTkp1, $pointTkp2, $pointTkp3, $pointTkp4, $pointTkp5);
            } else if ($id_topik == 1) {
                $this->Jawaban_model->insertJawabanTpa($id_event, $id_topik, $getIdSoal, $jawabanBenar, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5);
            } else {
                $this->Jawaban_model->insertJawabanSelainTpaTkpPsiko($id_event, $id_topik, $getIdSoal, $jawabanBenar, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5);
            }

            //Cek apakah insert data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu soal berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin_soal/kategori_tambah_soal');
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

    public function edit_soal($id_paket, $id_event, $id_topik, $id_soal)
    {
        $data['judul'] = 'Amal Edukasi | View Soal';
        $sessionUser = $this->session->userdata('email');
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikById($id_topik);

        $data['soal'] = $this->Soal_model->getSoalByIdSoal($id_soal);
        $data['jawaban'] = $this->Soal_model->getJawabanByIdSoal($id_soal);

        $this->form_validation->set_rules('inputSoal', 'inputSoal', 'required|trim', [
            'required' => 'Soal tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            //Cek apakah user sudah login
            if ($data['user']) {
                //Cek apakah user adalah admin
                if ($user['role_id'] == 1) {
                    $this->load->view('header/detail/admin/detail_soal_admin', $data);
                    $this->load->view('admin/soal/edit_soal', $data);
                } else {
                    $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
                redirect('home');
            }
        } else {
            //Ambil input data dari form
            $datasoal = [
                'soal' => $this->input->post('inputSoal')
            ];

            //Update data Soal ke database
            $this->db->set($datasoal);
            $this->db->where('id_soal', $id_soal);
            $this->db->update('soal');

            $getJawaban = $this->db->get_where('jawaban', [
                'id_paket' => $id_paket,
                'id_event' => $id_event,
                'id_topik_tes' => $id_topik,
                'id_soal' => $id_soal
            ])->result_array();

            $jawabanBenar = $this->input->post('jawabanBenar');
            $jawaban1 = $this->input->post('jawaban1');
            $jawaban2 = $this->input->post('jawaban2');
            $jawaban3 = $this->input->post('jawaban3');
            $jawaban4 = $this->input->post('jawaban4');
            $jawaban5 = $this->input->post('jawaban5');

            $jawabanTkp1 = $this->input->post('jawabanTkp1');
            $jawabanTkp2 = $this->input->post('jawabanTkp2');
            $jawabanTkp3 = $this->input->post('jawabanTkp3');
            $jawabanTkp4 = $this->input->post('jawabanTkp4');
            $jawabanTkp5 = $this->input->post('jawabanTkp5');

            $pointTkp1 = $this->input->post('pointTkp1');
            $pointTkp2 = $this->input->post('pointTkp2');
            $pointTkp3 = $this->input->post('pointTkp3');
            $pointTkp4 = $this->input->post('pointTkp4');
            $pointTkp5 = $this->input->post('pointTkp5');

            if ($id_topik == 1) {
                $this->Jawaban_model->updateJawabanTpa($id_event, $id_topik, $id_soal, $getJawaban, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5, $jawabanBenar);
            } elseif ($id_topik == 5) {
                $this->Jawaban_model->updateJawabanTkp($id_event, $id_topik, $id_soal, $getJawaban, $jawabanTkp1, $jawabanTkp2, $jawabanTkp3, $jawabanTkp4, $jawabanTkp5, $pointTkp1, $pointTkp2, $pointTkp3, $pointTkp4, $pointTkp5);
            } elseif ($id_topik == 6) {
                $this->Jawaban_model->updateJawabanPsiko($id_event, $id_topik, $id_soal, $getJawaban, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5, $jawabanBenar);
            } else {
                $this->Jawaban_model->updateJawabanSelainTpaDanPsiko($id_event, $id_topik, $id_soal, $getJawaban, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5, $jawabanBenar);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu soal berhasil diperbarui</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin_soal/pilih_kategori_soal');
        }
    }
}
