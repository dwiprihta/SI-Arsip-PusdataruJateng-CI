<?php
     defined('BASEPATH') OR exit('No direct script access allowed');
     Class Error Extends CI_Controller{

          public function __construct(){
               parent:: __construct();
          }

          public function index(){
               $this->load->view('template/header.php');
               $this->load->view('errors/404');
               $this->load->view('template/footer_blind.php');
          }
     }

?>