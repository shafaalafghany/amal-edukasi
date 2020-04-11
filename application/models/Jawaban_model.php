<?php

/**
 * 
 */
class Jawaban_model extends CI_model
{
	
	public function insertJawabanTpa($id_event, $id_topik, $getIdSoal, $jawabanBenar, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5)
	{
		if ($jawabanBenar == "jawaban1") {
	        $jawabanBenar = $jawaban1;

	        $dataJawabanBenar = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawabanBenar,
	            'score' => 4
	        ];
	        $this->db->insert('jawaban', $dataJawabanBenar);

	        $dataJawaban2 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban2,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban2);

	        $dataJawaban3 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban3,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban3);

	        $dataJawaban4 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban4,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban4);

	        $dataJawaban5 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban5,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban5);
	    } elseif ($jawabanBenar == "jawaban2") {
	        $jawabanBenar = $jawaban2;

	        $dataJawaban1 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban1,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban1);

	        $dataJawabanBenar = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawabanBenar,
	            'score' => 4
	        ];
	        $this->db->insert('jawaban', $dataJawabanBenar);

	        $dataJawaban3 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban3,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban3);

	        $dataJawaban4 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban4,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban4);

	        $dataJawaban5 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban5,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban5);
	    } elseif ($jawabanBenar == "jawaban3") {
	        $jawabanBenar = $jawaban3;

	        $dataJawaban1 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban1,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban1);

	        $dataJawaban2 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban2,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban2);

	        $dataJawabanBenar = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawabanBenar,
	            'score' => 4
	        ];
	        $this->db->insert('jawaban', $dataJawabanBenar);

	        $dataJawaban4 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban4,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban4);

	        $dataJawaban5 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban5,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban5);
	    } elseif ($jawabanBenar == "jawaban4") {
	        $jawabanBenar = $jawaban4;

	        $dataJawaban1 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban1,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban1);

	        $dataJawaban2 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban2,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban2);

	        $dataJawaban3 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban3,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban3);

	        $dataJawabanBenar = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawabanBenar,
	            'score' => 4
	        ];
	        $this->db->insert('jawaban', $dataJawabanBenar);

	        $dataJawaban5 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban5,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban5);
	    } else {
	        $jawabanBenar = $jawaban5;

	        $dataJawaban1 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban1,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban1);

	        $dataJawaban2 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban2,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban2);

	        $dataJawaban3 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban3,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban3);

	        $dataJawaban4 = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawaban4,
	            'score' => -1
	        ];
	        $this->db->insert('jawaban', $dataJawaban4);

	        $dataJawabanBenar = [
	            'id_soal' => $getIdSoal,
	            'id_topik_tes' => $id_topik,
	            'id_event' => $id_event,
	            'jawaban' => $jawabanBenar,
	            'score' => 4
	        ];
	        $this->db->insert('jawaban', $dataJawabanBenar);
	    }
	}

	public function insertJawabanTkp($id_event, $id_topik, $getIdSoal, $jawabanTkp1, $jawabanTkp2, $jawabanTkp3, $jawabanTkp4, $jawabanTkp5, $pointTkp1, $pointTkp2, $pointTkp3, $pointTkp4, $pointTkp5)
	{
		$dataJawaban1 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanTkp1,
                'score' => $pointTkp1
            ];
            $this->db->insert('jawaban', $dataJawaban1);

            $dataJawaban2 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanTkp2,
                'score' => $pointTkp2
            ];
            $this->db->insert('jawaban', $dataJawaban2);

            $dataJawaban3 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanTkp3,
                'score' => $pointTkp3
            ];
            $this->db->insert('jawaban', $dataJawaban3);

            $dataJawaban4 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanTkp4,
                'score' => $pointTkp4
            ];
            $this->db->insert('jawaban', $dataJawaban4);

            $dataJawaban5 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanTkp5,
                'score' => $pointTkp5
            ];
            $this->db->insert('jawaban', $dataJawaban5);
	}

	public function insertJawabanPsiko($id_event, $id_topik, $getIdSoal, $jawabanBenar, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5)
	{
		if ($jawabanBenar == "jawaban1") {
            $jawabanBenar = $jawaban1;

            $dataJawabanBenar = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanBenar,
                'score' => 1
            ];
            $this->db->insert('jawaban', $dataJawabanBenar);

            $dataJawaban2 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban2,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban2);

            $dataJawaban3 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban3,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban3);

            $dataJawaban4 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban4,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban4);

            $dataJawaban5 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban5,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban5);
        } elseif ($jawabanBenar == "jawaban2") {
            $jawabanBenar = $jawaban2;

            $dataJawaban1 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban1,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban1);

            $dataJawabanBenar = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanBenar,
                'score' => 1
            ];
            $this->db->insert('jawaban', $dataJawabanBenar);

            $dataJawaban3 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban3,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban3);

            $dataJawaban4 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban4,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban4);

            $dataJawaban5 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban5,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban5);
        } elseif ($jawabanBenar == "jawaban3") {
            $jawabanBenar = $jawaban3;

            $dataJawaban1 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban1,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban1);

            $dataJawaban2 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban2,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban2);

            $dataJawabanBenar = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanBenar,
                'score' => 1
            ];
            $this->db->insert('jawaban', $dataJawabanBenar);

            $dataJawaban4 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban4,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban4);

            $dataJawaban5 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban5,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban5);
        } elseif ($jawabanBenar == "jawaban4") {
            $jawabanBenar = $jawaban4;

            $dataJawaban1 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban1,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban1);

            $dataJawaban2 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban2,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban2);

            $dataJawaban3 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban3,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban3);

            $dataJawabanBenar = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanBenar,
                'score' => 1
            ];
            $this->db->insert('jawaban', $dataJawabanBenar);

            $dataJawaban5 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban5,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban5);
        } else {
            $jawabanBenar = $jawaban5;

            $dataJawaban1 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban1,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban1);

            $dataJawaban2 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban2,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban2);

            $dataJawaban3 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban3,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban3);

            $dataJawaban4 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban4,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban4);

            $dataJawabanBenar = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanBenar,
                'score' => 1
            ];
            $this->db->insert('jawaban', $dataJawabanBenar);
        }
	}

	public function insertJawabanSelainTpaTkpPsiko($id_event, $id_topik, $getIdSoal, $jawabanBenar, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5)
	{
		if ($jawabanBenar == "jawaban1") {
            $jawabanBenar = $jawaban1;

            $dataJawabanBenar = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanBenar,
                'score' => 5
            ];
            $this->db->insert('jawaban', $dataJawabanBenar);

            $dataJawaban2 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban2,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban2);

            $dataJawaban3 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban3,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban3);

            $dataJawaban4 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban4,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban4);

            if ($jawaban5 != null) {
                $dataJawaban5 = [
                    'id_soal' => $getIdSoal,
                    'id_topik_tes' => $id_topik,
                    'id_event' => $id_event,
                    'jawaban' => $jawaban5,
                    'score' => 0
                ];
                $this->db->insert('jawaban', $dataJawaban5);
            }
        } elseif ($jawabanBenar == "jawaban2") {
            $jawabanBenar = $jawaban2;

            $dataJawaban1 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban1,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban1);

            $dataJawabanBenar = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanBenar,
                'score' => 5
            ];
            $this->db->insert('jawaban', $dataJawabanBenar);

            $dataJawaban3 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban3,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban3);

            $dataJawaban4 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban4,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban4);

            if ($jawaban5 != null) {
                $dataJawaban5 = [
                    'id_soal' => $getIdSoal,
                    'id_topik_tes' => $id_topik,
                    'id_event' => $id_event,
                    'jawaban' => $jawaban5,
                    'score' => 0
                ];
                $this->db->insert('jawaban', $dataJawaban5);
            }
        } elseif ($jawabanBenar == "jawaban3") {
            $jawabanBenar = $jawaban3;

            $dataJawaban1 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban1,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban1);

            $dataJawaban2 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban2,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban2);

            $dataJawabanBenar = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanBenar,
                'score' => 5
            ];
            $this->db->insert('jawaban', $dataJawabanBenar);

            $dataJawaban4 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban4,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban4);

            if ($jawaban5 != null) {
                $dataJawaban5 = [
                    'id_soal' => $getIdSoal,
                    'id_topik_tes' => $id_topik,
                    'id_event' => $id_event,
                    'jawaban' => $jawaban5,
                    'score' => 0
                ];
                $this->db->insert('jawaban', $dataJawaban5);
            }
        } elseif ($jawabanBenar == "jawaban4") {
            $jawabanBenar = $jawaban4;

            $dataJawaban1 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban1,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban1);

            $dataJawaban2 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban2,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban2);

            $dataJawaban3 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban3,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban3);

            $dataJawabanBenar = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanBenar,
                'score' => 5
            ];
            $this->db->insert('jawaban', $dataJawabanBenar);

            if ($jawaban5 != null) {
                $dataJawaban5 = [
                    'id_soal' => $getIdSoal,
                    'id_topik_tes' => $id_topik,
                    'id_event' => $id_event,
                    'jawaban' => $jawaban5,
                    'score' => 0
                ];
                $this->db->insert('jawaban', $dataJawaban5);
            }
        } else {
            $jawabanBenar = $jawaban5;

            $dataJawaban1 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban1,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban1);

            $dataJawaban2 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban2,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban2);

            $dataJawaban3 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban3,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban3);

            $dataJawaban4 = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawaban4,
                'score' => 0
            ];
            $this->db->insert('jawaban', $dataJawaban4);

            $dataJawabanBenar = [
                'id_soal' => $getIdSoal,
                'id_topik_tes' => $$id_topik,
                'id_event' => $id_event,
                'jawaban' => $jawabanBenar,
                'score' => 5
            ];
            $this->db->insert('jawaban', $dataJawabanBenar);
        }
	}
}
