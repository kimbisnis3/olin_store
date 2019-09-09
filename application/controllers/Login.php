<?php

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->load->view('login/v_login');
    }

    function auth_process(){
        $username = $this->input->post('username');
        $password = $this->input->post('pass');
            $where = array(
                'aktif'     => 't',
                'user'      => $username,
                'pass'      => md5($password),
                );
            $cek = $this->db->get_where("mcustomer",$where)->num_rows();
            if($cek > 0){
                $this->db->trans_start();
                $q = "SELECT 
                        mcustomer.id,
                        mcustomer.kode,
                        mcustomer.nama,
                        mcustomer.alamat,
                        mcustomer.telp,
                        mcustomer.email,
                        mcustomer.aktif,
                        mcustomer.ref_jenc,
                        mcustomer.user,
                        mcustomer.pass,
                        mjencust.nama mjencust_nama
                    FROM 
                        mcustomer 
                    LEFT JOIN mjencust ON mjencust.kode = mcustomer.ref_jenc
                    WHERE mcustomer.user = '$username'";
                $result = $this->db->query($q)->row();
                $d = array(
                    prefix_sess().'status'    => "online",
                    prefix_sess().'in_cl'     => TRUE,
                    prefix_sess().'id'        => $result->id,
                    prefix_sess().'nama'      => $result->nama,
                    prefix_sess().'user'      => $result->user,
                    prefix_sess().'kodecust'  => $result->kode,
                    prefix_sess().'mjencust_nama'=> $result->mjencust_nama,
                );
                $this->session->set_userdata($d);
                $this->db->trans_complete();
                $r['result']    = 'success';
                $r['caption']   = 'Sukses';
                $r['msg']       = 'Login Sukses';
                $r['class']     = 'success';
                echo json_encode($r);
            }else{
                $r['result']    = 'fail';
                $r['caption']   = 'Gagal';
                $r['msg']       = 'Username dan Password tidak sesuai';
                $r['class']     = 'danger';
                echo json_encode($r);
            }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    function login_try(){
        // print_r(json_encode($this->session->all_userdata())); 
        echo sess_data('status');
        // $d = array(
        //     prefix_sess().'status'    => "online",
        // );
        // $this->session->set_userdata($d);
    }
}
