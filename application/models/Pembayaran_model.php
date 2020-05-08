<?php

class Pembayaran_model extends CI_model
{
    public function getAllBuktiBayar()
    {
        $query = $this->db->query("SELECT * from pembayaran_tiket p order by p.is_active ASC");
        return $query->result_array();
    }

    public function insertModul($dataInsert)
    {
        $this->db->insert('modul', $dataInsert);
    }

    public function deleteBayar($id)
    {
        $this->db->where('id_bayar', $id);
        $this->db->delete('pembayaran_tiket');
        //return $this->db->get_where('mahasiswa', ['id' => $id]);
    }

    public function getModulById($id_modul)
    {
        return $this->db->get_where('modul', ['id_modul' => $id_modul])->row_array();
    }
}