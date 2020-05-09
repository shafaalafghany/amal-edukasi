<?php

class Tiket_model extends CI_model
{
    public function getAllTiketByIdUser($id_user)
    {
        $query = $this->db->get_where('tiket_user', ['id_user' => $id_user]);
        return $query->result_array();
    }

    public function insertTiket($id_user, $paket1, $paket2, $paket3, $paket4)
    {
        $dataTiket1 = [
            'id_user' => $id_user,
            'id_paket' => $paket1
        ];
        $this->db->insert('tiket_user', $dataTiket1);

        if($paket2 != null){
            $dataTiket2 = [
                'id_user' => $id_user,
                'id_paket' => $paket2
            ];
            $this->db->insert('tiket_user', $dataTiket2);
        }

        if($paket3 != null){
            $dataTiket3 = [
                'id_user' => $id_user,
                'id_paket' => $paket3
            ];
            $this->db->insert('tiket_user', $dataTiket3);
        }

        if($paket4 != null){
            $dataTiket4 = [
                'id_user' => $id_user,
                'id_paket' => $paket4
            ];
            $this->db->insert('tiket_user', $dataTiket4);
        }
    }

    public function updateTiket($id_tiket, $data)
    {
        $this->db->where('id_tiket', $id_tiket);
        $this->db->set($data);
        $this->db->update('tiket_user');
    }
}