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
        $this->load->model('Tiket_model');
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
                $this->load->view('admin/pembayaran/pembayaran');
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

    public function lihat_bukti($id_bukti)
    {
        $data['judul'] = 'Amal Edukasi | Detail Pembayaran';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['bayar'] = $this->Pembayaran_model->getBayarById($id_bukti);
        $data['peserta'] = $this->User_model->getUserById($data['bayar']['id_user']);

        if ($data['user']) {
            if ($user['role_id'] == 1) {
                $this->load->view('header/detail/admin/detail_pembayaran', $data);
                $this->load->view('admin/pembayaran/lihat_pembayaran');
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

    public function terima_bukti($id_bayar)
    {
        $data['judul'] = 'Amal Edukasi | Detail Pembayaran';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $bayar = $this->Pembayaran_model->getBayarById($id_bayar);
        $paket1 = $bayar['request1_id_paket'];

        $paket2 = null;
        if($bayar['request2_id_paket']){
            $paket2 = $bayar['request2_id_paket'];
        }

        $paket3 = null;
        if($bayar['request3_id_paket']){
            $paket3 = $bayar['request3_id_paket'];   
        }

        $paket4 = null;
        if($bayar['request4_id_paket']){
            $paket4 = $bayar['request4_id_paket'];   
        }

        if($data['user']){
            if($data['user']['role_id'] == 1){
                $dataBayar = [
                    'is_active' => 1
                ];

                $this->Pembayaran_model->updateBayar($id_bayar, $dataBayar);
                $this->Tiket_model->insertTiket($bayar['id_user'], $paket1, $paket2, $paket3, $paket4);

                $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu pembayaran peserta telah disetujui!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin_pembayaran');
            }
        }
    }
}