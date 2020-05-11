<?php

class Topik_model extends CI_model
{
    public function getAllTopik()
    {
        $query = $this->db->get('topik_tes');
        return $query->result_array();
    }

    public function getFourTopik()
    {
        $query = $this->db->query("SELECT * from topik_tes limit 0, 4");
        return $query->result_array();
    }

    public function getNamaTopikById($id_topik)
    {
        return $this->db->select('nama_topik_tes')->get_where('topik_tes', ['id_topik_tes' => $id_topik])->row()->nama_topik_tes;
    }

    public function getTopikById($id_topik)
    {
        return $this->db->get_where('topik_tes', ['id_topik_tes' => $id_topik])->row_array();
    }

    public function getRuleTopikById($id_topik)
    {
        return $this->db->query("SELECT * from rule_tes rt join topik_tes t on rt.id_rule_tes = t.id_rule where t.id_topik_tes = $id_topik")->row_array();
    }

    //TPA
    public function getTopikTPA()
    {
        return $this->db->get_where('topik_tes', ['id_topik_tes' => 1])->row_array();
    }

    public function getIdTopikTPA()
    {
        return $this->db->select('id_topik_tes')->get_where('topik_tes', ['id_topik_tes' => 1])->row()->id_topik_tes;
    }

    public function getRuleTopikTPA()
    {
        return $this->db->query("SELECT * from rule_tes rt join topik_tes t on rt.id_rule_tes = t.id_rule where t.id_rule = 1 and t.id_topik_tes = 1")->row_array();
    }

    //TBI
    public function getTopikTBI()
    {
        return $this->db->get_where('topik_tes', ['id_topik_tes' => 2])->row_array();
    }

    public function getIdTopikTBI()
    {
        return $this->db->select('id_topik_tes')->get_where('topik_tes', ['id_topik_tes' => 2])->row()->id_topik_tes;
    }

    public function getRuleTopikTBI()
    {
        return $this->db->query("SELECT * from rule_tes rt join topik_tes t on rt.id_rule_tes = t.id_rule where t.id_rule = 2 and t.id_topik_tes = 2")->row_array();
    }

    //SKD
    public function getTopikSKD()
    {
        return $this->db->get_where('kel_skd', ['id_skd' => 3])->row_array();
    }

    public function getNamaTopikSKD()
    {
        return $this->db->select('nama_skd')->get_where('kel_skd', ['id_skd' => 3])->row()->nama_skd;
    }

    public function getKlmpkSKD()
    {
        return $this->db->get_where('topik_tes', ['id_skd' => 3])->result_array();
    }

    public function getRuleTopikSKD()
    {
        return $this->db->query("SELECT * from rule_tes rt left join topik_tes t on rt.id_rule_tes = t.id_rule where t.id_skd = 3")->result_array();
    }

    public function getTwk()
    {
        return $this->db->get_where('topik_tes', ['id_topik_tes' => 3])->row_array();
    }

    public function getRuleTwk()
    {
        return $this->db->query("SELECT * from rule_tes rt left join topik_tes t on rt.id_rule_tes = t.id_rule where t.id_topik_tes = 3")->row_array();
    }

    public function getTiu()
    {
        return $this->db->get_where('topik_tes', ['id_topik_tes' => 4])->row_array();
    }

    public function getRuleTiu()
    {
        return $this->db->query("SELECT * from rule_tes rt left join topik_tes t on rt.id_rule_tes = t.id_rule where t.id_topik_tes = 4")->row_array();
    }

    public function getTkp()
    {
        return $this->db->get_where('topik_tes', ['id_topik_tes' => 5])->row_array();
    }

    public function getRuleTkp()
    {
        return $this->db->query("SELECT * from rule_tes rt left join topik_tes t on rt.id_rule_tes = t.id_rule where t.id_topik_tes = 5")->row_array();
    }

    //TSA

    public function getTopikTsa()
    {
        return $this->db->get_where('topik_tes', ['id_topik_tes' => 6])->row_array();
    }

    public function getIdTopikTsa()
    {
        return $this->db->select('id_topik_tes')->get_where('topik_tes', ['id_topik_tes' => 6])->row()->id_topik_tes;
    }

    public function getRuleTopikTsa()
    {
        return $this->db->query("SELECT * from rule_tes rt join topik_tes t on rt.id_rule_tes = t.id_rule where t.id_rule = 3 and t.id_topik_tes = 1")->row_array();
    }

    /*public function deleteModul($id)
	{
		$this->db->where('id_modul', $id);
		$this->db->delete('modul');
		//return $this->db->get_where('mahasiswa', ['id' => $id]);
	}*/
}
