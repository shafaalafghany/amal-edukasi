<?php

class Testimoni_model extends CI_model
{
    public function getAllTestimoni()
    {
        return $this->db->get('testimoni')->result_array();
    }

    public function insertTestimoni($dataInsert)
    {
        return $this->db->insert('testimoni', $dataInsert);
    }

    public function deleteTestimoni($id)
    {
        $this->db->where('id_testimoni', $id);
        $this->db->delete('testimoni');
        //return $this->db->get_where('mahasiswa', ['id' => $id]);
    }

    public function getTestimoniById($id_testimoni)
    {
        return $this->db->get_where('testimoni', ['id_testimoni' => $id_testimoni])->row_array();
    }
}
