<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public $table       = '';
    public $foldername  = '';
    public $indexpage   = 'register/v_register';

    function __construct()
    {
        parent::__construct();
        include(APPPATH . 'libraries/dbinclude.php');
    }

    function index()
    {
        $this->load->view($this->indexpage);
    }

    function savedata()
    {
        $d['nama']      = $this->input->post('nama');
        $d['alamat']    = $this->input->post('alamat');
        $d['telp']      = $this->input->post('telp');
        $d['email']     = $this->input->post('email');
        $d['pic']       = $this->input->post('pic');
        $d['ket']       = $this->input->post('ket');
        $d['ref_jenc']  = ien($this->input->post('ref_jenc'));
        $d['user']      = $this->input->post('user');
        $d['pass']      = md5($this->input->post('pass'));
        $d['aktif']     = 't';

        $result = $this->db->insert($this->table,$d);
        $r['sukses'] = $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }
}
