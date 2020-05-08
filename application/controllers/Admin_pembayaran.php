<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('User_model');
        $this->load->model('Pembayaran_model');
    }

    public function index()
    {
        $data['judul'] = 'Amal Edukasi | Pembayaran Peserta';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['bayar'] = $this->Pembayaran_model->getAllBuktiBayar();

        if($data['user']){
            if($user['role_id'] == 1){
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/pembayaran');
            } else{
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else{
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function hapus_bukti($id)
    {
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $this->load->helper('file');

        //hapus file bukti berdasarkan id
        $file_bukti = $this->db->select('bukti_bayar')->get_where('pembayaran_tiket', ['id_bayar' => $id])->row()->bukti_bayar;
        $bayar = './assets/pembayaran/' . $file_bukti;
        unlink($bayar);

        $this->Pembayaran_model->deleteBayar($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu pembayaran peserta berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin_pembayaran');
    }

    public function lihat_modul($id_modul)
    {
        $data['judul'] = 'Amal Edukasi | Detail Modul Pembelajaran';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['modul'] = $this->Modul_model->getModulById($id_modul);

        if ($data['user']) {
            if ($user['role_id'] == 1) {
                $this->load->view('header/detail/detail_modul_admin', $data);
                $this->load->view('admin/modul/view_modul');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
        /* $tofile = realpath("assets/file/" . $modul);
        header('Content-Type: application/pdf');
        readfile($tofile); */
    }
}