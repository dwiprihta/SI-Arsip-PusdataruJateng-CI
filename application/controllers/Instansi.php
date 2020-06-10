<?php
     class Instansi extends CI_Controller{

          public function __construct(){
               parent::__construct();
               $this->load->model('M_instansi');
               $this->load->library('form_validation');
               
               }
     
          public function index(){
               $data['instansi']=$this->M_instansi->show_instansi();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('instansi/v_data_instansi',$data);
               $this->load->view('template/footer');
          }

          public function add_instansi(){
               //validasi form
               $this->form_validation->set_rules('instansi','Instansi','required');
               $this->form_validation->set_rules('inisial','Inisial','required');

               if ($this->form_validation->run()==FALSE){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data Instansi gagal ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('instansi');
               }else{
                  $this->M_instansi->add_instansi();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data Instansi berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('instansi');
               }
          } 
            
          public function ubah_instansi(){ 
                  $this->M_instansi->edit_instansi();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data instansi berhasil dinonaktifkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('instansi');
          }

     } 
?>