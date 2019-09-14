<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public $table       = '';
    public $foldername  = '';
    public $menuaktif   = 'order';
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

    public function getall(){
        $filterawal = date('Y-m-d', strtotime($this->input->post('filterawal')));
        $filterakhir= date('Y-m-d', strtotime($this->input->post('filterakhir')));
        $kodecust   = $this->session->userdata('kodecust');
        $q = "SELECT
                xorder.id,
                xorder.kode,
                xorder.tgl,
                xorder.ket,
                xorder.pic,
                xorder.kgkirim,
                xorder.kirimke,
                xorder.bykirim,
                xorder.ref_layanan,
                xorder.kurir,
                xorder.kodekurir,
                xorder.lokasidari,
                xorder.lokasike,
                xorder.pathcorel,
                xorder.pathimage,
                xorder.status,
                mcustomer.nama namacust,
                mkirim.nama mkirim_nama,
                mlayanan.nama mlayanan_nama,
                (SELECT count(statusd) FROM xorderd WHERE xorderd.ref_order = xorder.kode) jmlorder,
                (SELECT count(statusd) FROM xorderd WHERE xorderd.ref_order = xorder.kode AND statusd=4) orderdone
            FROM
                xorder
            LEFT JOIN mcustomer ON mcustomer.kode = xorder.ref_cust
            LEFT JOIN mkirim ON mkirim.kode = xorder.ref_kirim
            LEFT JOIN mlayanan ON mlayanan.kode = xorder.ref_layanan
            WHERE xorder.void IS NOT TRUE";
        if ($filterawal && $filterakhir) {
            $q .= "  AND
                    xorder.tgl 
                BETWEEN '$filterawal' AND '$filterakhir'";
        }

        if ($kodecust) {
            $q .= " AND ref_cust = '$kodecust'";
        }
        $q .=" ORDER BY xorder.id DESC" ;
        $result     = $this->db->query($q)->result();
        $list       = [];
        foreach ($result as $i => $r) {
            $row['no']      = $i + 1;
            $row['id']          = $r->id;
            $row['kode']        = $r->kode;
            $row['tgl']         = normal_date($r->tgl);
            $row['namacust']    = $r->namacust;
            $row['kgkirim']     = $r->kgkirim;
            $row['bykirim']     = number_format($r->bykirim);
            $row['mkirim_nama'] = $r->mkirim_nama." - ".strtoupper($r->kurir);
            $row['lokasidari']  = $r->lokasidari;
            $row['lokasike']    = $r->lokasike;
            $row['ket']         = $r->ket;
            $row['pathcorel']   = $r->pathcorel;
            $row['pathimage']   = $r->pathimage;
            $row['kirimke']     = $r->kirimke;
            $row['mlayanan_nama']= $r->mlayanan_nama;
            $row['status']      = statuspo($r->status);
            $row['jmlorder']    = $r->jmlorder;
            $row['orderdone']   = $r->orderdone;
            $row['statusorder'] = ($r->orderdone == $r->jmlorder) ? '<span class="label label-success">Selesai Semua</span>' : '<span class="label label-warning">Belum Selesai</span>' ;
            $list[] = $row;
        }   
        echo json_encode(array('data' => $list));
    }

    public function savedata()
    {   
        $this->db->trans_begin();
        $provfrom = '10';
        $cityfrom = '445';
        $prov     = 'Jawa Tengah';
        $city     = 'Surakarta (Solo)';
        $a['ref_cust']  = $this->session->userdata('kodecust');
        $a['tgl']       = 'now()';
        $a['ref_gud']   = $this->libre->gud_def();
        $a['ket']       = $this->input->post('ket');
        $a['ref_kirim'] = $this->input->post('ref_kirim');
        $a['ref_layanan'] = $this->input->post('ref_layanan');
        $a['kirimke']   = $this->input->post('nama_penerima');
        $a['alamat']    = $this->input->post('alamat_penerima');
        if ($this->input->post('ref_kirim') == 'GX0002') {    
            $a['kodeprovfrom']  = $provfrom ;
            $a['kodecityfrom']  = $cityfrom;
            $a['kodeprovto']    = $this->input->post('provinsito');
            $a['kodecityto']    = $this->input->post('cityto');
            $a['lokasidari']    = $prov.' - '.$city;
            $a['lokasike']      = $this->input->post('maskprovinsito').' - '.$this->input->post('maskcityto');
            $a['kgkirim']       = $this->input->post('kgkirim');
            $a['bykirim']       = $this->input->post('bykirim');
            $a['kodekurir']     = $this->input->post('kodekurir');
            $a['kurir']         = $this->input->post('kurir');
        }
        $this->db->insert('xorder',$a);
        $idOrder    = $this->db->insert_id();
        $kodeOrder  = $this->db->get_where('xorder',array('id' => $idOrder))->row()->kode;
        $arr_produk = $this->cart->contents();
        foreach ($this->cart->contents() as $r) {
            $kodebrg = $r['id'];
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
            AND mbarang.kode = '".$kodebrg."'")->row();
            $rowb['useri']     = $this->session->userdata('user');
            $rowb['ref_order'] = $kodeOrder;
            $rowb['ref_brg']   = $Brg->msatbrg_ref_brg;
            $rowb['jumlah']    = $r['qty'];
            $rowb['harga']     = $Brg->msatbrg_harga;
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
        $d['total'] = $this->cart->total() + $this->input->post('bykirim');
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
            $this->cart->destroy();
            $r = array(
                'sukses' => 'success',
                );
        }
        echo json_encode($r);
    }
}
