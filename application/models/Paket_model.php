<?php

class Paket_model extends CI_model
{
    public function getAllPaket()
    {
        return $this->db->get('paket')->result_array();
    }

    public function insertPaket($dataInsert)
    {
        return $this->db->insert('paket', $dataInsert);
    }

    public function deleteFaq($id)
    {
        $this->db->where('id_paket', $id);
        $this->db->delete('paket');
        //return $this->db->get_where('mahasiswa', ['id' => $id]);
    }

    public function getPaketById($id_paket)
    {
        return $this->db->get_where('paket', ['id_paket' => $id_paket])->row_array();
    }
}
