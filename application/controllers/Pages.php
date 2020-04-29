<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Modul_model');
        $this->load->model('User_model');
    }

    public function pembelajaran()
    {
        $data['judul'] = 'Amal Edukasi | Modul Pembelajaran';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $this->load->view('User/header/header_pembelajaran', $data);
        $this->load->view('User/pembelajaran/pembelajaran');
        $this->load->view('User/footer/footer');
    }

    public function contact()
    {
        $data['judul'] = 'Amal Edukasi | Contact';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $this->load->view('User/header/header_contact', $data);
        $this->load->view('User/contact');
        $this->load->view('User/footer/footer');
    }

    public function profil_saya()
    {
        $data['judul'] = 'Amal Edukasi | Profil Saya';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        /* $id_user = $this->User_model->getIdUserByUsername($sessionUser);
        $data['transaksi'] = $this->db->get_where('transaksi_user', ['id_user' => $id_user])->result_array();
        $data['modul'] = $this->Modul_model->getAllModul(); */

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            if ($data['user']) {
                $this->load->view('user/profil', $data);
            } else {
                $this->session->set_flashdata('error', 'Maaf kamu belum login! Silahkan login dulu.');
                redirect('home');
            }
        } else {
            $name = $this->input->post('name');
            $tentang = $this->input->post('tentang');
            $username = $this->input->post('username');

            $this->load->helper('file');

            $image = $this->db->select('image')->get_where('user', ['username' => $username])->row()->image;

            if ($image != "default.png") {
                $path = './assets/img/profile/' . $image;
                unlink($path);

                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['upload_path'] = './assets/img/profile/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 2048;
                    $config['overwrite'] = true;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-10" style="margin-left: 8%;" role="alert"><strong>Maaf gambar tidak sesuai ketentuan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/profile_saya');
                    }
                }
            } else {
                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['upload_path'] = './assets/img/profile/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 2048;
                    $config['overwrite'] = true;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-10" style="margin-left: 8%;" role="alert"><strong>Maaf gambar tidak sesuai ketentuan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/profile_saya');
                    }
                }
            }
            $tampung = array(
                'name' => $name,
                'tentang' => $tentang
            );
            $this->db->where('username', $username);
            $this->db->update('user', $tampung);
            $this->session->set_flashdata('message', '<div class="alert alert-success col-md-10" style="margin-left: 8%;" role="alert"><strong>Perubahan profile berhasil disimpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($this->uri->uri_string());
        }
    }

    //Area Kirim Email
    public function tes()
    {
        $sessionUser = $this->session->userdata('email');
        var_dump($sessionUser);
    }

    public function lupa_password()
    {
        $emailUser = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $emailUser, 'is_active' => 1])->row_array();

        //Cek apakah user aktif
        if ($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $emailUser,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token);

            $this->session->set_flashdata('success', 'Silahkan cek email anda untuk ganti password');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role_id');
            $this->session->set_flashdata('success', 'Anda telah logout');
            redirect('home');
            redirect('home');
        } else {
            $this->session->set_flashdata('error', 'Email belum verifikasi atau tidak terdaftar');
            redirect('home');
        }
    }

    private function _sendEmail($token)
    {
        //Import library email
        $this->load->library('email');

        $emailLupa = $this->input->post('email');
        $namaUserLupa = $this->db->select('name')->get_where('user', ['email' => $emailLupa])->row()->name;

        //Menyiapkan settingan untuk email
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_crypto'] = 'ssl';
        $config['smtp_host'] = 'mail.sobatkode.com';
        $config['smtp_user'] = 'admin@sobatkode.com';
        $config['smtp_pass'] = 'Iws161jy21';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from('admin@sobatkode.com', 'Sobatkode.com');
        $this->email->to($this->input->post('email'));

        $this->email->subject('Ganti Password Akun Amal Edukasi');
        $this->email->message('<h3>Halo ' . $namaUserLupa . '</h3> <br> Silahkan klik link dibawah ini untuk mengganti password akun anda: <br><a href="' . base_url() . 'pages/ganti_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Ganti Password</a>');

        if ($this->email->send()) {
            return true;
        } else {
            // echo $this->email->print_debugger();
            // die;
            return false;
        }
    }

    public function ganti_password()
    {
        //Ambil parameter dari link verifikasi
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //Cek apakah user terdaftar
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            //Cek apakah token user valid
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->change_password();
            } else {
                $this->session->set_flashdata('error', 'Maaf ganti password gagal! Token user salah.');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf ganti password gagal! Email salah.');
            redirect('home');
        }
    }

    public function change_password()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('home');
        }

        //Membuat rules untuk form
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Minimal password terdiri dari 6 karakter',
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[6]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Amal Edukasi | Merubah Password';

            $this->load->view('auth/ganti_password', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('success', 'Password berhasil dirubah! Silahkan login kembali.');
            redirect('home');
        }
    }
}
