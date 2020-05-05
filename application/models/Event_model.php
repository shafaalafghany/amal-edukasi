<?php

class Event_model extends CI_model
{
    public function getAllEvent()
    {
        $query = $this->db->get('event');
        return $query->result_array();
    }

    public function getEventById($id_event)
    {
        return $this->db->get_where('event', ['id_event' => $id_event])->row_array();
    }

    public function insertEvent($data)
    {
        return $this->db->insert('event', $data);
    }

    public function getHargaEvent($id_event)
    {
        return $this->db->select('harga')->get_where('event', ['id_event' => $id_event])->row()->harga;
    }

    public function deleteEvent($id)
    {
        $soal = $this->db->get_where('soal', ['id_event' => $id])->result_array();
        if ($soal) {
            $this->db->where('id_event', $id)->delete('soal');
        }

        $jawaban = $this->db->get_where('jawaban', ['id_event' => $id])->result_array();
        if ($jawaban) {
            $this->db->where('id_event', $id)->delete('jawaban');
        }

        $this->db->where('id_event', $id);
        $this->db->delete('event');
        //return $this->db->get_where('mahasiswa', ['id' => $id]);
    }

    public function updateEvent($id, $tampung)
    {
        $this->db->set($tampung);
        $this->db->where('id_event', $id);
        $this->db->update('event');
    }

    public function resetDataEvent($idEvent)
    {
        $hasilUser = $this->db->get_where('hasil_tes', ['id_event' => $idEvent])->result_array();
        if ($hasilUser) {
            $this->db->where('id_event', $idEvent)->delete('hasil_tes');
        }

        $jawabanUser = $this->db->get_where('event_jawaban', ['id_event' => $idEvent])->result_array();
        if ($jawabanUser) {
            $this->db->where('id_event', $idEvent)->delete('event_jawaban');
        }

        $leaderboardUser = $this->db->get_where('leaderboard', ['id_event' => $idEvent])->result_array();
        if ($leaderboardUser) {
            $this->db->where('id_event', $idEvent)->delete('leaderboard');
        }

        $transaksiUser = $this->db->get_where('transaksi_user', ['id_event' => $idEvent])->result_array();
        if ($transaksiUser) {
            $this->db->where('id_event', $idEvent)->delete('transaksi_user');
        }

        $transaksiEvent = $this->db->get_where('transaksi_event', ['id_event' => $idEvent])->result_array();
        if ($transaksiEvent) {
            $this->db->where('id_event', $idEvent)->delete('transaksi_event');
        }
    }
}
