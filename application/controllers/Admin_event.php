<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');;
        $this->load->model('User_model');
        $this->load->model('Paket_model');
        $this->load->model('Event_model');
    }

    public function pilih_paket()
    {
        $data['judul'] = 'Amal Edukasi | Daftar Event';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['paket'] = $this->Paket_model->getAllPaket();

        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/event/pilih_paket');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function daftar_event()
    {
        $data['judul'] = 'Amal Edukasi | Daftar Event';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);

        $id_paket = $this->input->post('optionPaket');
        $data['event'] = $this->Event_model->getEventByIdPaket($id_paket);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        //Cek apakah user sudah login
        if ($data['user']) {
            //Cek apakah user adalah admin
            if ($user['role_id'] == 1) {
                $this->load->view('header/header_admin', $data);
                $this->load->view('admin/event/daftar_event');
            } else {
                $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
            redirect('home');
        }
    }

    public function tambah_event()
    {
        $data['judul'] = 'Amal Edukasi | Tambah Event Tryout';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['paket'] = $this->Paket_model->getAllPaket();

        $this->form_validation->set_rules('event', 'event', 'required|trim', [
            'required' => 'Event tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
            'required' => 'Deskripsi tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('optionPaket', 'optionPaket', 'required|trim', [
            'required' => 'Paket tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('mulai', 'Mulai', 'required|trim', [
            'required' => 'Tanggal awal tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('akhir', 'Akhir', 'required|trim', [
            'required' => 'Tanggal akhir tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            //Cek apakah user sudah login
            if ($data['user']) {
                //Cek apakah user adalah admin
                if ($user['role_id'] == 1) {
                    $this->load->view('header/header_admin', $data);
                    $this->load->view('admin/event/tambah_event');
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
            $judul = $this->input->post('event');
            $deskripsi = $this->input->post('deskripsi');
            $paket = $this->input->post('optionPaket');
            $mulai = $this->input->post('mulai');
            $akhir = $this->input->post('akhir');

            //Masukkan data ke array
            $data = [
                'id_paket' => $paket,
                'nama_event' => $judul,
                'deskripsi' => $deskripsi,
                'tgl_mulai' => $mulai,
                'tgl_akhir' => $akhir
            ];

            //Insert data ke database
            $res = $this->Event_model->insertEvent($data);
            if ($res) {
                $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu event berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin_event/pilih_paket');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12" role="alert"><strong>Satu event gagal ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin_event/pilih_paket');
            }
        }
    }

    public function edit_event($id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Edit Event Tryout';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $data['event'] = $this->Event_model->getEventById($id_event);

        $this->form_validation->set_rules('event', 'event', 'required|trim', [
            'required' => 'Event tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
            'required' => 'Deskripsi tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('mulai', 'Mulai', 'required|trim', [
            'required' => 'Tanggal awal tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('akhir', 'Akhir', 'required|trim', [
            'required' => 'Tanggal akhir tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            //Cek apakah user sudah login
            if ($data['user']) {
                //Cek apakah user adalah admin
                if ($user['role_id'] == 1) {
                    $this->load->view('header/detail/detail_event_admin', $data);
                    $this->load->view('admin/event/edit_event');
                } else {
                    $this->session->set_flashdata('error', 'Maaf anda bukan admin Amal Edukasi!');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('error', 'Maaf anda belum login! Silahkan login dulu.');
                redirect('home');
            }
        } else {
            $this->load->helper('file');

            //Ambil data dari form
            $event = $this->input->post('event');
            $deskripsi = $this->input->post('deskripsi');
            $mulai = $this->input->post('mulai');
            $akhir = $this->input->post('akhir');

            $upload_file = $_FILES['file']['name'];

            if ($upload_file) {
                $config['upload_path'] = './assets/pembahasan/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 51200;
                $config['overwrite'] = true;
    
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('file')) {
                    $new_file = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12" role="alert"><strong>Maaf file gagal diupload! Pastikan ukuran dan format file sesuai.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('admin_event/daftar_event');
                }

                if ($data['event']['pembahasan']) {
                    $path = './assets/filePembahasan/' . $data['event']['pembahasan'] ;
                    unlink($path);
                }

                //Masukkan data ke array
                $data = [
                    'nama_event' => $event,
                    'deskripsi' => $deskripsi,
                    'tgl_mulai' => $mulai,
                    'tgl_akhir' => $akhir,
                    'pembahasan' => $new_file
                ];
            } else {
                $data = [
                    'nama_event' => $event,
                    'deskripsi' => $deskripsi,
                    'tgl_mulai' => $mulai,
                    'tgl_akhir' => $akhir
                ];
            }

            //Insert data ke database
            $res = $this->Event_model->updateEvent($id_event, $data);
            if ($res) {
                $this->session->set_flashdata('message', '<div class="alert alert-success col-md-12" role="alert"><strong>Satu event berhasil diperbarui!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin_event/pilih_paket');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12" role="alert"><strong>Satu event gagal diperbarui!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin_event/pilih_paket');
            }
        }
    }

    public function hapus_event($id)
    {
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['event'] = $this->Event_model->getAllEvent();

        $this->Event_model->deleteEvent($id);
        redirect('admin_event/pilih_paket');
    }
}
