<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tryout extends CI_Controller
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

    public function index()
    {
        $data['judul'] = 'Try Out Online | Tryout';

        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getAllEvent();

        $this->load->view('User/templates/header_tryout', $data);
        $this->load->view('User/tryout', $data);
        $this->load->view('User/templates/footer');
    }

    public function event($id_event)
    {
        $data['judul'] = 'Try Out Online | Event Detail';

        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik_tpa'] = $this->Topik_model->getTopikTPA();
        $data['topik_tbi'] = $this->Topik_model->getTopikTBI();
        $data['topik_skd'] = $this->Topik_model->getTopikSKD();
        $data['topik_psiko'] = $this->Topik_model->getTopikPsiko();
        $data['soalPsiko'] = $this->Soal_model->getSoalPsikoByEvent($id_event);

        if ($data['user']) {
            $id_user = $this->db->select('id')->get_where('user', ['username' => $sessionUser])->row()->id;

            $data['leader'] = $this->hasil->getLeaderboardByIdAndEvent($id_user, $id_event);
        }

        $this->load->view('User/templates/header_tryout', $data);
        $this->load->view('User/event_detail', $data);
        $this->load->view('User/templates/footer');
    }

    public function tes_tpa($id, $id_event)
    {
        $data['judul'] = 'AORTASTAN Try Out Online | Tes TPA';

        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik_tpa'] = $this->Topik_model->getTopikTPA();
        $data['topik_rule_tpa'] = $this->Topik_model->getRuleTopikTPA();

        $id_topik = $this->Topik_model->getIdTopikTPA();
        $topik_rule = $this->Topik_model->getRuleTopikTPA();

        $harga = $this->Event_model->getHargaEvent($id_event);
        $point = $this->db->select('point')->get_where('user', ['role_id' => 3, 'username' => $sessionUser])->row()->point;

        if ($point < $harga) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Maaf point anda tidak mencukupi untuk ikut dalam event! Silahkan top up point dulu.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/tryout');
        } else {
            $bayar = $point - $harga;

            $tampungBayar = array('point' => $bayar);
            $this->User_model->updatePointUserByUsername($sessionUser, $tampungBayar);
        }

        $tgl_transaksi = date_create('now')->format('Y-m-d H:i:s');

        $dataTransaksiUser = [
            'id_user' => $id,
            'id_event' => $id_event,
            'tgl_transaksi' => $tgl_transaksi
        ];
        $this->db->insert('transaksi_user', $dataTransaksiUser);

        redirect('User/pilih_jurusan/' . $id . '/' . $id_event);
    }

    public function pilih_jurusan($id, $id_event)
    {
        $data['judul'] = 'AORTASTAN Try Out Online | Pilih Jurusan';

        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik_tpa'] = $this->Topik_model->getTopikTPA();
        $data['topik_rule_tpa'] = $this->Topik_model->getRuleTopikTPA();
        $data['transaksiUser'] = $this->db->get_where('transaksi_user', [
            'id_user' => $id,
            'id_event' => $id_event
        ])->row_array();

        $id_topik = $this->Topik_model->getIdTopikTPA();
        $topik_rule = $this->Topik_model->getRuleTopikTPA();

        $this->load->view('User/templates/header_tryout', $data);
        $this->load->view('User/pilih_jurusan', $data);
        $this->load->view('User/templates/footer');
    }

    public function proses_jurusan($id, $id_event)
    {
        $data['judul'] = 'AORTASTAN Try Out Online | Tes TPA';

        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $id_topik = $this->Topik_model->getIdTopikTPA();

        $id_transaksi = $this->db->select('id_transaksi')->get_where('transaksi_user', [
            'id_user' => $id,
            'id_event' => $id_event
        ])->row()->id_transaksi;

        $jurusan1 = $this->input->post('optionJurusan1');
        $jurusan2 = $this->input->post('optionJurusan2');
        $jurusan3 = $this->input->post('optionJurusan3');

        if ($jurusan1 != "0") {
            if ($jurusan2 != "0") {
                if ($jurusan3 != "0") {
                    $dataJurusan = [
                        'jurusan1' => $jurusan1,
                        'jurusan2' => $jurusan2,
                        'jurusan3' => $jurusan3
                    ];
                } else {
                    $dataJurusan = [
                        'jurusan1' => $jurusan1,
                        'jurusan2' => $jurusan2
                    ];
                }
            } else {
                if ($jurusan3 != "0") {
                    $dataJurusan = [
                        'jurusan1' => $jurusan1,
                        'jurusan3' => $jurusan3
                    ];
                } else {
                    $dataJurusan = [
                        'jurusan1' => $jurusan1
                    ];
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Pilihan pertama tidak boleh kosong!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/pilih_jurusan/' . $id . '/' . $id_event);
        }

        $this->db->where('id_transaksi', $id_transaksi)->update('transaksi_user', $dataJurusan);
        redirect('User/tes_detail/' . $id . '/' . $id_event . '/' . $id_topik);
    }

    public function tes_tbi($id, $id_event)
    {
        $data['judul'] = 'AORTASTAN Try Out Online | Tes TPA';

        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $id_topik = $this->Topik_model->getIdTopikTBI();
        $topik_rule = $this->Topik_model->getRuleTopikTBI();

        redirect('User/tes_detail/' . $id . '/' . $id_event . '/' . $id_topik);
    }

    public function tes_skd($id, $id_event)
    {
        $data['judul'] = 'AORTASTAN Try Out Online | Tes TPA';

        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $id_topik = $this->Topik_model->getIdTopikTBI();
        $topik_rule = $this->Topik_model->getRuleTopikTBI();

        redirect('User/tes_skd_detail/' . $id . '/' . $id_event);
    }

    public function tes_skd_detail($id, $id_event)
    {
        $nama = $this->Topik_model->getNamaTopikSKD();

        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $hasil_tes = $this->hasil->getHasilByIdAndEvent($id, $id_event);
        $transaksi = $this->db->get_where('transaksi_user', [
            'id_user' => $id,
            'id_event' => $id_event
        ])->row_array();
        $userID = $this->User_model->getIdUserByUsername($sessionUser);
        if ($sessionUser) {
            if ($id == $userID) {
                if ($transaksi) {
                    if (count($hasil_tes) == 2) {
                        $data['event'] = $this->Event_model->getEventById($id_event);
                        $data['klmpk_skd'] = $this->Topik_model->getKlmpkSKD();
                        $data['klmpk_rule_skd'] = $this->Topik_model->getRuleTopikSKD();
                        $data['topik_skd'] = $this->Topik_model->getTopikSKD();

                        $data['judul'] = 'AORTASTAN Try Out Online | ' . $nama;

                        $this->load->view('User/templates/header_tes', $data);
                        $this->load->view('User/tes_skd', $data);
                        $this->load->view('User/templates/footer_tes');
                    } elseif (count($hasil_tes) < 2) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Selesaikan dulu tes TPA dan TBI</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/tryout');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda sudah melakukan tes ini</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/tryout');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda belum terdaftar di event ini!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('User/tryout');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda tidak memiliki akses untuk kesana!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('User/tryout');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Silahkan login dulu!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/login');
        }
    }

    public function kerjakan_skd($id, $id_event, $id_topik)
    {
        $nama = $this->Topik_model->getNamaTopikById($id_topik);
        $data['judul'] = 'AORTASTAN Try Out Online | ' . $nama;
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $hasil_tes = $this->hasil->getHasilByIdAndEvent($id, $id_event);
        $transaksi = $this->db->get_where('transaksi_user', [
            'id_user' => $id,
            'id_event' => $id_event
        ])->row_array();
        $userID = $this->User_model->getIdUserByUsername($sessionUser);
        if ($sessionUser) {
            if ($id == $userID) {
                if ($transaksi) {
                    if (count($hasil_tes) == 2) {
                        $data['event'] = $this->Event_model->getEventById($id_event);
                        $data['topik'] = $this->Topik_model->getTopikSKD();
                        $data['topik_rule'] = $this->Topik_model->getRuleTopikSKD();
                        $data['soal'] = $this->Soal_model->getSoalSKDbyId($id_event, $id_topik);
                        $data['soal1'] = $this->Soal_model->getSoalSKDbyIdLimit1($id_event, $id_topik);
                        $data['soal2'] = $this->Soal_model->getSoalSKDbyIdLimit2($id_event, $id_topik);
                        $data['soal3'] = $this->Soal_model->getSoalSKDbyIdLimit3($id_event, $id_topik);
                        $data['soal4'] = $this->Soal_model->getSoalSKDbyIdLimit4($id_event, $id_topik);
                        $data['soal5'] = $this->Soal_model->getSoalSKDbyIdLimit5($id_event, $id_topik);

                        $waktudaftar = time();

                        $dataTransaksi = [
                            'id_topik' => $id_topik,
                            'id_event' => $id_event,
                            'id_user' => $id,
                            'waktu_daftar' => $waktudaftar
                        ];
                        $this->Kerjakan_model->sessionKerjakan($dataTransaksi);

                        $this->session->unset_userdata('id_event');
                        $this->session->unset_userdata('id_topik');
                        $this->session->unset_userdata('id_user');
                        $this->session->unset_userdata('waktu_daftar');

                        $data['transaksi'] = $this->Kerjakan_model->getKerjakan($id_event, $id_topik, $id);

                        $this->load->view('User/templates/header_tes', $data);
                        $this->load->view('User/tes/kerjakan_skd', $data);
                        $this->load->view('User/templates/footer_tes');
                    } elseif (count($hasil_tes) < 2) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Selesaikan dulu tes TPA dan TBI</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/tryout');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda sudah melakukan tes ini</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/tryout');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda belum terdaftar di event ini!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('User/tryout');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda tidak memiliki akses untuk kesana!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('User/tryout');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Silahkan login dulu!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/login');
        }
    }

    public function tes_detail($id, $id_event, $id_topik)
    {
        $nama = $this->Topik_model->getNamaTopikById($id_topik);

        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $hasil_tes = $this->hasil->getHasilByIdAndEvent($id, $id_event);
        $transaksi = $this->db->get_where('transaksi_user', [
            'id_user' => $id,
            'id_event' => $id_event
        ])->row_array();
        $userID = $this->User_model->getIdUserByUsername($sessionUser);
        if ($sessionUser) {
            if ($id == $userID) {
                if ($transaksi) {
                    if (count($hasil_tes) == null) {
                        if ($id_topik == 1) {
                            $data['event'] = $this->Event_model->getEventById($id_event);
                            $data['topik'] = $this->Topik_model->getTopikById($id_topik);
                            $data['topik_rule'] = $this->Topik_model->getRuleTopikById($id_topik);
                            $data['topik_skd'] = $this->Topik_model->getTopikSKD();

                            $data['judul'] = 'AORTASTAN Try Out Online | ' . $nama;

                            $this->load->view('User/templates/header_tes', $data);
                            $this->load->view('User/tes_detail', $data);
                            $this->load->view('User/templates/footer_tes');
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Selesaikan dulu tes TPA!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            redirect('User/tryout');
                        };
                    } elseif (count($hasil_tes) == 1) {
                        if ($id_topik == 2) {
                            $nama = $this->Topik_model->getNamaTopikById($id_topik);

                            $sessionUser = $this->session->userdata('username');
                            $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

                            $data['event'] = $this->Event_model->getEventById($id_event);
                            $data['topik'] = $this->Topik_model->getTopikById($id_topik);
                            $data['topik_rule'] = $this->Topik_model->getRuleTopikById($id_topik);
                            $data['topik_skd'] = $this->Topik_model->getTopikSKD();

                            $data['judul'] = 'AORTASTAN Try Out Online | ' . $nama;

                            $this->load->view('User/templates/header_tes', $data);
                            $this->load->view('User/tes_detail', $data);
                            $this->load->view('User/templates/footer_tes');
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Selesaikan dulu tes TBI!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            redirect('User/tryout');
                        };
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda sudah melakukan tes tersebut!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/tryout');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda belum terdaftar di event ini!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('User/tryout');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda tidak memiliki akses untuk kesana!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('User/tryout');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Silahkan login dulu!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/login');
        }
    }

    public function kerjakan_tes($id, $id_event, $id_topik)
    {
        $nama = $this->Topik_model->getNamaTopikById($id_topik);
        $data['judul'] = 'AORTASTAN Try Out Online | ' . $nama;
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $hasil_tes = $this->hasil->getHasilByIdAndEvent($id, $id_event);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $id_topik);
        $transaksi = $this->db->get_where('transaksi_user', [
            'id_user' => $id,
            'id_event' => $id_event
        ])->row_array();
        $userID = $this->User_model->getIdUserByUsername($sessionUser);
        if ($sessionUser) {
            if ($id == $userID) {
                if ($transaksi) {
                    if ($hasil_tes_topik) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda sudah melakukan tes tersebut!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/event/' . $id_event);
                    } else {
                        if (count($hasil_tes) == null) {
                            if ($id_topik == 1) {
                                $data['event'] = $this->Event_model->getEventById($id_event);
                                $data['topik'] = $this->Topik_model->getTopikById($id_topik);
                                $data['topik_rule'] = $this->Topik_model->getRuleTopikById($id_topik);
                                $data['soal'] = $this->Soal_model->getSoalById($id_event, $id_topik);
                                $data['soal1'] = $this->Soal_model->getSoalByIdLimit1($id_event, $id_topik);
                                $data['soal2'] = $this->Soal_model->getSoalByIdLimit2($id_event, $id_topik);
                                $data['soal3'] = $this->Soal_model->getSoalByIdLimit3($id_event, $id_topik);

                                $waktudaftar = time();

                                $dataTransaksi = [
                                    'id_topik' => $id_topik,
                                    'id_event' => $id_event,
                                    'id_user' => $id,
                                    'waktu_daftar' => $waktudaftar
                                ];
                                $this->Kerjakan_model->sessionKerjakan($dataTransaksi);

                                $this->session->unset_userdata('id_event');
                                $this->session->unset_userdata('id_topik');
                                $this->session->unset_userdata('id_user');
                                $this->session->unset_userdata('waktu_daftar');

                                $data['transaksi'] = $this->Kerjakan_model->getKerjakan($id_event, $id_topik, $id);

                                $this->load->view('User/templates/header_tes', $data);
                                $this->load->view('User/tes/kerjakan_tes', $data);
                                $this->load->view('User/templates/footer_tes');
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Selesaikan dulu tes TPA!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                                redirect('User/event/' . $id_event);
                            };
                        } elseif (count($hasil_tes) == 1) {
                            if ($id_topik == 2) {
                                $data['event'] = $this->Event_model->getEventById($id_event);
                                $data['topik'] = $this->Topik_model->getTopikById($id_topik);
                                $data['topik_rule'] = $this->Topik_model->getRuleTopikById($id_topik);
                                $data['soal'] = $this->Soal_model->getSoalById($id_event, $id_topik);
                                $data['soal1'] = $this->Soal_model->getSoalByIdLimit1($id_event, $id_topik);

                                $waktudaftar = time();

                                $dataTransaksi = [
                                    'id_topik' => $id_topik,
                                    'id_event' => $id_event,
                                    'id_user' => $id,
                                    'waktu_daftar' => $waktudaftar
                                ];
                                $this->Kerjakan_model->sessionKerjakan($dataTransaksi);

                                $this->session->unset_userdata('id_event');
                                $this->session->unset_userdata('id_topik');
                                $this->session->unset_userdata('id_user');
                                $this->session->unset_userdata('waktu_daftar');

                                $data['transaksi'] = $this->Kerjakan_model->getKerjakan($id_event, $id_topik, $id);

                                $this->load->view('User/templates/header_tes', $data);
                                $this->load->view('User/tes/kerjakan_tes', $data);
                                $this->load->view('User/templates/footer_tes');
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Selesaikan dulu tes TBI!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                                redirect('User/event/' . $id_event);
                            }
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda sudah melakukan tes tersebut!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            redirect('User/event/' . $id_event);
                        }
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda belum terdaftar di event ini!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('User/tryout');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda tidak memiliki akses untuk kesana!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('User/tryout');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Silahkan login dulu!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/login');
        }
    }

    public function jawab()
    {
        $this->load->model('Kerjakan_model', 'kerjakan');
        $jawaban = $_POST;
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($jawaban['idp'], $jawaban['eve'], $jawaban['topik']);

        if ($hasil_tes_topik) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda sudah melakukan tes tersebut!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/event/' . $jawaban['eve']);
        } else {
            $dataJawaban = [
                'id_user' => $jawaban['idp'],
                'id_topik' => $jawaban['topik'],
                'id_event' => $jawaban['eve'],
                'id_soal' => $jawaban['soal'],
                'id_jawaban' => $jawaban['jwb']
            ];
            $this->kerjakan->jawabsoal($dataJawaban);
        }
    }

    public function ragu()
    {
        $this->load->model('Kerjakan_model', 'kerjakan');
        $klikRagu = $_POST;
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($klikRagu['idp'], $klikRagu['eve'], $klikRagu['topik']);

        if ($hasil_tes_topik) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda sudah melakukan tes tersebut!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/event/' . $klikRagu['eve']);
        } else {
            $dataRagu = [
                'id_user' => $klikRagu['idp'],
                'id_topik' => $klikRagu['topik'],
                'id_event' => $klikRagu['eve'],
                'id_soal' => $klikRagu['soal'],
                'btn_ragu' => $klikRagu['ragu']
            ];
            $this->kerjakan->klikragu($dataRagu);
            return true;
        }
    }

    public function koreksi($id, $id_event, $id_topik)
    {
        $dataJawaban = $this->Kerjakan_model->koreksi($id, $id_event, $id_topik);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $id_topik);

        $total_benar = 0;
        foreach ($dataJawaban as $jawab) {
            $total_benar = $total_benar + $jawab['score'];
        }

        $dataHasil = [
            'id_topik' => $id_topik,
            'id_event' => $id_event,
            'id_user' => $id,
            'hasil' => $total_benar
        ];

        if ($hasil_tes_topik) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda sudah melakukan tes tersebut</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/event/' . $id_event);
        } else {
            $this->hasil->insertHasil($dataHasil);

            $this->Kerjakan_model->hapuscache($id, $id_topik, $id_event);

            if ($id_topik == 6) {
                redirect('User/hasil_tes_psiko/' . $id . '/' . $id_event . '/' . $id_topik);
            } else {
                redirect('User/hasil_tes/' . $id . '/' . $id_event . '/' . $id_topik);
            }
        }
    }

    public function koreksi_skd($id, $id_event, $id_topik)
    {
        $jawabanTwk = $this->Kerjakan_model->koreksiTwk($id, $id_event);
        $jawabanTiu = $this->Kerjakan_model->koreksiTiu($id, $id_event);
        $jawabanTkp = $this->Kerjakan_model->koreksiTkp($id, $id_event);
        $hasil_tes_twk = $this->hasil->getHasilTwkByIdEvent($id, $id_event);
        $hasil_tes_tiu = $this->hasil->getHasilTiuByIdEvent($id, $id_event);
        $hasil_tes_tkp = $this->hasil->getHasilTkpByIdEvent($id, $id_event);


        if ($hasil_tes_twk || $hasil_tes_tiu || $hasil_tes_tkp) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda sudah melakukan tes tersebut!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/event/' . $id_event);
        } else {
            $total_benar_twk = 0;
            foreach ($jawabanTwk as $jawabTwk) {
                $total_benar_twk = $total_benar_twk + $jawabTwk['score'];
            }
            $dataHasilTwk = [
                'id_topik' => 3,
                'id_event' => $id_event,
                'id_user' => $id,
                'hasil' => $total_benar_twk
            ];
            $this->hasil->insertHasil($dataHasilTwk);
            $this->Kerjakan_model->hapuscachetwk($id, $id_event);



            $total_benar_tiu = 0;
            foreach ($jawabanTiu as $jawabTiu) {
                $total_benar_tiu = $total_benar_tiu + $jawabTiu['score'];
            }
            $dataHasilTiu = [
                'id_topik' => 4,
                'id_event' => $id_event,
                'id_user' => $id,
                'hasil' => $total_benar_tiu
            ];

            $this->hasil->insertHasil($dataHasilTiu);
            $this->Kerjakan_model->hapuscachetiu($id, $id_event);



            $total_benar_tkp = 0;
            foreach ($jawabanTkp as $jawabTkp) {
                $total_benar_tkp = $total_benar_tkp + $jawabTkp['score'];
            }
            $dataHasilTiu = [
                'id_topik' => 5,
                'id_event' => $id_event,
                'id_user' => $id,
                'hasil' => $total_benar_tkp
            ];
            $this->hasil->insertHasil($dataHasilTiu);
            $this->Kerjakan_model->hapuscachetkp($id, $id_event);

            redirect('User/hasil_skd/' . $id . '/' . $id_event . '/' . $id_topik);
        }
    }

    public function hasil_tes($id, $id_event, $id_topik)
    {
        $data['judul'] = 'AORTASTAN Try Out Online | Tes TPA';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $hasil_tes = $this->hasil->getHasilByIdAndEvent($id, $id_event);
        $transaksi = $this->db->get_where('transaksi_user', [
            'id_user' => $id,
            'id_event' => $id_event
        ])->row_array();
        $userID = $this->User_model->getIdUserByUsername($sessionUser);
        if ($sessionUser) {
            if ($id == $userID) {
                if ($transaksi) {
                    if ($hasil_tes > 0) {
                        if ($id_topik == 1 || $id_topik == 2) {
                            $data['event'] = $this->Event_model->getEventById($id_event);
                            $data['topik'] = $this->Topik_model->getTopikById($id_topik);
                            $data['topik_rule'] = $this->Topik_model->getRuleTopikById($id_topik);
                            $data['hasil'] = $this->hasil->getHasil($id, $id_event, $id_topik);
                            $data['hasilSemuaTes'] = $this->hasil->getHasilByIdAndEvent($id, $id_event);

                            $this->load->view('User/templates/header_tes', $data);
                            $this->load->view('User/hasil_tes', $data);
                            $this->load->view('User/templates/footer_tes');
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Halaman tidak ditemukan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            redirect('User/tryout');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda belum memiliki hasil pada tes tersebut</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/tryout');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda belum terdaftar di event ini!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('User/tryout');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda tidak memiliki akses untuk kesana!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('User/tryout');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Silahkan login dulu!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/login');
        }
    }

    public function hasil_skd($id, $id_event, $id_topik)
    {
        $data['judul'] = 'AORTASTAN Try Out Online | Tes TPA';
        $sessionUser = $this->session->userdata('username');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $hasil_tes = $this->hasil->getHasilByIdAndEvent($id, $id_event);
        $transaksi = $this->db->get_where('transaksi_user', [
            'id_user' => $id,
            'id_event' => $id_event
        ])->row_array();
        $userID = $this->User_model->getIdUserByUsername($sessionUser);
        if ($sessionUser) {
            if ($id == $userID) {
                if ($transaksi) {
                    if ($hasil_tes >= 3) {
                        if ($id_topik == 3) {
                            $data['event'] = $this->Event_model->getEventById($id_event);
                            $data['topik_twk'] = $this->Topik_model->getTwk();
                            $data['topik_rule_twk'] = $this->Topik_model->getRuleTwk();
                            $data['topik_tiu'] = $this->Topik_model->getTiu();
                            $data['topik_rule_tiu'] = $this->Topik_model->getRuleTiu();
                            $data['topik_tkp'] = $this->Topik_model->getTkp();
                            $data['topik_rule_tkp'] = $this->Topik_model->getRuleTkp();
                            $data['topik_skd'] = $this->Topik_model->getTopikSKD();
                            $data['topik_rule_skd'] = $this->Topik_model->getRuleTopikSKD();
                            $data['hasil_twk'] = $this->hasil->getHasil($id, $id_event, 3);
                            $data['hasil_tiu'] = $this->hasil->getHasil($id, $id_event, 4);
                            $data['hasil_tkp'] = $this->hasil->getHasil($id, $id_event, 5);

                            $this->load->view('User/templates/header_tes', $data);
                            $this->load->view('User/hasil_tes_skd', $data);
                            $this->load->view('User/templates/footer_tes');
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Halaman tidak ditemukan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            redirect('User/tryout');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda belum mengikuti tes SKD</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/tryout');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda belum terdaftar di event ini!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('User/tryout');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Anda tidak memiliki akses untuk kesana!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('User/tryout');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-md-12 text-center" role="alert"><strong>Silahkan login dulu!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/login');
        }
    }
}
