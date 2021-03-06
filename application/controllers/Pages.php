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
        $this->load->model('Paket_model');
        $this->load->model('Faq_model');
        $this->load->model('Tiket_model');
        $this->load->model('Transaksi_model');
    }

    public function event($id_paket)
    {
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['modul'] = $this->Modul_model->getAllModul();
        $data['paket'] = $this->Paket_model->getAllPaket();
        $data['paketID'] = $this->Paket_model->getPaketById($id_paket);
        $data['event'] = $this->Event_model->getEventByIdPaket($id_paket);

        $data['judul'] = 'Amal Edukasi | Daftar Event ' . $data['paketID']['nama_paket'];

        $this->load->view('header/detail/user/detail_event', $data);
        $this->load->view('user/event/daftar_event');
        $this->load->view('footer/footer_user');
    }

    public function pembelajaran()
    {
        $data['judul'] = 'Amal Edukasi | Modul Pembelajaran';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['modul'] = $this->Modul_model->getAllModul();
        $data['paket'] = $this->Paket_model->getAllPaket();

        $this->load->view('header/header_user', $data);
        $this->load->view('user/pembelajaran/pembelajaran');
        $this->load->view('footer/footer_user');
    }

    public function cara_daftar()
    {
        $data['judul'] = 'Amal Edukasi | Cara Ikut Try Out';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['modul'] = $this->Modul_model->getAllModul();
        $data['paket'] = $this->Paket_model->getAllPaket();

        if($data['user']){
            if($data['user']['role_id'] == 3){
                $this->load->view('header/header_user', $data);
                $this->load->view('user/pembayaran/cara_daftar');
                $this->load->view('footer/footer_user');
            } else {
                redirect('admin');
            }
        } else {
            $this->load->view('header/header_user', $data);
            $this->load->view('user/pembayaran/cara_daftar');
            $this->load->view('footer/footer_user');
        }
    }

    public function upload_bukti()
    {
        $data['judul'] = 'Amal Edukasi | Upload Bukti Pembayaran';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['modul'] = $this->Modul_model->getAllModul();
        $data['paket'] = $this->Paket_model->getAllPaket();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == false) {
            if($data['user']){
                if($data['user']['role_id'] == 3){
                    $this->load->view('header/header_user', $data);
                    $this->load->view('user/pembayaran/upload_bayar');
                    $this->load->view('footer/footer_user');
                } else {
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('error','Silahkan login dulu!');
                redirect('home');
            }
        } else {
            $this->load->helper('file');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                if($this->input->post('optionPaket1') != "0"){
                    $paket1 = $this->input->post('optionPaket1');

                    $config['upload_path'] = './assets/pembayaran/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['overwrite'] = true;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                    } else {
                        $this->session->set_flashdata('error', 'File bukti transfer tidak sesuai ketentuan');
                        redirect('pages/upload_bukti');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Pilihan paket 1 tidak boleh kosong');
                    redirect('pages/upload_bukti');
                }
            } else{
                $this->session->set_flashdata('error', 'File bukti transfer tidak boleh kosong');
                redirect('pages/upload_bukti');
            }

            $paket2 = null;
            if($this->input->post('optionPaket2') != "0"){
                $paket2 = $this->input->post('optionPaket2');
            }

            $paket3 = null;
            if($this->input->post('optionPaket3') != "0"){
                $paket3 = $this->input->post('optionPaket3');
            }

            $paket4 = null;
            if($this->input->post('optionPaket4') != "0"){
                $paket4 = $this->input->post('optionPaket4');
            }

            $tampung = array(
                'id_user' => $data['user']['id'],
                'request1_id_paket' => $paket1,
                'request2_id_paket' => $paket2,
                'request3_id_paket' => $paket3,
                'request4_id_paket' => $paket4,
                'bukti_bayar' => $new_image,
                'is_active' => 0,
                'tgl_upload' => date_create('now')->format('Y-m-d H:i:s')
            );

            $this->db->insert('pembayaran_tiket', $tampung);
            $this->session->set_flashdata('success', 'Bukti Pembayaran berhasil terkirim! Silahkan menunggu konfirmasi kami');
            redirect($this->uri->uri_string());
        }
    }

    public function contact()
    {
        $data['judul'] = 'Amal Edukasi | Contact';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['paket'] = $this->Paket_model->getAllPaket();

        $this->form_validation->set_rules('email1', 'Email1', 'trim|required');
        $this->form_validation->set_rules('email2', 'Email2', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');

        //run validation on form input
        if ($this->form_validation->run() == FALSE)
        {
            //validation fails
            $this->load->view('header/header_user', $data);
            $this->load->view('user/contact');
            $this->load->view('footer/footer_user');
        }
        else
        {
            //get the form data
            $name = $user['name'];
            $from_email = $this->input->post('email1');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

            //set to_email id to which you want to receive mails
            $to_email = $this->input->post('email2');

            //configure email settings
            $config = array();
            $config['protocol'] = 'smtp';
            $config['smtp_crypto'] = 'ssl';
            $config['smtp_host'] = 'mail.sobatkode.com';
            $config['smtp_user'] = 'admin@sobatkode.com';
            $config['smtp_pass'] = 'Iws161jy21';
            $config['smtp_port'] = 465;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['mailtype'] = 'html';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            //$this->load->library('email', $config);
            $this->email->initialize($config);                        

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send())
            {
                // mail sent
                $this->session->set_flashdata('success','Pengiriman email ke admin berhasil terkirim');
                redirect('home');
            }
            else
            {
                //error
                $this->session->set_flashdata('error','Pengiriman email ke admin gagal terkirim');
                redirect('home');
            }
        }
    }

    public function faq()
    {
        $data['judul'] = 'Amal Edukasi | FAQ';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $user = $this->User_model->sessionUserMasuk($sessionUser);
        $data['paket'] = $this->Paket_model->getAllPaket();

        $data['faq'] = $this->Faq_model->getAllFaq();

        if($data['user']){
            if($user['role_id'] == 3){
                $this->load->view('header/header_user', $data);
                $this->load->view('user/faq');
                $this->load->view('footer/footer_user');
            } else{
                redirect('admin');
            }
        } else{
            $this->load->view('header/header_user', $data);
            $this->load->view('user/faq');
            $this->load->view('footer/footer_user');
        }
    }

    public function profil_saya()
    {
        $data['judul'] = 'Amal Edukasi | Profil Saya';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['tiket'] = $this->Tiket_model->getAllTiketByIdUser($data['user']['id']);
        $data['transaksi'] = $this->Transaksi_model->getTransaksiUser($data['user']['id']);
        $data['modul'] = $this->Modul_model->getAllModul();
        $data['total'] = 0;
        foreach($data['tiket'] as $tiket){
            $data['total'] = $data['total'] + $tiket['jmlh_tiket'];
        }

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
            $telepon = $this->input->post('telepon');
            $pendidikan = $this->input->post('pendidikan');
            $lokasi = $this->input->post('lokasi');
            $quotes = $this->input->post('quotes');

            $this->load->helper('file');

            $image = $this->db->select('image')->get_where('user', ['email' => $sessionUser])->row()->image;
            $upload_image = $_FILES['image']['name'];

            if ($image != "default.png") {
                if ($upload_image) {
                    $path = './assets/avatar/' . $image;
                    unlink($path);

                    $config['upload_path'] = './assets/avatar/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 2048;
                    $config['overwrite'] = true;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $this->session->set_flashdata('error', 'Maaf gambar tidak sesuai ketentuan');
                        redirect('pages/profil_saya');
                    }
                }
            } else {
                if ($upload_image) {
                    $config['upload_path'] = './assets/avatar/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 2048;
                    $config['overwrite'] = true;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $this->session->set_flashdata('error', 'Maaf gambar tidak sesuai ketentuan');
                        redirect('pages/profil_saya');
                    }
                }
            }
            $tampung = array(
                'name' => $name,
                'telepon' => $telepon,
                'riwayat_pendidikan' => $pendidikan,
                'lokasi' => $lokasi,
                'quotes' => $quotes
            );
            $this->db->where('email', $sessionUser);
            $this->db->update('user', $tampung);
            $this->session->set_flashdata('success', 'Perubahan profil berhasil disimpan');
            redirect($this->uri->uri_string());
        }
    }

    //Area Kirim Email
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

            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role_id');
            $this->session->set_flashdata('success', 'Silahkan cek email anda untuk ganti password');
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

        $emailUser = $this->session->userdata('email');
        $namaUserLupa = $this->db->select('name')->get_where('user', ['email' => $emailUser])->row()->name;

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
        $this->email->to($emailUser);

        $this->email->subject('Ganti Password Akun Amal Edukasi');
        $this->email->message('<h3>Halo ' . $namaUserLupa . '</h3> <br> Silahkan klik link dibawah ini untuk mengganti password akun anda: <br><a href="' . base_url() . 'pages/ganti_password?email=' . $emailUser . '&token=' . urlencode($token) . '">Ganti Password</a>');

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
