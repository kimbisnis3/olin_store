<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public $table       = '';
    public $foldername  = '';
    public $indexpage   = 'order/v_order.php';

    function __construct()
    {
        parent::__construct();
        include(APPPATH . 'libraries/dbinclude.php');
    }

    function index()
    {
        $this->load->view($this->indexpage);
    }

    public function savedata()
    {   
        $this->db->trans_begin();
        $a['ref_cust']  = $this->input->post('ref_cust');
        $a['tgl']       = 'now()';
        $a['ref_gud']   = $this->libre->gud_def();
        $a['ket']       = $this->input->post('ket');
        $a['ref_kirim'] = $this->input->post('ref_kirim');
        $a['ref_layanan'] = $this->input->post('ref_layanan');
        $a['kirimke']   = $this->input->post('kirimke');
        $a['alamat']    = $this->input->post('alamat');
        if ($this->input->post('ref_kirim') == 'GX0002') {    
            $a['kodeprovfrom']  = $this->input->post('provinsi');
            $a['kodeprovto']    = $this->input->post('provinsito');
            $a['kodecityfrom']  = $this->input->post('city');
            $a['kodecityto']    = $this->input->post('cityto');
            $a['lokasidari']= $this->input->post('mask-provinsi').' - '.$this->input->post('mask-city');
            $a['lokasike']  = $this->input->post('mask-provinsito').' - '.$this->input->post('mask-cityto');
            $a['kgkirim']   = $this->input->post('berat');
            $a['bykirim']   = $this->input->post('biaya');
            $a['kodekurir'] = $this->input->post('kodekurir');
            $a['kurir']     = $this->input->post('kurir');
        }
        $this->db->insert('xorder',$a);

        $idOrder = $this->db->insert_id();
        $kodeOrder = $this->db->get_where('xorder',array('id' => $idOrder))->row()->kode;
        $kodebrg    = $this->input->post('kodebrg');
        $arr_produk = $this->input->post('arr_produk');
        foreach (json_decode($arr_produk) as $r) {
            $Brg = $this->db->query("
            SELECT 
                msatbrg.kode msatbrg_kode,
                msatbrg.ref_brg msatbrg_ref_brg,
                msatbrg.harga msatbrg_harga,
                msatbrg.ref_gud msatbrg_ref_gud,
                msatbrg.ket msatbrg_ket
            FROM 
                mbarang 
            LEFT JOIN msatbrg ON msatbrg.ref_brg = mbarang.kode 
            WHERE 
                msatbrg.def = 't' 
            AND mbarang.kode = '$r->kode'")->row();
            $rowb['useri']     = $this->session->userdata('username');
            $rowb['ref_order'] = $kodeOrder;
            $rowb['ref_brg']   = $Brg->msatbrg_ref_brg;
            $rowb['jumlah']    = $r->jumlah;
            $rowb['harga']     = str_replace(",","",$r->harga);
            $rowb['ref_satbrg']= $Brg->msatbrg_kode;
            $rowb['ref_gud']   = $Brg->msatbrg_ref_gud;
            $rowb['ket']       = $Brg->msatbrg_ket;
            $b[] = $rowb;
        }
        $this->db->delete('xorderd',array('ref_order' => $kodeOrder));
        $this->db->insert_batch('xorderd',$b);
        $idOrderd = $this->db->get_where('xorderd',array('ref_order' => $kodeOrder))->result();
        foreach ($idOrderd as $i) {
        $kodebarang = $this->db->get_where('xorderd',array('id' => $i->id))->row()->ref_brg;
        $design = $this->db->get_where('mbarangs',array('ref_brg' => $kodebarang))->result();
            foreach ($design as $r) {
                $row    = array(
                    "useri"         => $this->session->userdata('username'),
                    "ref_orderd"    => $i->id,
                    "ref_modesign"  => $r->model,
                    "ref_warna"     => $r->warna,
                    "ket"           => $r->ket
                );
                $c[] = $row;
            }
        }
        if (count($design) > 0) {
            $this->db->insert_batch('xorderds',$c);
        }
        $d['total'] = $this->input->post('total') + $this->input->post('biaya');
        $this->db->update('xorder',$d,array('kode' => $kodeOrder));

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $r = array(
                'sukses' => 'fail', 
            );
        }
        else
        {
            $this->db->trans_commit();
            $r = array(
                'sukses' => 'success',
                );
        }
        echo json_encode($r);
    }
}
