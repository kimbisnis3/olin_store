<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
    public $table       = '';
    public $foldername  = '';
    public $menuaktif   = 'payment';
    public $indexpage   = 'payment/v_payment';

    function __construct()
    {
        parent::__construct();
        include(APPPATH . 'libraries/dbinclude.php');
    }

    function index()
    {
        $this->load->view($this->indexpage);
    }

    public function getall()
    {
        $q ="SELECT * FROM mpembayaran";
        $result = $this->db->query($q)->result();
        echo json_encode(
            array(
                'data' => $result
                )
        );
    }

    public function savedata()
    {   
        $this->db->trans_begin();
        $a['useri']     = $this->session->userdata('username');
        $a['ref_cust']  = $this->input->post('ref_cust');
        $a['tgl']       = date('Y-m-d', strtotime($this->input->post('tgl')));
        $a['total']     = $this->input->post('total');
        $a['bayar']     = $this->input->post('bayar');
        $a['ket']       = $this->input->post('ket');
        $a['ref_jual']  = $this->input->post('ref_order');
        $a['ref_jenbayar']  = $this->input->post('ref_jenbayar');
        $a['ref_gud']   = $this->libre->gud_def();
        $a['posted']    = 'f';

        $this->db->insert('xpelunasan',$a);
        $idpelun    = $this->db->insert_id();
        $kodepelun  = $this->db->get_where('xpelunasan',array('id' => $idpelun))->row()->kode;
        $kodeunik   = $this->db->get_where('xpelunasan',array('id' => $idpelun))->row()->kodeunik;
        $dataOrderd = $this->db->get_where('xorderd',array('ref_order' => $this->input->post('ref_order')))->result();
        foreach ($dataOrderd as $r) {
            $row    = array(
                "useri"     => $this->session->userdata('username'),
                "ref_pelun" => $kodepelun,
                "ref_brg"   => $r->ref_brg,
                "jumlah"    => $r->jumlah,
                "ref_satbrg"=> $r->ref_satbrg,
                "ket"       => $r->ket,
                "harga"     => $r->harga,
            );
            $b[] = $row;
        }
        $this->db->insert_batch('xpelunasand',$b);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $r = array(
                'sukses' => 'fail', 
            );
        }
        else {
            $this->db->trans_commit();
            $r = array(
                'sukses' => 'success',
                'kodeunik' => $kodeunik
                );
        }
        echo json_encode($r);
    }
}
