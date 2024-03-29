<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public $table       = '';
    public $foldername  = '';
    public $menuaktif   = 'produk';
    public $indexpage   = 'product/v_product';
    public $detailpage  = 'product/v_product_det';

    function __construct()
    {
        parent::__construct();
        include(APPPATH . 'libraries/dbinclude.php');
    }

    function index()
    {
        $q = "SELECT
                msatbrg. ID,
                msatbrg.konv,
                msatbrg.ket,
                msatbrg.harga,
                msatbrg.def,
                mbarang. ID idbarang,
                mbarang.kode kodebarang,
                mbarang.ket ketbarang,
                mbarang.nama namabarang,
                msatuan.nama namasatuan,
                mgudang.nama namagudang,
                mmodesign.gambar gambardesign,
                mmodesign.nama namadesign,
                mwarna.colorc kodewarna,
                mkategori.nama kategori_nama
            FROM
                msatbrg
            LEFT JOIN mbarang ON mbarang.kode = msatbrg.ref_brg
            LEFT JOIN mkategori ON mkategori.kode = mbarang.ref_ktg
            LEFT JOIN mbarangs ON mbarang.kode = mbarangs.ref_brg
            LEFT JOIN mmodesign ON mmodesign.kode = mbarangs.model
            LEFT JOIN mwarna ON mwarna.kode = mbarangs.warna
            LEFT JOIN msatuan ON msatuan.kode = msatbrg.ref_sat
            LEFT JOIN mgudang ON mgudang.kode = msatbrg.ref_gud
            WHERE
                msatbrg.def = 't'";
        $data['product'] = $this->db->query($q)->result();
        $data['menuaktif'] = $this->menuaktif;
        $this->load->view($this->indexpage,$data);
    }

    function detail()
    { 
        $kode = $this->input->get('q');
        $data['kode'] = $kode;
        $q = "SELECT
                msatbrg. ID,
                msatbrg.konv,
                msatbrg.ket,
                msatbrg.harga,
                msatbrg.def,
                mbarang. ID idbarang,
                mbarang.kode kodebarang,
                mbarang.ket ketbarang,
                mbarang.nama namabarang,
                msatuan.nama namasatuan,
                mgudang.nama namagudang,
                mmodesign.gambar gambardesign,
                mmodesign.nama namadesign,
                mwarna.colorc kodewarna,
                mwarna.nama warna,
                mkategori.nama kategori_nama
            FROM
                msatbrg
            LEFT JOIN mbarang ON mbarang.kode = msatbrg.ref_brg
            LEFT JOIN mkategori ON mkategori.kode = mbarang.ref_ktg
            LEFT JOIN mbarangs ON mbarang.kode = mbarangs.ref_brg
            LEFT JOIN mmodesign ON mmodesign.kode = mbarangs.model
            LEFT JOIN mwarna ON mwarna.kode = mbarangs.warna
            LEFT JOIN msatuan ON msatuan.kode = msatbrg.ref_sat
            LEFT JOIN mgudang ON mgudang.kode = msatbrg.ref_gud
            WHERE
                msatbrg.def = 't'
            AND mbarang.kode = '$kode'";

        $z = "SELECT
            msatbrg. ID,
            msatbrg.konv,
            msatbrg.ket,
            msatbrg.harga,
            msatbrg.def,
            mbarang. ID idbarang,
            mbarang.kode kodebarang,
            mbarang.ket ketbarang,
            mbarang.nama namabarang,
            msatuan.nama namasatuan,
            mgudang.nama namagudang,
            mmodesign.gambar gambardesign,
            mmodesign.nama namadesign,
            mwarna.colorc kodewarna,
            mwarna.nama warna,
            mkategori.nama kategori_nama
        FROM
            msatbrg
        LEFT JOIN mbarang ON mbarang.kode = msatbrg.ref_brg
        LEFT JOIN mkategori ON mkategori.kode = mbarang.ref_ktg
        LEFT JOIN mbarangs ON mbarang.kode = mbarangs.ref_brg
        LEFT JOIN mmodesign ON mmodesign.kode = mbarangs.model
        LEFT JOIN mwarna ON mwarna.kode = mbarangs.warna
        LEFT JOIN msatuan ON msatuan.kode = msatbrg.ref_sat
        LEFT JOIN mgudang ON mgudang.kode = msatbrg.ref_gud
        WHERE
            msatbrg.def = 't'
        AND mbarang.kode = '$kode'
        ORDER BY ID ASC
        LIMIT 4";

        $data['pr'] = $this->db->query($q)->row();
        $data['pr_latest'] = $this->db->query($z)->result();
        $data['menuaktif'] = $this->menuaktif;
        $this->load->view($this->detailpage,$data);
    }
}
