<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_modul extends CI_Controller
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
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['modul'] = $this->Modul_model->getAllModul();

        $data['judul'] = 'Amal Edukasi | Daftar Modul';
        $this->load->view('Super_Admin/templates/header_admin', $data);
        $this->load->view('Super_Admin/modul/daftar_modul');
    }

    public function tambah_modul()
    {
        $data['judul'] = 'AORTASTAN Try Out Online | Tambah Modul';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['topik'] = $this->Topik_model->getAllTopik();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('jenisModul', 'JenisModul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('Super_Admin/templates/header_admin', $data);
            $this->load->view('Super_Admin/modul/tambah_modul', $data);
        } else {
            $judul = $this->input->post('judul');
            $jenisModul = $this->input->post('jenisModul');
            $deskripsi = $this->input->post('deskripsi');

            $upload_file = $_FILES['file']['name'];

            if ($upload_file) {
                $config['upload_path'] = './assets/file/';
                $config['allowed_types'] = 'mp4, mkv, avi';
                $config['max_size'] = 51200;
                $config['overwrite'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $new_file = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12" role="alert"><strong>Maaf file gagal diupload! Pastikan ukuran dan format file sesuai.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('admin_modul');
                }
            }

            $tampungData = array(
                'judul_modul' => $judul,
                'deskripsi' => $deskripsi,
                'jenis' => $jenisModul,
                'file' => $new_file
            );

            $this->db->insert('modul', $tampungData);
            $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu Modul berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin_modul');
        }
    }

    public function hapus_modul($id)
    {
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['event'] = $this->Modul_model->getAllModul();

        $this->load->helper('file');

        $file_name = $this->db->select('file')->get_where('modul', ['id_modul' => $id])->row()->file;
        $path = './assets/file/' . $file_name;
        unlink($path);

        $this->Modul_model->deleteModul($id);

        redirect('admin_modul');
    }

    public function lihat_modul($id_modul)
    {
        $data['judul'] = 'Amal Edukasi | Lihat Modul';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $modul = $this->Modul_model->getModulById($id_modul);

        $tofile = realpath("assets/file/" . $modul);
        header('Content-Type: application/pdf');
        readfile($tofile);
    }
}
