<?php

class Modul_model extends CI_model
{
    public function getAllModul()
    {
        return $this->db->get('modul')->result_array();
    }

    public function insertModul($dataInsert)
    {
        $this->db->insert('modul', $dataInsert);
    }

    public function deleteModul($id)
    {
        $this->db->where('id_modul', $id);
        $this->db->delete('modul');
        //return $this->db->get_where('mahasiswa', ['id' => $id]);
    }

    public function getTestimoni()
    {
        return $this->db->get('testimoni')->result_array();
    }

    public function getModulById($id_modul)
    {
        return $this->db->select('file')->get_where('modul', ['id_modul' => $id_modul])->row()->file;
    }
}
