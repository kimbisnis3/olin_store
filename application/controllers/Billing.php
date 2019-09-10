<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

    public $table       = '';
    public $foldername  = '';
    public $menuaktif   = 'billing';
    public $indexpage   = 'billing/v_billing';

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['menuaktif'] = $this->menuaktif;
        $this->load->view($this->indexpage,$data);
    }
    

}
