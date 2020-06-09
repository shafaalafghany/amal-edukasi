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
        $this->load->model('Topik_model');
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
            $data['hasil_tsa'] = $this->hasil->getHasilTsaByIdAndEvent($user['id'], $id_event);
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

    public function proses_leader($id, $id_paket, $id_event)
    {
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $transaksi = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $topik_tpa = $this->Topik_model->getTopikTPA();
        $topik_tbi = $this->Topik_model->getTopikTBI();
        $topik_twk = $this->Topik_model->getTwk();
        $topik_tiu = $this->Topik_model->getTiu();
        $topik_tkp = $this->Topik_model->getTkp();
        $topik_skd = $this->Topik_model->getTopikSKD();

        if ($transaksi) {
            $tpa = $this->hasil->getHasilTpaByIdAndEvent($id, $id_event);
            $tbi = $this->hasil->getHasilTbiByIdAndEvent($id, $id_event);
            $twk = $this->hasil->getHasilTwkByIdAndEvent($id, $id_event);
            $tiu = $this->hasil->getHasilTiuByIdAndEvent($id, $id_event);
            $tkp = $this->hasil->getHasilTkpByIdAndEvent($id, $id_event);
            
            $nilai_tpa = $tpa['hasil'];
            $nilai_tbi = $tbi['hasil'];
            $nilai_twk = $twk['hasil'];
            $nilai_tiu = $tiu['hasil'];
            $nilai_tkp = $tkp['hasil'];

            if ($tpa == null) {
                $nilai_tpa = 0;
            }

            if ($tbi == null) {
                $nilai_tbi = 0;
            }

            if ($twk == null) {
                $nilai_twk = 0;
            }

            if ($tiu == null) {
                $nilai_tiu = 0;
            }

            if ($tkp == null) {
                $nilai_tkp = 0;
            }

            $skd = $nilai_twk + $nilai_tiu + $nilai_tkp;
            $total = $nilai_tpa + $nilai_tbi + $skd;

            $status = '';
            if ($tpa['hasil'] >= $topik_tpa['ambang_score'] && $tbi['hasil'] >= $topik_tbi['ambang_score'] && 
            $twk['hasil'] >= $topik_twk['ambang_score'] && $tiu['hasil'] >= $topik_tiu['ambang_score'] && 
            $tkp['hasil'] >= $topik_tkp['ambang_score'] && $skd >= $topik_skd['ambang_score']) {
                $status = 'LULUS';
            } else {
                $status = 'TIDAK LULUS';
            }

            $data_leader = [
                'id_user' => $id,
                'id_paket' => $id_paket,
                'id_event' => $id_event,
                'nilai_tpa' => $nilai_tpa,
                'nilai_tbi' => $nilai_tbi,
                'nilai_twk' => $nilai_twk,
                'nilai_tiu' => $nilai_tiu,
                'nilai_tkp' => $nilai_tkp,
                'nilai_skd' => $skd,
                'nilai_total' => $total,
                'status' => $status
            ];
            $this->hasil->insertLeader($data_leader);

            $getEventJawaban = $this->db->get_where('event_jawaban', [
                'id_user' => $id,
                'id_event' => $id_event
            ])->result_array();

            if ($getEventJawaban) {
                $this->db->where('id_user', $id);
                $this->db->where('id_event', $id_event);
                $this->db->delete('event_jawaban');
            }

            redirect('detail/leaderboard/' . $id . '/' . $id_paket . '/' . $id_event);
        } else{
            redirect('detail/leaderboard/' . $id . '/' . $id_paket . '/' . $id_event);
        }
    }

    public function open_pembahasan($id_event)
    {
        $data['judul'] = 'AORTASTAN Try Out Online | Pembahasan';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $pmbhsnName = $this->db->select('pembahasan')->get_where('event', ['id_event' => $id_event])->row()->pembahasan;

        $tofile = realpath("assets/filePembahasan/" . $pmbhsnName);
        header('Content-Type: application/pdf');
        readfile($tofile);
    }

    public function leaderboard($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Leaderboard';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $data['leader'] = $this->hasil->getLeaderboardByEvent($id_event);
        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['hasilUser'] = $this->hasil->getLeaderboardByIdAndEvent($id, $id_event);
        $hasil_tes = $this->hasil->getHasilByIdAndEvent($id, $id_event);
        $transaksi = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $cekAkhir = $this->db->select('tgl_akhir')->get_where('event', ['id_event' => $id_event])->row()->tgl_akhir;
        $waktuSekarang = date("Y-m-d");
        $leaderEvent = $this->hasil->getLeaderboardByIdAndEvent($id, $id_event);
        $data['paket'] = $this->Paket_model->getAllPaket();
        $data['paket_id'] = $this->Paket_model->getPaketById($id_paket);
        if ($data['user']) {
            if($data['user']['role_id'] == 3){
                if ($data['user']['id'] == $id) {
                    if ($transaksi) {
                        if ($leaderEvent) {
                            $this->load->view('header/detail/user/detail_event', $data);
                            $this->load->view('user/leaderboard');
                            $this->load->view('footer/footer_user');
                        } else {
                            $this->session->set_flashdata('error', 'Hasil kamu tidak ditemukan! Pastikan kamu sudah melakukan semua tes.');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        }
                    } else {
                        if ($waktuSekarang >= $cekAkhir) {
                            $this->load->view('header/detail/user/detail_event', $data);
                            $this->load->view('user/leaderboard');
                            $this->load->view('footer/footer_user');
                        } else {
                            $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        }
                    }
                } else {
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } elseif($data['user']['role_id'] == 1){
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }
}
