<?php

class Rule_topik_model extends CI_model
{
    // Select topik rule yang id
    public function getTopikRuleTPA()
    {
        return $this->db->get_where('topik_rule', ['id_topik' => 1])->row_array();
    }
}
