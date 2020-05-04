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

    public function daftar_modul()
    {
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['modul'] = $this->Modul_model->getAllModul();
        $user = $this->User_model->sessionUserMasuk($sessionUser);

        $data['judul'] = 'Amal Edukasi | Daftar Modul';

        if ($data['user']) {
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/modul/daftar_modul');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function tambah_modul()
    {
        $data['judul'] = 'AORTASTAN Try Out Online | Tambah Modul';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['topik'] = $this->Topik_model->getAllTopik();
        $user = $this->User_model->sessionUserMasuk($sessionUser);

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
            'required' => 'Judul tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('jenisModul', 'JenisModul', 'required|trim', [
            'required' => 'Jenis modul tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
            'required' => 'Deskripsi tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('subjudul1', 'Subjudul1', 'required|trim', [
            'required' => 'Sub judul video (bagian 1) tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('subdesk1', 'Subdesk1', 'required|trim', [
            'required' => 'Sub deskripsi video (bagian 1) tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('subjudul2', 'Subjudul2', 'trim');
        $this->form_validation->set_rules('subdesk2', 'Subdesk2', 'trim');
        $this->form_validation->set_rules('subjudul3', 'Subjudul3', 'trim');
        $this->form_validation->set_rules('subdesk3', 'Subdesk3', 'trim');

        if ($this->form_validation->run() == false) {
            if ($data['user']) {
                if ($user['role_id'] == 1) {
                    $this->load->view('header/header_admin', $data);
                    $this->load->view('admin/modul/tambah_modul', $data);
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
            $jenisModul = $this->input->post('jenisModul');
            $deskripsi = $this->input->post('deskripsi');
            $upload_video = $_FILES['filevideo']['name'];
            $upload_thumbnail = $_FILES['filethumbnail']['name'];
            $subjudul1 = $this->input->post('subjudul1');
            $subdesk1 = $this->input->post('subdesk1');
            $subjudul2 = $this->input->post('subjudul2');
            $subdesk2 = $this->input->post('subdesk2');
            $subjudul3 = $this->input->post('subjudul3');
            $subdesk3 = $this->input->post('subdesk3');

            //Ambil data file video dan thumbnail
            if ($upload_video && $upload_thumbnail) {
                $result = $this->_uploadVideo();

                if ($result == true) {
                    $new_video = $this->upload->data('file_name');
                    $this->db->set('video', $new_video);
                } else {
                    //$this->session->set_flashdata('message1', $this->upload->display_errors());
                    $this->session->set_flashdata('message1', '<div class="alert alert-danger col-md-12" role="alert"><strong>Maaf file video gagal diupload! Pastikan ukuran dan format file sesuai.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('admin_modul/tambah_modul');
                }

                $hasil = $this->_uploadThumbnail();

                if ($hasil) {
                    $new_thumbnail = $this->upload->data('file_name');
                    $this->db->set('thumbnail', $new_thumbnail);
                } else {
                    $this->session->set_flashdata('message2', '<div class="alert alert-danger col-md-12" role="alert"><strong>Maaf file thumbnail gagal diupload! Pastikan ukuran dan format file sesuai.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('admin_modul/tambah_modul');
                }
            } else {
                if(!$upload_video) {
                    $this->session->set_flashdata('message1', '<div class="alert alert-danger col-md-12" role="alert"><strong>File video harus diisi!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
                if(!$upload_thumbnail) {
                    $this->session->set_flashdata('message2', '<div class="alert alert-danger col-md-12" role="alert"><strong>File thumbnail harus diisi!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
                redirect('admin_modul/tambah_modul');
            }

            //data data tersebut dimasukkan ke dalam array
            $data = array(
                'judul_modul' => $judul,
                'jenis' => $jenisModul,
                'deskripsi' => $deskripsi,
                'subjudul1' => $subjudul1,
                'subdesk1' => $subdesk1,
                'subjudul2' => $subjudul2,
                'subdesk2' => $subdesk2,
                'subjudul3' => $subjudul3,
                'subdesk3' => $subdesk3
            );

            // $this->db->insert('modul', $data);
            $this->Modul_model->insertModul($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu Modul berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin_modul/daftar_modul');
        }
    }

    private function _uploadVideo()
    {
        $config_video['upload_path'] = './assets/modul/video/';
        $config_video['allowed_types'] = 'avi|mp4|mov';
        $config_video['max_size'] = 512000;
        $config_video['overwrite'] = true;

        $this->load->library('upload', $config_video);

        if ($this->upload->do_upload('filevideo')) {
            return true;
        } else {
            return false;
        }
    }

    private function _uploadThumbnail()
    {
        $this->load->library('upload');

        $config_thumbnail['upload_path'] = './assets/modul/thumbnail/';
        $config_thumbnail['allowed_types'] = 'jpg|png|jpeg';
        $config_thumbnail['max_size'] = 2048;
        $config_thumbnail['overwrite'] = true;

        $this->upload->initialize($config_thumbnail);

        if ($this->upload->do_upload('filethumbnail')) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus_modul($id)
    {
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['event'] = $this->Modul_model->getAllModul();

        $this->load->helper('file');

        //hapus file video berdasarkan id
        $file_video = $this->db->select('video')->get_where('modul', ['id_modul' => $id])->row()->video;
        $video = './assets/modul/video/' . $file_video;
        unlink($video);

        //hapus file thumbnail berdasarkan id
        $file_thumbnail = $this->db->select('thumbnail')->get_where('modul', ['id_modul' => $id])->row()->thumbnail;
        $thumbnail = './assets/modul/thumbnail/' . $file_thumbnail;
        unlink($thumbnail);

        $this->Modul_model->deleteModul($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu Modul berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin_modul/daftar_modul');
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
                $this->load->view('header/header_detail_admin', $data);
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
