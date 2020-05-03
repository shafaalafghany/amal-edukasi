<?php

class Faq_model extends CI_model
{
    public function getAllFaq()
    {
        return $this->db->get('faq')->result_array();
    }

    public function insertFaq($dataInsert)
    {
        return $this->db->insert('faq', $dataInsert);
    }

    public function deleteFaq($id)
    {
        $this->db->where('id_faq', $id);
        $this->db->delete('faq');
        //return $this->db->get_where('mahasiswa', ['id' => $id]);
    }

    public function getFaqById($id_faq)
    {
        return $this->db->get_where('faq', ['id_faq' => $id_faq])->row_array();
    }
}
