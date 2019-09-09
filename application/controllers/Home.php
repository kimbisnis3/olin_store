<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $table       = '';
    public $foldername  = '';
    public $indexpage   = 'home/v_home.php';

    function __construct()
    {
        parent::__construct();
        include(APPPATH . 'libraries/dbinclude.php');
    }

    function index()
    {
        $data['slide']  = $this->db->get_where('tconfigimage', array('tipe' => 'ss'))->result();
        $this->load->view($this->indexpage, $data);
    }
}
