<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

    public $table       = '';
    public $foldername  = '';
    public $indexpage   = 'billing/v_billing.php';

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view($this->indexpage);
    }
    

}
