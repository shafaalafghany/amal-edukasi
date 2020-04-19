<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Modul_model');
        $this->load->model('Topik_model');
        $this->load->model('User_model');
        $this->load->model('Rule_topik_model');
        $this->load->model('Soal_model');
        $this->load->model('Kerjakan_model');
        $this->load->model('Hasil_tes_model', 'hasil');
    }

    public function login()
    {
        //Membuat rules untuk form
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Try Out Online';

            $this->load->view('home', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        //cek inputan
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            //jika user active
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    //cek role_id
                    if ($user['role_id'] < 3) {
                        // redirect('Administrator');
                    } else {
                        redirect('Home');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf password yang dimasukkan salah!</div>');
                    redirect('Home');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf email belum terverifikasi! Silahkan cek email anda untuk verifikasi.</div>');
                redirect('Home');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf akun belum terdaftar!</div>');
            redirect('Home');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        redirect('Home');
    }

    public function registration()
    {
        //Membuat rules untuk form
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama !',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Try Out Online';
            $this->load->view('Home', $data);
        } else {
            //Ambil data dari form input
            $email = $this->input->post('email', true);
            $datauser = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.png',
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'tentang' => 'Aku adalah seorang pejuang !',
                'role_id' => 3,
                'is_active' => 0,
                'date_created' => date_create('now')->format('Y-m-d')
            ];

            //Menyiapkan token untuk verifikasi
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            //Memasukkan data ke database user dan user_token
            $this->db->insert('user', $datauser);
            $this->db->insert('user_token', $user_token);

            $result = $this->_sendEmail($token, 'verify');

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dibuat! Silahkan cek email anda untuk verifikasi akun <b>dalam 24 jam</b>. Jika tidak ada pada inbox anda coba cek pada spam.</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dibuat! Silahkan cek email anda untuk verifikasi akun. Jika tidak ada pada inbox anda coba cek pada spam. Jika dalam 1 jam tidak ada email verifikasi akun silahkan kontak admin dengan menyertakan email anda.</div>');
            }

            redirect('Home');
        }
    }

    private function _sendEmail($token, $type)
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

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('<h3>Halo ' . $namaUserLupa . '</h3> <br> Silahkan klik link dibawah ini untuk verifikasi akun anda: <br><a href="' . base_url() . 'User/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('<h3>Halo ' . $namaUserLupa . '</h3> <br> Silahkan klik link dibawah ini untuk merubah password akun anda: <br><a href="' . base_url() . 'User/forgotPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            // echo $this->email->print_debugger();
            // die;
            return false;
        }
    }

    public function verify()
    {
        //Ambil parameter dari link verifikasi
        $email = $this->input->get('email');
        $token =  $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //Cek apakah user ada
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            //Cek apakah token user valid
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email ' . $email . ' telah aktif! Silahkan login</div>');
                    redirect('Home');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf aktifasi akun gagal! Token user kadaluarsa. Silahkan daftarkan kembali akun anda.</div>');
                    redirect('Home');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf aktifasi akun gagal! Token user salah.</div>');
                redirect('Home');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf aktifasi akun gagal! Email salah.</div>');
            redirect('Home');
        }
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Try Out Online | Forgot Password';
            $this->load->view('User/forgot_password', $data);
        } else {
            $email = $this->input->post('email', true);
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            //Cek apakah user aktif
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil! Silahkan cek email anda untuk ganti password</div>');
                redirect('Auth/forgot_password');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum verifikasi atau tidak terdaftar</div>');
                redirect('Auth/forgot_password');
            }
        }
    }

    public function forgotPassword()
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
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf ganti password gagal! Token user salah.</div>');
                redirect('Auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf ganti password gagal! Email salah.</div>');
            redirect('Auth/login');
        }
    }

    public function changePassword()
    {
        //Membuat rules untuk form
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Minimal password terdiri dari 8 karakter',
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[8]|matches[password1]');

        if (!$this->session->userdata('reset_email')) {
            redirect('Auth/login');
        }

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Try Out Online | Change Password';

            $this->load->view('User/change_password', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil dirubah! Silahkan login.</div>');
            redirect('User/login');
        }
    }
}
