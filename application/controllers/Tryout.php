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
        $this->load->model('Paket_model');
        $this->load->model('Topik_model');
        $this->load->model('Tiket_model');
        $this->load->model('User_model');
        $this->load->model('Transaksi_model');
        $this->load->model('Rule_topik_model');
        $this->load->model('Soal_model');
        $this->load->model('Kerjakan_model');
        $this->load->model('Hasil_tes_model', 'hasil');
    }

    public function cek_tiket($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Cek Tiket';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        $paket = $this->Paket_model->getPaketById($id_paket);
        $tiket = $this->Tiket_model->getAllTiketByIdUserPaket($id, $id_paket);

        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id){
                    if($tiket['jmlh_tiket'] > 0){
                        $hasil = $this->Transaksi_model->insertTransaksiTryout($id, $id_paket, $id_event);
                        if($hasil){
                            $this->Tiket_model->updateTiketSekarang($id, $id_paket, $tiket);
                            
                            if($paket['tpa'] == 1){
                                redirect('tryout/tes_tpa/' . $id . '/' . $id_paket . '/' . $id_event);
                            } else{
                                if($paket['tbi'] == 1){
                                    redirect('tryout/tes_tbi/' . $id . '/' . $id_paket . '/' . $id_event);
                                } else{
                                    if($paket['twk'] == 1 && $paket['tiu'] == 1 && $paket['tkp'] == 1){
                                        redirect('tryout/tes_skd/' . $id . '/' . $id_paket . '/' . $id_event);
                                    } else{
                                        if($paket['tsa'] == 1){
                                            redirect('tryout/tes_tsa/' . $id . '/' . $id_paket . '/' . $id_event);
                                        }
                                    }
                                }
                            }
                        } else{
                            if($paket['tpa'] == 1){
                                redirect('tryout/tes_tpa/' . $id . '/' . $id_paket . '/' . $id_event);
                            } else{
                                if($paket['tbi'] == 1){
                                    redirect('tryout/tes_tbi/' . $id . '/' . $id_paket . '/' . $id_event);
                                } else{
                                    if($paket['twk'] == 1 && $paket['tiu'] == 1 && $paket['tkp'] == 1){
                                        redirect('tryout/tes_skd/' . $id . '/' . $id_paket . '/' . $id_event);
                                    } else{
                                        if($paket['tsa'] == 1){
                                            redirect('tryout/tes_tsa/' . $id . '/' . $id_paket . '/' . $id_event);
                                        }
                                    }
                                }
                            }
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu tidak memilki tiket di paket ' . $paket['nama_paket'] . '!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } elseif($data['user']['role_id'] == 1){
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }

    // Function Tryout TPA
    public function tes_tpa($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Tes Potensi Akademik';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikTPA();
        $data['aturan_topik'] = $this->Topik_model->getRuleTopikTPA();
        $data['transaksi'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi']){
                        if($hasil_tes_topik){
                            $this->session->set_flashdata('error', 'Kamu sudah melakukan tes tersebut!');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        } else{
                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/tes_detail');
                            $this->load->view('footer/footer_tes');
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }

    public function kerjakan_tpa($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Tes Potensi Akademik';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikTPA();
        $data['aturan_topik'] = $this->Topik_model->getRuleTopikTPA();
        $data['transaksi_user'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $data['soal'] = $this->Soal_model->getSoalByIdEventAndIdTopik($id_event, $data['topik']['id_topik_tes']);
        $data['soal1'] = $this->Soal_model->getSoalByIdLimit1($id_event, $data['topik']['id_topik_tes']);
        $data['soal2'] = $this->Soal_model->getSoalByIdLimit2($id_event, $data['topik']['id_topik_tes']);
        $data['soal3'] = $this->Soal_model->getSoalByIdLimit3($id_event, $data['topik']['id_topik_tes']);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi_user']){
                        if($hasil_tes_topik){
                            $this->session->set_flashdata('error', 'Kamu sudah melakukan tes tersebut!');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        } else{
                            $waktudaftar = time();

                            $dataTransaksi = [
                                'id_topik' => $data['topik']['id_topik_tes'],
                                'id_event' => $id_event,
                                'id_user' => $id,
                                'waktu_daftar' => $waktudaftar
                            ];
                            $this->Kerjakan_model->sessionKerjakan($dataTransaksi);

                            $this->session->unset_userdata('id_event');
                            $this->session->unset_userdata('id_topik');
                            $this->session->unset_userdata('id_user');
                            $this->session->unset_userdata('waktu_daftar');

                            $data['transaksi'] = $this->Kerjakan_model->getKerjakan($id_event, $data['topik']['id_topik_tes'], $id);

                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/kerjakan_tes');
                            $this->load->view('footer/footer_tes');
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }

    public function hasil_tpa($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Hasil Tes Potensi Akademik';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikTPA();
        $data['aturan_topik'] = $this->Topik_model->getRuleTopikTPA();
        $data['transaksi_user'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        $data['hasil'] = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi_user']){
                        if($hasil_tes_topik){
                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/hasil_tes');
                            $this->load->view('footer/footer_tes');
                        } else{
                            $this->session->set_flashdata('error', 'Belum ada hasil untuk tes ini! Pastikan kamu sudah mengerjakan tes.');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }
    // End TPA

    //Function Tryout TBI
    public function tes_tbi($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Tes Bahasa Inggris';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikTBI();
        $data['aturan_topik'] = $this->Topik_model->getRuleTopikTBI();
        $data['transaksi'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi']){
                        if($hasil_tes_topik){
                            $this->session->set_flashdata('error', 'Kamu sudah melakukan tes tersebut!');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        } else{
                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/tes_detail');
                            $this->load->view('footer/footer_tes');
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }

    public function kerjakan_tbi($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Tes Bahasa Inggris';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikTBI();
        $data['aturan_topik'] = $this->Topik_model->getRuleTopikTBI();
        $data['transaksi_user'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $data['soal'] = $this->Soal_model->getSoalByIdEventAndIdTopik($id_event, $data['topik']['id_topik_tes']);
        $data['soal1'] = $this->Soal_model->getSoalByIdLimit1($id_event, $data['topik']['id_topik_tes']);
        $data['soal2'] = $this->Soal_model->getSoalByIdLimit2($id_event, $data['topik']['id_topik_tes']);
        $data['soal3'] = $this->Soal_model->getSoalByIdLimit3($id_event, $data['topik']['id_topik_tes']);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi_user']){
                        if($hasil_tes_topik){
                            $this->session->set_flashdata('error', 'Kamu sudah melakukan tes tersebut!');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        } else{
                            $waktudaftar = time();

                            $dataTransaksi = [
                                'id_topik' => $data['topik']['id_topik_tes'],
                                'id_event' => $id_event,
                                'id_user' => $id,
                                'waktu_daftar' => $waktudaftar
                            ];
                            $this->Kerjakan_model->sessionKerjakan($dataTransaksi);

                            $this->session->unset_userdata('id_event');
                            $this->session->unset_userdata('id_topik');
                            $this->session->unset_userdata('id_user');
                            $this->session->unset_userdata('waktu_daftar');

                            $data['transaksi'] = $this->Kerjakan_model->getKerjakan($id_event, $data['topik']['id_topik_tes'], $id);

                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/kerjakan_tes');
                            $this->load->view('footer/footer_tes');
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }

    public function hasil_tbi($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Hasil Tes Bahasa Inggris';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikTBI();
        $data['aturan_topik'] = $this->Topik_model->getRuleTopikTBI();
        $data['transaksi_user'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        $data['hasil'] = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi_user']){
                        if($hasil_tes_topik){
                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/hasil_tes');
                            $this->load->view('footer/footer_tes');
                        } else{
                            $this->session->set_flashdata('error', 'Belum ada hasil untuk tes ini! Pastikan kamu sudah mengerjakan tes.');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }
    // End TBI

    //Function Tryout TSA
    public function tes_tsa($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Tes Substansi Akademik';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikTSA();
        $data['aturan_topik'] = $this->Topik_model->getRuleTopikTSA();
        $data['transaksi'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi']){
                        if($hasil_tes_topik){
                            $this->session->set_flashdata('error', 'Kamu sudah melakukan tes tersebut!');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        } else{
                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/tes_detail');
                            $this->load->view('footer/footer_tes');
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }

    public function kerjakan_tsa($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Tes Substansi Akademik';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikTSA();
        $data['aturan_topik'] = $this->Topik_model->getRuleTopikTSA();
        $data['transaksi_user'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $data['soal'] = $this->Soal_model->getSoalByIdEventAndIdTopik($id_event, $data['topik']['id_topik_tes']);
        $data['soal1'] = $this->Soal_model->getSoalByIdLimit1($id_event, $data['topik']['id_topik_tes']);
        $data['soal2'] = $this->Soal_model->getSoalByIdLimit2($id_event, $data['topik']['id_topik_tes']);
        $data['soal3'] = $this->Soal_model->getSoalByIdLimit3($id_event, $data['topik']['id_topik_tes']);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi_user']){
                        if($hasil_tes_topik){
                            $this->session->set_flashdata('error', 'Kamu sudah melakukan tes tersebut!');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        } else{
                            $waktudaftar = time();

                            $dataTransaksi = [
                                'id_topik' => $data['topik']['id_topik_tes'],
                                'id_event' => $id_event,
                                'id_user' => $id,
                                'waktu_daftar' => $waktudaftar
                            ];
                            $this->Kerjakan_model->sessionKerjakan($dataTransaksi);

                            $this->session->unset_userdata('id_event');
                            $this->session->unset_userdata('id_topik');
                            $this->session->unset_userdata('id_user');
                            $this->session->unset_userdata('waktu_daftar');

                            $data['transaksi'] = $this->Kerjakan_model->getKerjakan($id_event, $data['topik']['id_topik_tes'], $id);

                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/kerjakan_tes');
                            $this->load->view('footer/footer_tes');
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }

    public function hasil_tsa($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Hasil Tes Substansi Akademik';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikTSA();
        $data['aturan_topik'] = $this->Topik_model->getRuleTopikTSA();
        $data['transaksi_user'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        $data['hasil'] = $this->hasil->getHasilByIdEventTopik($id, $id_event, $data['topik']['id_topik_tes']);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi_user']){
                        if($hasil_tes_topik){
                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/hasil_tes');
                            $this->load->view('footer/footer_tes');
                        } else{
                            $this->session->set_flashdata('error', 'Belum ada hasil untuk tes ini! Pastikan kamu sudah mengerjakan tes.');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }
    // End TSA

    // Function Tryout SKD
    public function tes_skd($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Seleksi Kemampuan Dasar';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['klmpk_skd'] = $this->Topik_model->getKlmpkSKD();
        $data['klmpk_rule_skd'] = $this->Topik_model->getRuleTopikSKD();
        $data['topik_skd'] = $this->Topik_model->getTopikSKD();
        $data['transaksi'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $hasil_twk = $this->hasil->getHasilTwkByIdAndEvent($id, $id_event);
        $hasil_tiu = $this->hasil->getHasilTiuByIdAndEvent($id, $id_event);
        $hasil_tkp = $this->hasil->getHasilTkpByIdAndEvent($id, $id_event);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi']){
                        if($hasil_twk && $hasil_tiu && $hasil_tkp){
                            $this->session->set_flashdata('error', 'Kamu sudah melakukan tes tersebut!');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        } else{
                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/tes_skd_detail');
                            $this->load->view('footer/footer_tes');
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }

    public function kerjakan_skd($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Seleksi Kemampuan Dasar';

        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);

        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik'] = $this->Topik_model->getTopikSKD();
        $data['topik_rule'] = $this->Topik_model->getRuleTopikSKD();
        $data['soal'] = $this->Soal_model->getSoalSKDbyId($id_event, $data['topik']['id_skd']);
        $data['soal1'] = $this->Soal_model->getSoalSKDbyIdLimit1($id_event, $data['topik']['id_skd']);
        $data['soal2'] = $this->Soal_model->getSoalSKDbyIdLimit2($id_event, $data['topik']['id_skd']);
        $data['soal3'] = $this->Soal_model->getSoalSKDbyIdLimit3($id_event, $data['topik']['id_skd']);
        $data['soal4'] = $this->Soal_model->getSoalSKDbyIdLimit4($id_event, $data['topik']['id_skd']);
        $data['soal5'] = $this->Soal_model->getSoalSKDbyIdLimit5($id_event, $data['topik']['id_skd']);
        $data['transaksi'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $hasil_twk = $this->hasil->getHasilTwkByIdAndEvent($id, $id_event);
        $hasil_tiu = $this->hasil->getHasilTiuByIdAndEvent($id, $id_event);
        $hasil_tkp = $this->hasil->getHasilTkpByIdAndEvent($id, $id_event);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi']){
                        if($hasil_twk && $hasil_tiu && $hasil_tkp){
                            $this->session->set_flashdata('error', 'Kamu sudah melakukan tes tersebut!');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        } else{
                            $waktudaftar = time();

                            $dataTransaksi = [
                                'id_topik' => $data['topik']['id_skd'],
                                'id_event' => $id_event,
                                'id_user' => $id,
                                'waktu_daftar' => $waktudaftar
                            ];
                            $this->Kerjakan_model->sessionKerjakan($dataTransaksi);

                            $this->session->unset_userdata('id_event');
                            $this->session->unset_userdata('id_topik');
                            $this->session->unset_userdata('id_user');
                            $this->session->unset_userdata('waktu_daftar');

                            $data['transaksi'] = $this->Kerjakan_model->getKerjakan($id_event, $data['topik']['id_skd'], $id);

                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/kerjakan_skd');
                            $this->load->view('footer/footer_tes');
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }

    public function hasil_skd($id, $id_paket, $id_event)
    {
        $data['judul'] = 'Amal Edukasi | Hasil Seleksi Kemampuan Dasar';
        $sessionUser = $this->session->userdata('email');
        $data['user'] = $this->User_model->sessionUserMasuk($sessionUser);
        
        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['klmpk_skd'] = $this->Topik_model->getKlmpkSKD();
        $data['klmpk_rule_skd'] = $this->Topik_model->getRuleTopikSKD();
        $data['topik_skd'] = $this->Topik_model->getTopikSKD();
        $data['transaksi_user'] = $this->Transaksi_model->getTransaksiBySomeId($id, $id_paket, $id_event);
        $data['paket'] = $this->Paket_model->getPaketById($id_paket);
        $data['event'] = $this->Event_model->getEventById($id_event);
        $data['topik_twk'] = $this->Topik_model->getTwk();
        $data['topik_rule_twk'] = $this->Topik_model->getRuleTwk();
        $data['topik_tiu'] = $this->Topik_model->getTiu();
        $data['topik_rule_tiu'] = $this->Topik_model->getRuleTiu();
        $data['topik_tkp'] = $this->Topik_model->getTkp();
        $data['topik_rule_tkp'] = $this->Topik_model->getRuleTkp();
        $data['topik_skd'] = $this->Topik_model->getTopikSKD();
        $data['topik_rule_skd'] = $this->Topik_model->getRuleTopikSKD();
        $data['hasil_twk'] = $this->hasil->getHasilTwkByIdAndEvent($id, $id_event);
        $data['hasil_tiu'] = $this->hasil->getHasilTiuByIdAndEvent($id, $id_event);
        $data['hasil_tkp'] = $this->hasil->getHasilTkpByIdAndEvent($id, $id_event);
        
        if($data['user']){
            if($data['user']['role_id'] == 3){
                if($data['user']['id'] == $id) {
                    if($data['transaksi_user']){
                        if($data['hasil_twk'] && $data['hasil_tiu'] && $data['hasil_tkp']){
                            $this->load->view('header/header_tes', $data);
                            $this->load->view('user/tes/hasil_skd');
                            $this->load->view('footer/footer_tes');
                        } else{
                            $this->session->set_flashdata('error', 'Belum ada hasil untuk tes ini! Pastikan kamu sudah mengerjakan tes.');
                            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                        }
                    } else{
                        $this->session->set_flashdata('error', 'Kamu belum terdaftar di event ini!');
                        redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
                    }
                } else{
                    $this->session->set_flashdata('error', 'Kamu tidak memiliki akses ke halaman tersebut!');
                    redirect('home');
                }
            } else{
                redirect('admin');
            }
        } else{
            $this->session->set_flashdata('error', 'Silahkan login dulu!');
            redirect('home');
        }
    }

    public function jawab()
    {
        $this->load->model('Kerjakan_model', 'kerjakan');
        $jawaban = $_POST;
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($jawaban['idp'], $jawaban['eve'], $jawaban['topik']);

        if ($hasil_tes_topik) {
            $this->session->set_flashdata('error', 'Kamu sudah melakukan tes tersebut!');
            redirect('home');
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
            $this->session->set_flashdata('error', 'Kamu sudah melakukan tes tersebut!');
            redirect('home');
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

    public function koreksi($id, $id_paket, $id_event, $id_topik)
    {
        $dataJawaban = $this->Kerjakan_model->koreksi($id, $id_event, $id_topik);
        $hasil_tes_topik = $this->hasil->getHasilByIdEventTopik($id, $id_event, $id_topik);

        $total_benar = 0;
        foreach ($dataJawaban as $jawab) {
            $total_benar = $total_benar + $jawab['score'];
        }

        $dataHasil = [
            'id_topik' => $id_topik,
            'id_paket' => $id_paket,
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

            $this->Kerjakan_model->hapusSessionKerjakan($id, $id_topik, $id_event);

            if ($id_topik == 1) {
                redirect('tryout/hasil_tpa/' . $id . '/' . $id_paket . '/' . $id_event);
            } elseif($id_topik == 2) {
                redirect('tryout/hasil_tbi/' . $id . '/' . $id_paket . '/' . $id_event);
            }
        }
    }

    public function koreksi_skd($id, $id_paket, $id_event, $id_topik)
    {
        $jawabanTwk = $this->Kerjakan_model->koreksiTwk($id, $id_event);
        $jawabanTiu = $this->Kerjakan_model->koreksiTiu($id, $id_event);
        $jawabanTkp = $this->Kerjakan_model->koreksiTkp($id, $id_event);
        $hasil_tes_twk = $this->hasil->getHasilTwkByIdAndEvent($id, $id_event);
        $hasil_tes_tiu = $this->hasil->getHasilTiuByIdAndEvent($id, $id_event);
        $hasil_tes_tkp = $this->hasil->getHasilTkpByIdAndEvent($id, $id_event);


        if ($hasil_tes_twk || $hasil_tes_tiu || $hasil_tes_tkp) {
            $this->session->set_flashdata('error', 'Kamu sudah melakukan tes tersebut!');
            redirect('detail/event_detail/' . $id_paket . '/' . $id_event);
        } else {
            $total_benar_twk = 0;
            foreach ($jawabanTwk as $jawabTwk) {
                $total_benar_twk = $total_benar_twk + $jawabTwk['score'];
            }
            $dataHasilTwk = [
                'id_topik' => 3,
                'id_paket' => $id_paket,
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
                'id_paket' => $id_paket,
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
                'id_paket' => $id_paket,
                'id_event' => $id_event,
                'id_user' => $id,
                'hasil' => $total_benar_tkp
            ];
            $this->hasil->insertHasil($dataHasilTiu);
            $this->Kerjakan_model->hapuscachetkp($id, $id_event);

            $this->Kerjakan_model->hapusSessionKerjakan($id, $id_topik, $id_event);

            redirect('tryout/hasil_skd/' . $id . '/' . $id_paket . '/' . $id_event);
        }
    }

    /* public function pilih_jurusan($id, $id_event)
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
    } */
}
