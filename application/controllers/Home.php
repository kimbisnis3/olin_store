<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $table       = '';
    public $foldername  = '';
    public $indexpage   = 'home/v_home.php';

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view($this->indexpage);
    }
    

}
