<?php

class Tiket_model extends CI_model
{
    public function getAllTiketByIdUser($id_user)
    {
        $query = $this->db->get_where('tiket_user', ['id_user' => $id_user]);
        return $query->result_array();
    }

    public function getAllTiketByIdUserPaket($id_user, $id_paket)
    {
        $query = $this->db->get_where('tiket_user', ['id_user' => $id_user, 'id_paket' => $id_paket]);
        return $query->row_array();
    }

    public function insertTiket($id_user, $paket1, $paket2, $paket3, $paket4)
    {
        $dbtiket1 = $this->db->get_where('tiket_user', ['id_user' => $id_user, 'id_paket' => $paket1])->row_array();
        if($dbtiket1){
            $dataJmlhTiket = [
                'jmlh_tiket' => $dbtiket1['jmlh_tiket'] + 1
            ];
            $this->db->where('id_paket', $paket1);
            $this->db->where('id_user', $id_user);
            $this->db->set($dataJmlhTiket);
            $this->db->update('tiket_user');
        } else{
            $dataTiket = [
                'id_user' => $id_user,
                'id_paket' => $paket1,
                'jmlh_tiket' => 1
            ];
            $this->db->insert('tiket_user', $dataTiket);
        }

        if($paket2 != null){
            $dbtiket2 = $this->db->get_where('tiket_user', ['id_user' => $id_user, 'id_paket' => $paket2])->row_array();
            if($dbtiket2){
                $dataJmlhTiket = [
                    'jmlh_tiket' => $dbtiket2['jmlh_tiket'] + 1
                ];
                $this->db->where('id_paket', $paket2);
                $this->db->where('id_user', $id_user);
                $this->db->set($dataJmlhTiket);
                $this->db->update('tiket_user');
            } else{
                if($paket2 == $paket1){
                    $dataJmlhTiket = [
                        'jmlh_tiket' => 2
                    ];
                    $this->db->where('id_paket', $paket1);
                    $this->db->where('id_user', $id_user);
                    $this->db->set($dataJmlhTiket);
                    $this->db->update('tiket_user');
                } else{
                    $dataTiket1 = [
                        'id_user' => $id_user,
                        'id_paket' => $paket2,
                        'jmlh_tiket' => 1
                    ];
                    $this->db->insert('tiket_user', $dataTiket1);
                }
            }
        }

        if($paket3 != null){
            $dbtiket3 = $this->db->get_where('tiket_user', ['id_user' => $id_user, 'id_paket' => $paket3])->row_array();
            if($dbtiket3){
                $dataJmlhTiket = [
                    'jmlh_tiket' => $dbtiket3['jmlh_tiket'] + 1
                ];
                $this->db->where('id_paket', $paket3);
                $this->db->where('id_user', $id_user);
                $this->db->set($dataJmlhTiket);
                $this->db->update('tiket_user');
            } else{
                if($paket3 == $paket1){
                    $dataJmlhTiket = [
                        'jmlh_tiket' => 3
                    ];
                    $this->db->where('id_paket', $paket1);
                    $this->db->where('id_user', $id_user);
                    $this->db->set($dataJmlhTiket);
                    $this->db->update('tiket_user');
                } else{
                    if($paket3 == $paket2){
                        $dataJmlhTiket = [
                            'jmlh_tiket' => 2
                        ];
                        $this->db->where('id_paket', $paket2);
                        $this->db->where('id_user', $id_user);
                        $this->db->set($dataJmlhTiket);
                        $this->db->update('tiket_user');
                    } else{
                        $dataTiket1 = [
                            'id_user' => $id_user,
                            'id_paket' => $paket3,
                            'jmlh_tiket' => 1
                        ];
                        $this->db->insert('tiket_user', $dataTiket1);
                    }
                }
            }
        }

        if($paket4 != null){
            $dbtiket4 = $this->db->get_where('tiket_user', ['id_user' => $id_user, 'id_paket' => $paket4])->row_array();
            if($dbtiket4){
                $dataJmlhTiket = [
                    'jmlh_tiket' => $dbtiket4['jmlh_tiket'] + 1
                ];
                $this->db->where('id_paket', $paket4);
                $this->db->where('id_user', $id_user);
                $this->db->set($dataJmlhTiket);
                $this->db->update('tiket_user');
            } else{
                if($paket4 == $paket1){
                    $dataJmlhTiket = [
                        'jmlh_tiket' => 4
                    ];
                    $this->db->where('id_paket', $paket1);
                    $this->db->where('id_user', $id_user);
                    $this->db->set($dataJmlhTiket);
                    $this->db->update('tiket_user');
                } else{
                    if($paket4 == $paket2){
                        $dataJmlhTiket = [
                            'jmlh_tiket' => 3
                        ];
                        $this->db->where('id_paket', $paket2);
                        $this->db->where('id_user', $id_user);
                        $this->db->set($dataJmlhTiket);
                        $this->db->update('tiket_user');
                    } else{
                        if($paket4 == $paket3){
                            $dataJmlhTiket = [
                                'jmlh_tiket' => 2
                            ];
                            $this->db->where('id_paket', $paket3);
                            $this->db->where('id_user', $id_user);
                            $this->db->set($dataJmlhTiket);
                            $this->db->update('tiket_user');
                        } else{
                            $dataTiket1 = [
                                'id_user' => $id_user,
                                'id_paket' => $paket4,
                                'jmlh_tiket' => 1
                            ];
                            $this->db->insert('tiket_user', $dataTiket1);
                        }
                    }
                }
            }
        }
    }

    public function updateTiket($id_tiket, $data)
    {
        $this->db->where('id_tiket', $id_tiket);
        $this->db->set($data);
        $this->db->update('tiket_user');
    }

    public function updateTiketSekarang($id, $id_paket, $tiket){
        $tiket_berkurang = $tiket['jmlh_tiket'] - 1;
        $dataTiket = [
            'jmlh_tiket' => $tiket_berkurang
        ];
        $this->db->where('id_user', $id);
        $this->db->where('id_paket', $id_paket);
        $this->db->set($dataTiket);
        $this->db->update('tiket_user');
    }
}