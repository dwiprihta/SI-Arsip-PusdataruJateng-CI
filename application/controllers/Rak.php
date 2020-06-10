<?php
     class Rak extends CI_Controller{

          public function __construct(){
               parent::__construct();
               $this->load->model('M_rak');
               $this->load->library('form_validation');
               if($this->session->userdata('status')!=="login") {
                    redirect('login/login');
                  }
               }
     
          public function index(){
               $data['rak']=$this->M_rak->show_rak();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('rak/v_data_rak',$data);
               $this->load->view('template/footer');
          }

          public function add_rak(){
               //validasi form
               $this->form_validation->set_rules('rak','rak','required');

               if ($this->form_validation->run()==FALSE){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data rak gagal ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('rak');
               }else{
                  $this->M_rak->add_rak();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data rak berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('rak');
               }
          } 
            
          public function ubah_rak(){ 
                  $this->M_rak->edit_rak();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data rak berhasil dinonaktifkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('rak');
          }

     } 
?>