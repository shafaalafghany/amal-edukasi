<?php

class Hasil_tes_model extends CI_Model
{
    public function insertHasil($dataHasil)
    {
        return $this->db->insert('hasil_tes', $dataHasil);
    }

    public function getHasil($id, $id_event, $id_topik)
    {
        return $this->db->get_where('hasil_tes', [
            'id_user' => $id,
            'id_event' => $id_event,
            'id_topik' => $id_topik
        ])->row_array();
    }

    public function getHasilByIdEventTopik($id, $id_event, $id_topik)
    {
        return $this->db->get_where('hasil_tes', [
            'id_user' => $id,
            'id_event' => $id_event,
            'id_topik' => $id_topik
        ])->row_array();
    }

    public function getHasilByIdAndEvent($id, $id_event)
    {
        return $this->db->get_where('hasil_tes', [
            'id_user' => $id,
            'id_event' => $id_event
        ])->result_array();
    }

    public function getHasilTpaByIdAndEvent($id, $id_event)
    {
        return $this->db->get_where('hasil_tes', [
            'id_user' => $id,
            'id_event' => $id_event,
            'id_topik' => 1
        ])->row_array();
    }

    public function getHasilTbiByIdAndEvent($id, $id_event)
    {
        return $this->db->get_where('hasil_tes', [
            'id_user' => $id,
            'id_event' => $id_event,
            'id_topik' => 2
        ])->row_array();
    }

    public function getHasilTwkByIdAndEvent($id, $id_event)
    {
        return $this->db->get_where('hasil_tes', [
            'id_user' => $id,
            'id_event' => $id_event,
            'id_topik' => 3
        ])->row_array();
    }

    public function getHasilTiuByIdAndEvent($id, $id_event)
    {
        return $this->db->get_where('hasil_tes', [
            'id_user' => $id,
            'id_event' => $id_event,
            'id_topik' => 4
        ])->row_array();
    }

    public function getHasilTkpByIdAndEvent($id, $id_event)
    {
        return $this->db->get_where('hasil_tes', [
            'id_user' => $id,
            'id_event' => $id_event,
            'id_topik' => 5
        ])->row_array();
    }

    public function getHasilTsaByIdAndEvent($id, $id_event)
    {
        return $this->db->get_where('hasil_tes', [
            'id_user' => $id,
            'id_event' => $id_event,
            'id_topik' => 6
        ])->row_array();
    }

    // Leaderboard
    public function insertLeader($data)
    {
        $cek = $this->db->get_where('leaderboard', [
            'id_user' => $data['id_user'],
            'id_paket' => $data['id_paket'],
            'id_event' => $data['id_event']
        ])->row_array();

        if ($cek == null) {
            $this->db->insert('leaderboard', $data);
        }
    }

    public function getLeaderboardByEvent($id_event)
    {
        $query = $this->db->query("SELECT * from leaderboard l where l.id_event = $id_event order by l.nilai_total DESC, l.status ASC");
        return $query->result_array();
    }

    public function getLeaderboardByIdAndEvent($id, $id_event)
    {
        return $this->db->get_where('leaderboard', [
            'id_event' => $id_event,
            'id_user' => $id
        ])->row_array();
    }

    public function getLeaderboardByIdLeader($id_leader)
    {
        return $this->db->get_where('leaderboard', [
            'id_leaderboard' => $id_leader
        ])->row_array();
    }

    public function getFileJurusanByIdLeader($id_leaderboard)
    {
        return $this->db->select('analisis_jurusan')->get_where('leaderboard', ['id_leaderboard' => $id_leaderboard])->row()->analisis_jurusan;
    }
}
