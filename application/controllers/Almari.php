<?php
     class Almari extends CI_Controller{

          public function __construct(){
               parent::__construct();
               $this->load->model('M_almari');
               $this->load->library('form_validation');
               if($this->session->userdata('status')!=="login") {
                    redirect('login/login');
                  }
               }
     
          public function index(){
               $data['almari']=$this->M_almari->show_almari();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('almari/v_data_almari',$data);
               $this->load->view('template/footer');
          }

          public function add_almari(){
               //validasi form
               $this->form_validation->set_rules('almari','almari','required');

               if ($this->form_validation->run()==FALSE){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data almari gagal ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('almari');
               }else{
                  $this->M_almari->add_almari();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data almari berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('almari');
               }
          } 
            
          public function ubah_almari(){ 
                  $this->M_almari->edit_almari();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data almari berhasil dinonaktifkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('almari');
          }

     } 
?>