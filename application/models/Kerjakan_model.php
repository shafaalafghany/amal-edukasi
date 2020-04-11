<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerjakan_model extends CI_Model
{

    /* PENGERJAAN SOAL */
    public function jawabsoal($dataJawaban)
    {
        $this->db->select('*'); //skip ini jika mau select spesifik
        $this->db->from('event_jawaban');
        $this->db->where('id_soal', $dataJawaban['id_soal']);
        $this->db->where('id_event', $dataJawaban['id_event']);
        $this->db->where('id_user', $dataJawaban['id_user']);
        $this->db->where('id_topik', $dataJawaban['id_topik']);
        $query = $this->db->get();
        $cekjawab = $query->row_array();
        if ($cekjawab > 0) {
            $this->db->where('id_soal', $dataJawaban['id_soal']);
            $this->db->update('event_jawaban', ['id_jawaban' => $dataJawaban['id_jawaban']]);
        } else {
            $this->db->insert('event_jawaban', $dataJawaban);
        }
    }

    public function klikragu($dataRagu)
    {
        $this->db->select('btn_ragu'); //skip ini jika mau select spesifik
        $this->db->from('event_jawaban');
        $this->db->where('id_soal', $dataRagu['id_soal']);
        $this->db->where('id_event', $dataRagu['id_event']);
        $this->db->where('id_user', $dataRagu['id_user']);
        $this->db->where('id_topik', $dataRagu['id_topik']);
        $query = $this->db->get();
        $cekjawab = $query->row()->btn_ragu;
        if (is_null($cekjawab)) {
            $this->db->insert('event_jawaban', $dataRagu);
        } else {
            $this->db->where('id_soal', $dataRagu['id_soal']);
            $this->db->update('event_jawaban', ['btn_ragu' => $dataRagu['btn_ragu']]);
        }
    }

    public function koreksi($id, $id_event, $id_topik)
    {
        $query = $this->db->query("SELECT j.score, ej.id_soal, ej.id_jawaban from event_jawaban ej left join jawaban j on ej.id_jawaban = j.id_jawaban where ej.id_user = $id and ej.id_event = $id_event and ej.id_topik = $id_topik");
        return $query->result_array();
    }

    public function hapuscache($id, $id_topik, $id_event)
    {
        $this->db->where('id_event', $id_event);
        $this->db->where('id_user', $id);
        $this->db->where('id_topik', $id_topik);
        $this->db->delete('event_jawaban');
    }

    public function sessionKerjakan($data)
    {
        return $this->db->insert('transaksi_event', $data);
    }

    public function getSessionKerjakan($data)
    {
        return $this->db->get_where('transaksi_event', $data)->row_array();
    }

    public function getKerjakan($id_event, $id_topik, $id)
    {
        return $this->db->get_where('transaksi_event', [
            'id_event' => $id_event,
            'id_topik' => $id_topik,
            'id_user' => $id
        ])->row_array();
    }

    public function koreksiTwk($id, $id_event)
    {
        $query = $this->db->query("SELECT j.score, ej.id_soal, ej.id_jawaban from event_jawaban ej left join jawaban j on ej.id_jawaban = j.id_jawaban where ej.id_user = $id and ej.id_event = $id_event and ej.id_topik = 3");
        return $query->result_array();
    }

    public function hapuscachetwk($id, $id_event)
    {
        $this->db->where('id_event', $id_event);
        $this->db->where('id_user', $id);
        $this->db->where('id_topik', 3);
        $this->db->delete('event_jawaban');
    }

    public function koreksiTiu($id, $id_event)
    {
        $query = $this->db->query("SELECT j.score, ej.id_soal, ej.id_jawaban from event_jawaban ej left join jawaban j on ej.id_jawaban = j.id_jawaban where ej.id_user = $id and ej.id_event = $id_event and ej.id_topik = 4");
        return $query->result_array();
    }

    public function hapuscachetiu($id, $id_event)
    {
        $this->db->where('id_event', $id_event);
        $this->db->where('id_user', $id);
        $this->db->where('id_topik', 4);
        $this->db->delete('event_jawaban');
    }

    public function koreksiTkp($id, $id_event)
    {
        $query = $this->db->query("SELECT j.score, ej.id_soal, ej.id_jawaban from event_jawaban ej left join jawaban j on ej.id_jawaban = j.id_jawaban where ej.id_user = $id and ej.id_event = $id_event and ej.id_topik = 5");
        return $query->result_array();
    }

    public function hapuscachetkp($id, $id_event)
    {
        $this->db->where('id_event', $id_event);
        $this->db->where('id_user', $id);
        $this->db->where('id_topik', 5);
        $this->db->delete('event_jawaban');
    }
}
