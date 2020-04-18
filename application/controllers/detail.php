<?php
defined('BASEPATH') or exit('No direct script access allowed');

class detail extends CI_Controller
{
    public function pembelajaran_detail()
    {
        $this->load->view('User/header/header_pembelajaran');
        $this->load->view('User/pembelajaran/pembelajaran_detail');
        $this->load->view('User/footer/footer');
    }
}
