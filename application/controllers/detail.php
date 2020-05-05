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
    }

    public function pembelajaran_detail($id_modul)
    {
        $data['judul'] = 'Amal Edukasi | Detail Modul Pembelajaran';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['modul'] = $this->Modul_model->getModulById($id_modul);

        $this->form_validation->set_rules('testimoni', 'Testimoni', 'required|trim', [
            'required' => 'Pesan testimoni tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            if($data['user']){
                if($user['role_id'] == 3){
                    $this->load->view('header/header_user', $data);
                    $this->load->view('user/pembelajaran/pembelajaran_detail');
                    $this->load->view('footer/footer_user');
                } else{
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
                redirect('home');
            }
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
