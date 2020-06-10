<?php
     class Block extends CI_Controller{

          public function __construct(){
               parent::__construct();
               $this->load->model('M_block');
               $this->load->library('form_validation');
               if($this->session->userdata('status')!=="login") {
                    redirect('login/login');
                  }
               }
     
          public function index(){
               $data['block']=$this->M_block->show_block();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('block/v_data_block',$data);
               $this->load->view('template/footer');
          }

          public function add_block(){
               //validasi form
               $this->form_validation->set_rules('block','block','required');

               if ($this->form_validation->run()==FALSE){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data block gagal ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('block');
               }else{
                  $this->M_block->add_block();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data block berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('block');
               }
          } 
            
          public function ubah_block(){ 
                  $this->M_block->edit_block();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data block berhasil dinonaktifkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('block');
          }

     } 
?>