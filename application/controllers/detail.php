<?php
defined('BASEPATH') or exit('No direct script access allowed');

class detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Modul_model');
        $this->load->model('User_model');
        $this->load->model('Testimoni_model');
        $this->load->model('Paket_model');
        $this->load->model('Soal_model');
        $this->load->model('Transaksi_model');
        $this->load->model('Hasil_tes_model', 'hasil');
    }

    public function pembelajaran_detail($id_modul)
    {
        $data['judul'] = 'Amal Edukasi | Detail Modul Pembelajaran';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['modul'] = $this->Modul_model->getModulById($id_modul);
        $data['paket'] = $this->Paket_model->getAllPaket();

        $this->form_validation->set_rules('testimoni', 'Testimoni', 'required|trim', [
            'required' => 'Pesan testimoni tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('header/detail/user/detail_pembelajaran', $data);
            $this->load->view('user/pembelajaran/pembelajaran_detail');
            $this->load->view('footer/footer_user');
        } else {
            $testimoni = $this->input->post('testimoni');

            $data_testimoni = [
                'nama_user' => $user['name'],
                'email_user' => $user['email'],
                'jenis' => 'Modul Pembelajaran',
                'pesan' => $testimoni,
                'date_create' => date_create('now')->format('Y-m-d'),
                'image' => $user['image']
            ];

            $this->Testimoni_model->insertTestimoni($data_testimoni);
            $this->session->set_flashdata('success', 'Terimakasih! feedback kamu berhasil terkirim');
            redirect('home');
        }
    }

    public function event_detail($id_paket, $id_event)
    {
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['paket'] = $this->Paket_model->getAllPaket();
        $data['paketID'] = $this->Paket_model->getPaketById($id_paket);
        
        if($user){
            $data['transaksi'] = $this->Transaksi_model->getTransaksiBySomeId($user['id'], $id_paket, $id_event);
            $data['hasil_tpa'] = $this->hasil->getHasilTpaByIdAndEvent($user['id'], $id_event);
            $data['hasil_tbi'] = $this->hasil->getHasilTbiByIdAndEvent($user['id'], $id_event);
            $data['hasil_twk'] = $this->hasil->getHasilTwkByIdAndEvent($user['id'], $id_event);
            $data['hasil_tiu'] = $this->hasil->getHasilTiuByIdAndEvent($user['id'], $id_event);
            $data['hasil_tkp'] = $this->hasil->getHasilTkpByIdAndEvent($user['id'], $id_event);
        }

        $data['judul'] = 'Amal Edukasi | Detail ' . $data['event']['nama_event'];

        $this->form_validation->set_rules('testimoni', 'Testimoni', 'required|trim', [
            'required' => 'Pesan testimoni tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('header/detail/user/detail_event', $data);
            $this->load->view('user/event/event_detail');
            $this->load->view('footer/footer_user');
        } else {
            $testimoni = $this->input->post('testimoni');

            $data_testimoni = [
                'nama_user' => $user['name'],
                'email_user' => $user['email'],
                'jenis' => 'Modul Pembelajaran',
                'pesan' => $testimoni,
                'date_create' => date_create('now')->format('Y-m-d'),
                'image' => $user['image']
            ];

            $this->Testimoni_model->insertTestimoni($data_testimoni);
            $this->session->set_flashdata('success', 'Terimakasih! feedback kamu berhasil terkirim');
            redirect('home');
        }
    }
}
