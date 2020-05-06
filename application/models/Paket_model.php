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

    public function deletePaket($id)
    {
        $event = $this->db->get_where('event', ['id_paket' => $id])->result_array();
        if ($event) {
            $this->db->where('id_paket', $id)->delete('event');
        }

        $soal = $this->db->get_where('soal', ['id_paket' => $id])->result_array();
        if ($soal) {
            $this->db->where('id_paket', $id)->delete('soal');
        }

        $jawaban = $this->db->get_where('jawaban', ['id_paket' => $id])->result_array();
        if ($jawaban) {
            $this->db->where('id_paket', $id)->delete('jawaban');
        }

        $this->db->where('id_paket', $id);
        $this->db->delete('paket');
        //return $this->db->get_where('mahasiswa', ['id' => $id]);
    }

    public function getPaketById($id_paket)
    {
        return $this->db->get_where('paket', ['id_paket' => $id_paket])->row_array();
    }

    public function updatePaket($id_paket, $data_paket)
    {
        $this->db->where('id_paket', $id_paket);
        $this->db->set($data_paket);
        $this->db->update('paket');
        return true;
    }
}
