<?php

class Soal_model extends CI_model
{
    public function getAllSoal()
    {
        $query = $this->db->get('soal');
        return $query->result_array();
    }

    // Select topik rule yang id
    public function getSoalTPAByIdEvent($id_event)
    {
        return $this->db->query("SELECT * from soal s where s.id_topik_tes = 1 and s.id_event = $id_event order by RAND")->result_array();
    }

    public function getSoalByIdPaketEventTopik($id_paket, $id_event, $id_topik)
    {
        return $this->db->get_where('soal', ['id_paket' => $id_paket, 'id_topik_tes' => $id_topik, 'id_event' => $id_event])->result_array();
    }

    public function tambahSoal($topik, $event, $soal, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5, $jawabanBenar)
    {
        $dataSoal = [
            'id_topik_tes' => $topik,
            'id_event' => $event,
            'soal' => $soal
        ];

        $this->db->insert('soal', $dataSoal);

        // $this->db->Select('id_soal')->get_where('soal', $dataSoal)->

        // $dataJawaban1 = [
        // 	'id soal' => ,
        // ];
        /*if ($jawabanBenar == $jawaban1) {
            $jawabanBenar = $jawaban1;
        } elseif ($jawabanBenar == $jawaban2) {
            $jawabanBenar = $jawaban2;
        } elseif ($jawabanBenar == $jawaban3) {
            $jawabanBenar = $jawaban3;
        } elseif ($jawabanBenar == $jawaban4) {
            $jawabanBenar = $jawaban4;
        } else {
            $jawabanBenar = $jawaban5;
        }*/
    }

    public function getSoalByIdEventAndIdTopik($id_event, $id_topik)
    {
        return $this->db->query("SELECT * from soal where id_event = $id_event and id_topik_tes = $id_topik")->result_array();
    }

    public function getSoalByIdSoal($id_soal)
    {
        return $this->db->query("SELECT * from soal where id_soal = $id_soal")->row_array();
    }

    public function getJawabanByIdSoal($id_soal)
    {
        return $this->db->query("SELECT * from jawaban where id_soal = $id_soal")->result_array();
    }

    public function getJawabanByIdSoalAndJawaban($id_soal, $id_jawaban)
    {
        return $this->db->query("SELECT * from jawaban where id_soal = $id_soal and id_jawaban = $id_jawaban")->row_array();
    }

    public function updateJawaban($id_jawaban, $dataJawaban)
    {
        $this->db->set($dataJawaban);
        $this->db->where('id_jawaban', $id_jawaban);
        $this->db->update('jawaban');
    }

    public function getSoalSKDbyId($id_event, $id_topik)
    {
        return $this->db->query("SELECT * from soal where id_event = $id_event and id_skd = $id_topik")->result_array();
    }

    public function getSoalSKDbyIdLimit1($id_event, $id_topik)
    {
        return $this->db->query("SELECT * from soal where id_event = $id_event and id_skd = $id_topik limit 20")->result_array();
    }

    public function getSoalSKDbyIdLimit2($id_event, $id_topik)
    {
        return $this->db->query("SELECT * from soal where id_event = $id_event and id_skd = $id_topik limit 20 OFFSET 20")->result_array();
    }

    public function getSoalSKDbyIdLimit3($id_event, $id_topik)
    {
        return $this->db->query("SELECT * from soal where id_event = $id_event and id_skd = $id_topik limit 20 OFFSET 40")->result_array();
    }

    public function getSoalSKDbyIdLimit4($id_event, $id_topik)
    {
        return $this->db->query("SELECT * from soal where id_event = $id_event and id_skd = $id_topik limit 20 OFFSET 60")->result_array();
    }

    public function getSoalSKDbyIdLimit5($id_event, $id_topik)
    {
        return $this->db->query("SELECT * from soal where id_event = $id_event and id_skd = $id_topik limit 20 OFFSET 80")->result_array();
    }


    public function getSoalTIUbyIdEvent($id_event)
    {
        return $this->db->query("SELECT * from soal where id_event = $id_event and id_topik_tes = 4")->result_array();
    }

    public function getSoalTKPbyIdEvent($id_event)
    {
        return $this->db->query("SELECT * from soal where id_event = $id_event and id_topik_tes = 5")->result_array();
    }

    public function deleteSoal($id_soal)
    {
        $jawaban = $this->db->get_where('jawaban', ['id_soal' => $id_soal])->result_array();
        if ($jawaban) {
            $this->db->where('id_soal', $id_soal)->delete('jawaban');
        }

        $this->db->where('id_soal', $id_soal);
        $this->db->delete('soal');
    }

    public function getSoalByIdLimit1($id_event, $id_topik)
    {
        return $this->db->query("SELECT * from soal s where s.id_topik_tes = $id_topik and s.id_event = $id_event limit 20")->result_array();
    }

    public function getSoalByIdLimit2($id_event, $id_topik)
    {
        return $this->db->query("SELECT * from soal s where s.id_topik_tes = $id_topik and s.id_event = $id_event limit 20 OFFSET 20")->result_array();
    }

    public function getSoalByIdLimit3($id_event, $id_topik)
    {
        return $this->db->query("SELECT * from soal s where s.id_topik_tes = $id_topik and s.id_event = $id_event limit 20 OFFSET 40")->result_array();
    }
}
