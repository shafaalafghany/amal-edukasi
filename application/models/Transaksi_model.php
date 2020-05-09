<?php

class Transaksi_model extends CI_model
{
    public function insertTransaksiTryout($id, $id_paket, $id_event)
    {
        $dataTransaksi = [
            'id_user' => $id,
            'id_paket' => $id_paket,
            'id_event' => $id_event,
            'tgl_transaksi' => date_create('now')->format('Y-m-d H:i:s')
        ];

        $tr_sebelum = $this->db->get_where('transaksi_user', [
            'id_user' => $id,
            'id_paket' => $id_paket,
            'id_event' => $id_event
        ])->row_array();
        if($tr_sebelum){
            return false;
        } else{
            return $this->db->insert('transaksi_user', $dataTransaksi);
        }
    }

    public function getTransaksiBySomeId($id_user, $id_paket, $id_event)
    {
        $query = $this->db->get_where('transaksi_user', [
            'id_user' => $id_user,
            'id_paket' => $id_paket,
            'id_event' => $id_event
        ]);
        return $query->row_array();
    }
}